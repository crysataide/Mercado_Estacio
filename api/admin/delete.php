<?php 
require_once('top_admin.php');
require_once('../conexao.php');

if (isset($_GET['CodPro'])) {
    $codigo_produto = $_GET['CodPro'];

    $stmt = $conexao->prepare("DELETE FROM produtos WHERE codpro = :cod");
    $stmt->bindValue(':cod', $codigo_produto);

    if ($stmt->execute()) {
        echo "<script>alert('PRODUTO EXCLUÍDO COM SUCESSO!'); window.location.href='list_produtos.php';</script>";
    } else {
        echo "<script>alert('ERRO: NÃO FOI POSSÍVEL EXCLUIR O PRODUTO.'); window.location.href='list_produtos.php';</script>";
    }
    exit;
}
elseif (isset($_GET['ID_FORN'])) {
    $codigo_fornecedor = (int)$_GET['ID_FORN'];

    $stmt = $conexao->prepare("DELETE FROM fornecedores WHERE id_forn = :id");
    $stmt->bindValue(':id', $codigo_fornecedor, PDO::PARAM_INT);

    if ($stmt->execute()) {
        echo "<script>alert('FORNECEDOR EXCLUÍDO COM SUCESSO!'); window.location.href='list_fornecedores.php';</script>";
    } else {
        echo "<script>alert('ERRO: NÃO FOI POSSÍVEL EXCLUIR O FORNECEDOR!'); window.location.href='list_fornecedores.php';</script>";
    }
    exit;
}
elseif (isset($_GET['ID'])) {
    $codigo_user = $_GET['ID'];

    // Evitar exclusão do usuário admin principal ou de si mesmo
    if ($codigo_user == '1' || $codigo_user === 'admin') {
        echo "<script>alert('ERRO: O administrador padrão não pode ser excluído.'); window.location.href='list_users.php';</script>";
        exit;
    }

    $stmt = $conexao->prepare("DELETE FROM login WHERE id = :id OR username = :username");
    $stmt->bindValue(':id', is_numeric($codigo_user) ? (int)$codigo_user : 0, PDO::PARAM_INT);
    $stmt->bindValue(':username', $codigo_user);

    if ($stmt->execute()) {
        echo "<script>alert('USUÁRIO EXCLUÍDO COM SUCESSO!'); window.location.href='list_users.php';</script>";
    } else {
        echo "<script>alert('ERRO: NÃO FOI POSSÍVEL EXCLUIR O USUÁRIO!'); window.location.href='list_users.php';</script>";
    }
    exit;
}
else {
    header("Location: home.php");
    exit;
}