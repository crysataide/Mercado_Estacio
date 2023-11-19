<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Cadastro de Fornecedor</title>
    <?php require('top_admin.php')?>
        <form id="form_cadastro" name="form_cadastro" method="post" action="save.php" class="form_cadastro" onsubmit="return validaForm('fornecedor_save')">
            <section class="cadastro" id="cad_fornecedor">
                <h2>Cadastro de Fornecedores</h2>
                <div class="cad_form">
                    <label>Nome do Fornecedor</label>
                    <input type="text" id="NameForn" name="NameForn" require autofocus>

                    <label>Email</label>
                    <input type="email" id="EmailForn" name="EmailForn" require>

                    <label>Telefone</label>
                    <input type="tel" id="TelForn" name="TelForn" minlength="11" maxlength="15" require>

                    <label>CPF/CNPJ do Fornecedor</label>
                    <input type="text" id="DocForn" name="DocForn" minlength="14" maxlength="18" require autofocus>

                    <label>Data de Nascimento</label>
                    <input type="date" id="DateForn" name="DateForn" placeholder="dd/mm/yyyy" require autofocus>
                </div>
                <div class="cad_btn">
                    <input type="button" id="botao_cancel" name="botao_cancel" value="Cancelar" onclick="return cancelEnvio()">
                    <input type="submit" id="botao_salvar" name="botao_salvar" value="Salvar">
                </div>
            </section>
        </form>
    </body>
    <?php require('bottom_admin.php')?>
</html>