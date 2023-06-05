<?php require('top_admin.php');

	require('../conexao.php');

    if (isset($_GET['CodPro'])) {

        $codigo_produto = $_GET['CodPro'];

        $delete_produto = "DELETE FROM produtos WHERE CodPro = $codigo_produto";

        if (mysqli_query($conexao,$delete_produto)) {
            mysqli_close($conexao);
            echo "<script> alert ('PRODUTO EXCLUÍDO COM SUCESSO!');</script>";
            echo "<script> window.location.href='$url/admin/list_produtos.php';</script>";
        }
        else {
            echo "<script> alert ('ERRO: NÃO FOI POSSÍVEL EXCLUIR.');</script>";
            echo "<script> window.location.href='$url/admin/list_produtos.php';</script>";
            mysqli_close($conexao);
        }
    }
    elseif (isset($_GET['ID_FORN'])) {

        $codigo_fornecedor = $_GET['ID_FORN'];

        $delete_fornecedor = "DELETE FROM fornecedores WHERE ID_FORN = $codigo_fornecedor";

        if (mysqli_query($conexao,$delete_fornecedor)) {
            mysqli_close($conexao);
            echo "<script> alert ('FORNECEDOR EXCLUÍDO COM SUCESSO!');</script>";
            echo "<script> window.location.href='$url/admin/list_fornecedores.php';</script>";
        }
        else {
            echo "<script> alert ('ERRO: NÃO FOI POSSÍVEL EXCLUIR O FORNECEDOR!');</script>";
            echo "<script> window.location.href='$url/admin/list_fornecedores.php';</script>";
            mysqli_close($conexao);
        }
    }
    elseif (isset($_GET['ID'])) {

        $codigo_user = $_GET['ID'];

        $delete_user = "DELETE FROM login WHERE ID = $codigo_user";

        if (mysqli_query($conexao,$delete_user)) {
            mysqli_close($conexao);
            echo "<script> alert ('USUÁRIO EXCLUÍDO COM SUCESSO!');</script>";
            echo "<script> window.location.href='$url/admin/list_fornecedores.php';</script>";
        }
        else {
            echo "<script> alert ('ERRO: NÃO FOI POSSÍVEL EXCLUIR O USUÁRIO!');</script>";
            echo "<script> window.location.href='$url/admin/list_fornecedores.php';</script>";
            mysqli_close($conexao);
        }
    }
?>