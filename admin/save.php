<?php require('../conexao.php');

    if (isset($_POST['ID_PRO'])) {

        $id_produto     = $_POST['ID_PRO'];
        $descri_produto = $_POST['DescPro'];
        $categ_produto  = $_POST['CategPro'];
        $update_produto = "UPDATE produtos SET DescPro = '".$descri_produto."' AND CategPro='".$categ_produto."' WHERE ID_PRO = $id_produto";

        if (mysqli_query($conexao,$update_produto)) {
            mysqli_close($conexao);
            echo "<script> alert ('PRODUTO ATUALIZADO COM SUCESSO!');</script>";
            echo "<script> window.location.href='$url/admin/view_produtos.php';</script>";
        }
        else {
            echo "<script> alert ('ERRO: NÃO FOI POSSÍVEL ATUALIZAR O PRODUTO!');</script>";
            echo "<script> window.location.href='$url/admin/view_produtos.php';</script>";
            mysqli_close($conexao);
        }
    }
    else if (isset($_POST['CodPro'])) {

        $codigo_produto = $_POST['CodPro'];
        $codigo_barras  = $_POST['CodBar'];
        $descri_produto = $_POST['DescPro'];
        $categ_produto  = $_POST['CategPro'];
        $insert_produto = "INSERT INTO produtos (CodPro,CodBar,DescPro,CategPro) VALUES ('".$codigo_produto."','".$codigo_barras."','".$descri_produto."','".$categ_produto."')";

        if (mysqli_query($conexao,$insert_produto)) {
            mysqli_close($conexao);
            echo "<script> alert ('PRODUTO CADASTRADO COM SUCESSO!');</script>";
            echo "<script> window.location.href='$url/admin/view_produtos.php';</script>";
        }
        else {
            echo "<script> alert ('ERRO: NÃO FOI POSSÍVEL CADASTRAR O PRODUTO!');</script>";
            echo "<script> window.location.href='$url/admin/view_produtos.php';</script>";
            mysqli_close($conexao);
        }
    }
    else if (isset($_POST['ID_FORN'])) {

        $id_fornecedor     = $_POST['ID_FORN'];
        $name_fornecedor   = $_POST['NameForn'];
        $email_fornecedor  = $_POST['EmailForn'];
        $tel_fornecedor    = $_POST['TelForn'];
        $doc_fornecedor    = $_POST['DocForn'];
        $date_fornecedor   = $_POST['DateForn'];
        $update_fornecedor = "UPDATE fornecedores SET NameForn = '".$name_fornecedor."' AND EmailForn='".$email_fornecedor."' AND TelForn='".$tel_fornecedor."' AND DocForn='".$doc_fornecedor."' AND DateForn='".$date_fornecedor."' WHERE ID_FORN = $id_fornecedor";

        if (mysqli_query($conexao,$update_fornecedor)) {
            mysqli_close($conexao);
            echo "<script> alert ('FORNECEDOR ATUALIZADO COM SUCESSO!');</script>";
            echo "<script> window.location.href='$url/admin/view_fornecedores.php';</script>";
        }
        else {
            echo "<script> alert ('ERRO: NÃO FOI POSSÍVEL ATUALIZAR O FORNECEDOR!');</script>";
            echo "<script> window.location.href='$url/admin/view_fornecedores.php';</script>";
            mysqli_close($conexao);
        }
    }
    else if (isset($_POST['NameForn'])) {

        $name_fornecedor   = $_POST['NameForn'];
        $email_fornecedor  = $_POST['EmailForn'];
        $tel_fornecedor    = $_POST['TelForn'];
        $doc_fornecedor    = $_POST['DocForn'];
        $date_fornecedor   = $_POST['DateForn'];
        $insert_fornecedor = "INSERT INTO fornecedores (NameForn,EmailForn,TelForn,DocForn,DateForn) VALUES ('".$name_fornecedor."','".$email_fornecedor."','".$tel_fornecedor."','".$doc_fornecedor."','".$date_fornecedor."')";

        if (mysqli_query($conexao,$insert_fornecedor)) {
            mysqli_close($conexao);
            echo "<script> alert ('FORNECEDOR CADASTRADO COM SUCESSO!');</script>";
            echo "<script> window.location.href='$url/admin/view_fornecedores.php';</script>";
        }
        else {
            echo "<script> alert ('ERRO: NÃO FOI POSSÍVEL CADASTRAR O FORNECEDOR!');</script>";
            echo "<script> window.location.href='$url/admin/view_fornecedores.php';</script>";
            mysqli_close($conexao);
        }
    }
    else if (isset($_POST['username'])) {

        $name_user   = $_POST['name'];
        $username    = $_POST['username'];
        $password    = $_POST['password'];
        $insert_user = "INSERT INTO login (name,username,password) VALUES ('".$name_user."','".$username."','".$password."')";

        if (mysqli_query($conexao,$insert_user)) {
            mysqli_close($conexao);
            echo "<script> alert ('USUÁRIO CADASTRADO COM SUCESSO!');</script>";
            echo "<script> window.location.href='$url';</script>";
        }
        else {
            echo "<script> alert ('ERRO: NÃO FOI POSSÍVEL CADASTRAR O USUÁRIO!');</script>";
            echo "<script> window.location.href='$url';</script>";
            mysqli_close($conexao);
        }
    }
?>