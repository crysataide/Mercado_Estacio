<?php 
require_once('top_admin.php');
require_once('api/conexao.php');

$uploadDir = __DIR__ . '/../Imagens/produtos/';
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0755, true);
}

$acao = $_POST['acao'] ?? '';

// ==========================================
// 1. ATUALIZAR PRODUTO
// ==========================================
if ($acao === 'update_produto' || (isset($_POST['CodPro']) && isset($_POST['DescPro']) && !isset($_POST['CodBar']))) {
    $codigo_produto = $_POST['CodPro'];
    $descri_produto = $_POST['DescPro'];
    $categ_produto  = $_POST['CategPro'];

    $img_produto = null;
    if (!empty($_FILES['ImgPro']['name']) && $_FILES['ImgPro']['error'] === UPLOAD_ERR_OK) {
        $ext = pathinfo($_FILES['ImgPro']['name'], PATHINFO_EXTENSION);
        $novoNome = 'prod_' . uniqid() . '.' . $ext;
        if (move_uploaded_file($_FILES['ImgPro']['tmp_name'], $uploadDir . $novoNome)) {
            $img_produto = '/Imagens/produtos/' . $novoNome;
        }
    }

    if ($img_produto) {
        $stmt = $conexao->prepare("UPDATE produtos SET descpro = :desc, categpro = :categ, imgpro = :img WHERE codpro = :cod");
        $stmt->execute([
            ':desc'  => $descri_produto,
            ':categ' => $categ_produto,
            ':img'   => $img_produto,
            ':cod'   => $codigo_produto
        ]);
    } else {
        $stmt = $conexao->prepare("UPDATE produtos SET descpro = :desc, categpro = :categ WHERE codpro = :cod");
        $stmt->execute([
            ':desc'  => $descri_produto,
            ':categ' => $categ_produto,
            ':cod'   => $codigo_produto
        ]);
    }

    echo "<script>alert('PRODUTO ATUALIZADO COM SUCESSO!'); window.location.href='list_produtos.php';</script>";
    exit;
}

// ==========================================
// 2. CADASTRAR PRODUTO
// ==========================================
else if ($acao === 'insert_produto' || (isset($_POST['CodPro']) && isset($_POST['CodBar']))) {
    $codigo_produto = $_POST['CodPro'];
    $codigo_barras  = $_POST['CodBar'];
    $descri_produto = $_POST['DescPro'];
    $categ_produto  = $_POST['CategPro'];
    $img_produto    = 's/img';

    if (!empty($_FILES['ImgPro']['name']) && $_FILES['ImgPro']['error'] === UPLOAD_ERR_OK) {
        $ext = pathinfo($_FILES['ImgPro']['name'], PATHINFO_EXTENSION);
        $novoNome = 'prod_' . uniqid() . '.' . $ext;
        if (move_uploaded_file($_FILES['ImgPro']['tmp_name'], $uploadDir . $novoNome)) {
            $img_produto = '/Imagens/produtos/' . $novoNome;
        }
    }

    try {
        $stmt = $conexao->prepare("INSERT INTO produtos (codpro, codbar, descpro, categpro, imgpro) VALUES (:cod, :bar, :desc, :categ, :img)");
        $stmt->execute([
            ':cod'   => $codigo_produto,
            ':bar'   => $codigo_barras,
            ':desc'  => $descri_produto,
            ':categ' => $categ_produto,
            ':img'   => $img_produto
        ]);
        echo "<script>alert('PRODUTO CADASTRADO COM SUCESSO!'); window.location.href='list_produtos.php';</script>";
    } catch (PDOException $e) {
        echo "<script>alert('ERRO: Não foi possível cadastrar o produto (" . addslashes($e->getMessage()) . ")'); window.location.href='list_produtos.php';</script>";
    }
    exit;
}

// ==========================================
// 3. ATUALIZAR FORNECEDOR
// ==========================================
else if ($acao === 'update_fornecedor' || isset($_POST['ID_FORN'])) {
    $id_fornecedor    = (int)$_POST['ID_FORN'];
    $name_fornecedor  = $_POST['NameForn'];
    $email_fornecedor = $_POST['EmailForn'];
    $tel_fornecedor   = preg_replace('/\D/', '', $_POST['TelForn']);
    $doc_fornecedor   = preg_replace('/\D/', '', $_POST['DocForn']);
    $date_fornecedor  = $_POST['DateForn'];

    try {
        $stmt = $conexao->prepare("UPDATE fornecedores SET nameforn = :name, emailforn = :email, telforn = :tel, docforn = :doc, dateforn = :dt WHERE id_forn = :id");
        $stmt->execute([
            ':name'  => $name_fornecedor,
            ':email' => $email_fornecedor,
            ':tel'   => $tel_fornecedor,
            ':doc'   => $doc_fornecedor,
            ':dt'    => $date_fornecedor,
            ':id'    => $id_fornecedor
        ]);
        echo "<script>alert('FORNECEDOR ATUALIZADO COM SUCESSO!'); window.location.href='list_fornecedores.php';</script>";
    } catch (PDOException $e) {
        echo "<script>alert('ERRO: Não foi possível atualizar o fornecedor.'); window.location.href='list_fornecedores.php';</script>";
    }
    exit;
}

// ==========================================
// 4. CADASTRAR FORNECEDOR
// ==========================================
else if ($acao === 'insert_fornecedor' || (isset($_POST['NameForn']) && !isset($_POST['ID_FORN']))) {
    $name_fornecedor  = $_POST['NameForn'];
    $email_fornecedor = $_POST['EmailForn'];
    $tel_fornecedor   = preg_replace('/\D/', '', $_POST['TelForn']);
    $doc_fornecedor   = preg_replace('/\D/', '', $_POST['DocForn']);
    $date_fornecedor  = $_POST['DateForn'];

    try {
        $stmt = $conexao->prepare("INSERT INTO fornecedores (nameforn, emailforn, telforn, docforn, dateforn) VALUES (:name, :email, :tel, :doc, :dt)");
        $stmt->execute([
            ':name'  => $name_fornecedor,
            ':email' => $email_fornecedor,
            ':tel'   => $tel_fornecedor,
            ':doc'   => $doc_fornecedor,
            ':dt'    => $date_fornecedor
        ]);
        echo "<script>alert('FORNECEDOR CADASTRADO COM SUCESSO!'); window.location.href='list_fornecedores.php';</script>";
    } catch (PDOException $e) {
        echo "<script>alert('ERRO: Não foi possível cadastrar o fornecedor.'); window.location.href='list_fornecedores.php';</script>";
    }
    exit;
}

// ==========================================
// 5. ATUALIZAR USUÁRIO
// ==========================================
else if ($acao === 'update_user' || (isset($_POST['ID']) && isset($_POST['username']))) {
    $id_user   = (int)$_POST['ID'];
    $name_user = $_POST['name'];
    $username  = $_POST['username'];
    $email_user = $_POST['email'];
    $password  = $_POST['password'] ?? '';

    try {
        if (!empty($password)) {
            $stmt = $conexao->prepare("UPDATE login SET name = :name, username = :username, email = :email, password = :pass WHERE id = :id");
            $stmt->execute([
                ':name'     => $name_user,
                ':username' => $username,
                ':email'    => $email_user,
                ':pass'     => $password,
                ':id'       => $id_user
            ]);
        } else {
            $stmt = $conexao->prepare("UPDATE login SET name = :name, username = :username, email = :email WHERE id = :id");
            $stmt->execute([
                ':name'     => $name_user,
                ':username' => $username,
                ':email'    => $email_user,
                ':id'       => $id_user
            ]);
        }
        echo "<script>alert('USUÁRIO ATUALIZADO COM SUCESSO!'); window.location.href='list_users.php';</script>";
    } catch (PDOException $e) {
        echo "<script>alert('ERRO: Não foi possível atualizar o usuário.'); window.location.href='list_users.php';</script>";
    }
    exit;
}

// ==========================================
// 6. CADASTRAR USUÁRIO
// ==========================================
else if ($acao === 'insert_user' || (isset($_POST['username']) && !isset($_POST['ID']))) {
    $name_user  = $_POST['name'];
    $username   = $_POST['username'];
    $email_user = $_POST['email'];
    $password   = $_POST['password'];

    try {
        $stmt = $conexao->prepare("INSERT INTO login (name, username, email, password) VALUES (:name, :username, :email, :pass)");
        $stmt->execute([
            ':name'     => $name_user,
            ':username' => $username,
            ':email'    => $email_user,
            ':pass'     => $password
        ]);
        echo "<script>alert('USUÁRIO CADASTRADO COM SUCESSO!'); window.location.href='list_users.php';</script>";
    } catch (PDOException $e) {
        echo "<script>alert('ERRO: Não foi possível cadastrar o usuário. Nome de usuário já pode estar em uso.'); window.location.href='list_users.php';</script>";
    }
    exit;
} else {
    header("Location: home.php");
    exit;
}