<?php require("top_admin.php");

	require('../conexao.php');

    if (isset($_POST['CodPro'])) {

        $codigo_produto = $_GET['CodPro'];

        $select_produto = mysqli_query($conexao, "SELECT * FROM produtos WHERE CodPro = $codigo_produto");

        if (mysqli_num_rows($select_produto) > 0) {
            $dados_produto = mysqli_fetch_assoc($select_produto);
        }
        else {
            echo "<script> alert ('NÃO EXISTEM PRODUTOS CADASTRADOS!');</script>";
            echo "<script> window.location.href='$url_admin/produto';</script>";
        }
    }
    else if (isset($_POST['ID_FORN'])) {

        $codigo_fornecedor = $_GET['ID_FORN'];

        $select_fornecedores = mysqli_query($conexao, "SELECT * FROM fornecedores WHERE ID_FORN = $codigo_fornecedor");

        if (mysqli_num_rows($select_fornecedores) > 0) {
            $dados_fornecedor = mysqli_fetch_assoc($select_fornecedores);
        }
        else {
            echo "<script> alert ('NÃO EXISTEM PRODUTOS CADASTRADOS!');</script>";
            echo "<script> window.location.href='$url_admin/produto';</script>";
        }
    }
?>
		<form id="form_cadastro" name="form_cadastro" method="post" action="save.php" class="form_cadastro">
            <div class="cadastro">

                <?php
                    if (isset($_GET['CodPro'])) {?>
                        <h2>ATUALIZAR PRODUTO</h2>
                        <div class="cad_form">
                            <label>Descrição do Produto</label>
                            <input type="text" id="DescPro" name="DescPro" require autofocus>
                            <label>Categoria</label>
                            <input type="text" id="CategPro" name="CategPro" placeholder="Descartável" require autofocus>
                        </div>
                        <input type="submit" id="btn_entrar" name="botao_salvar" value="Salvar">
                <?php }
                    else if (isset($_GET['ID_FORN'])) {?>
                        <h2>ATUALIZAR FORNECEDOR</h2>
                        <div class="cad_form">
                            <label>Nome do Fornecedor</label>
                            <input type="text" id="NameForn" name="NameForn" require autofocus>
                            <label>Email</label>
                            <input type="email" id="EmailForn" name="EmailForn" require>
                            <label>Telefone</label>
                            <input type="tel" id="TelForn" name="TelForn" require>
                            <label>CPF/CNPJ do Fornecedor</label>
                            <input type="text" id="DocForn" name="DocForn" require autofocus>
                            <label>Data de Nascimento</label>
                            <input type="date" id="DateForn" name="DateForn" placeholder="dd/mm/yyyy" require autofocus>
                        </div>
                        <input type="submit" id="btn_entrar" name="botao_salvar" value="Salvar">
                <?php }?>
            </div>
		</form>
    </body>
</html>