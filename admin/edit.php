<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Mercado Estácio - Editar</title>
    <?php require("top_admin.php");

        require('../conexao.php');

        if (isset($_GET['CodPro'])) {

            $cadastro = "produto_edit";
            $codigo_produto = $_GET['CodPro'];

            $select_produto = mysqli_query($conexao, "SELECT * FROM produtos WHERE CodPro = $codigo_produto");

            if (mysqli_num_rows($select_produto) > 0) {
                $data_produto = mysqli_fetch_assoc($select_produto);
            }
            else {
                echo "<script> alert ('NÃO EXISTEM PRODUTOS CADASTRADOS!');</script>";
                echo "<script> window.location.href='$url_admin/produto';</script>";
            }
        }
        else if (isset($_GET['ID_FORN'])) {

            $cadastro = "fornecedor_edit";
            $codigo_fornecedor = $_GET['ID_FORN'];

            $select_fornecedores = mysqli_query($conexao, "SELECT * FROM fornecedores WHERE ID_FORN = $codigo_fornecedor");

            if (mysqli_num_rows($select_fornecedores) > 0) {
                $data_fornecedor = mysqli_fetch_assoc($select_fornecedores);
            }
            else {
                echo "<script> alert ('NÃO EXISTEM PRODUTOS CADASTRADOS!');</script>";
                echo "<script> window.location.href='$url_admin/produto';</script>";
            }
        }
        else if (isset($_GET['ID'])) {

            $id_user = $_GET['ID'];
            $cadastro = "usuario_edit";

            $select_user = mysqli_query($conexao, "SELECT * FROM login WHERE ID = $id_user");

            if (mysqli_num_rows($select_user) > 0) {
                $data_user = mysqli_fetch_assoc($select_user);
            }
            else {
                echo "<script> alert ('NÃO EXISTEM USUÁRIOS CADASTRADOS!');</script>";
                echo "<script> window.location.href='$url_admin/produto';</script>";
            }
        }
    ?>
		<form id="form_cadastro" name="form_cadastro" method="post" class="form_cadastro" onsubmit="return validaForm('<?=$cadastro?>')" enctype="multipart/form-data" action="save.php">
            <?php if (isset($_GET['CodPro'])) {?>
                <div class="cadastro" id="cad_produto">
                    <h2>ATUALIZAR PRODUTO</h2>
                    <div class="cad_form">

                        <input type="hidden" id="ID_PRO" name="ID_PRO" value="<?=$data_produto['ID_PRO'];?>">

                        <label>Descrição do Produto</label>
                        <input type="text" id="DescPro" name="DescPro" value="<?=$data_produto['DescPro'];?>" require autofocus>

                        <label>Categoria</label>
                        <input type="text" id="CategPro" name="CategPro" value="<?=$data_produto['CategPro'];?>" placeholder="Descartável" oninput="this.value = this.value.replace(/[^a-zA-Z]/g,'');" require autofocus>

                        <label>Imagem do Produto</label>
                        <input type="file" id="ImgPro" name="ImgPro" accept="image/*" require autofocus>
                    </div>
            <?php } elseif (isset($_GET['ID_FORN'])) {?>
                <div class="cadastro" id="cad_fornecedor">
                    <h2>ATUALIZAR FORNECEDOR</h2>
                    <div class="cad_form">

                        <input type="hidden" id="ID_FORN" name="ID_FORN" value="<?=$data_fornecedor['ID_FORN'];?>">

                        <label>Nome do Fornecedor</label>
                        <input type="text" id="NameForn" name="NameForn" value="<?=$data_fornecedor['NameForn'];?>" require autofocus>

                        <label>Email</label>
                        <input type="email" id="EmailForn" name="EmailForn" value="<?=$data_fornecedor['EmailForn'];?>" require>

                        <label>Telefone</label>
                        <input type="tel" id="TelForn" name="TelForn" minlength="11" maxlength="15" value="<?=$data_fornecedor['TelForn'];?>" require>

                        <label>CPF/CNPJ do Fornecedor</label>
                        <input type="text" id="DocForn" name="DocForn" minlength="14" maxlength="18" value="<?=$data_fornecedor['DocForn'];?>" require autofocus>

                        <label>Data de Nascimento</label>
                        <input type="date" id="DateForn" name="DateForn" placeholder="dd/mm/yyyy" value="<?=$data_fornecedor['DateForn'];?>" require autofocus>
                    </div>
            <?php } elseif (isset($_GET['ID'])) {?>
                <div class="cadastro" id="cad_usuario">
                    <h2>ATUALIZAR FORNECEDOR</h2>
                    <div class="cad_form">

                        <input type="hidden" id="ID" name="ID" value="<?=$data_user['ID'];?>">

                        <label for="name">Nome:</label>
                        <input type="text" id="name" name="name" value="<?=$data_user['name'];?>" required autofocus>

                        <label for="username">Nome de Usuário:</label>
                        <input type="text" id="username" name="username" value="<?=$data_user['username'];?>" oninput="this.value = this.value.replace(/[^a-zA-Z]/g,'');" required autofocus>

                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="<?=$data_user['email'];?>" require>

                        <label for="password">Senha:</label>
                        <input type="password" id="password" name="password" value="<?=$data_user['password'];?>" required>
                    </div>
                <?php }?>
                <div class="cad_btn">
                    <input type="button" id="botao_cancel" name="botao_cancel" value="Cancelar" onclick="return cancelEnvio()">
                    <input type="submit" id="botao_entrar" name="botao_salvar" value="Salvar">
                </div>
            </div>
		</form>
    </body>
    <?php require('bottom_admin.php')?>
</html>