<?php require('top_admin.php');

	require('../conexao.php');

    if (isset($_GET['CodPro'])) {

        $codigo_produto = $_GET['CodPro'];

        $delete_produto = "DELETE FROM produtos WHERE CodPro = :codigo_produto";
        $stmt = $conexao->prepare($delete_produto);
        $stmt->bindParam(':codigo_produto', $codigo_produto);

        if ($stmt->execute()) {
            $conexao = null;
            echo "<script> alert ('PRODUTO EXCLUÍDO COM SUCESSO!');</script>";
        }
        else {
            echo "<script> alert ('ERRO: NÃO FOI POSSÍVEL EXCLUIR.');</script>";
            $conexao = null;
        }
        echo "<script> window.location.href='$url/admin/list_produtos.php';</script>";
    }
    elseif (isset($_GET['ID_FORN'])) {

        $codigo_fornecedor = $_GET['ID_FORN'];

        $delete_fornecedor = "DELETE FROM fornecedores WHERE ID_FORN = :codigo_fornecedor";
        $stmt = $conexao->prepare($delete_fornecedor);
        $stmt->bindParam(':codigo_fornecedor', $codigo_fornecedor);

        if ($stmt->execute()) {
            $conexao = null;
            echo "<script> alert ('FORNECEDOR EXCLUÍDO COM SUCESSO!');</script>";
        }
        else {
            $conexao = null;
            echo "<script> alert ('ERRO: NÃO FOI POSSÍVEL EXCLUIR O FORNECEDOR!');</script>";
        }
        echo "<script> window.location.href='$url/admin/list_fornecedores.php';</script>";
    }
    elseif (isset($_GET['ID'])) {

        $codigo_user = $_GET['ID'];

        $delete_user = "DELETE FROM login WHERE ID = :codigo_user";
        $stmt = $conexao->prepare($delete_user);
        $stmt->bindParam(':codigo_user', $codigo_user);

        if ($stmt->execute()) {
            $conexao = null;
            echo "<script> alert ('USUÁRIO EXCLUÍDO COM SUCESSO!');</script>";
        }
        else {
            $conexao = null;
            echo "<script> alert ('ERRO: NÃO FOI POSSÍVEL EXCLUIR O USUÁRIO!');</script>";
        }
        echo "<script> window.location.href='$url/admin/list_users.php';</script>";
    }
?>