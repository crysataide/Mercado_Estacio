<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Cadastro de Produtos</title>
    <?php require('top_admin.php')?>
        <form id="form_cadastro" name="form_cadastro" method="post" class="form_cadastro" onsubmit="return validaForm('produto_save')" enctype="multipart/form-data" action="save.php">
            <section class="cadastro" id="cad_produto">
                <h2>Cadastro de Produtos</h2>
                <div class="cad_form">
                    <label>Código Interno</label>
                    <input type="text" id="CodPro" name="CodPro" placeholder="000000" minlength="6" maxlength="6" oninput="this.value = this.value.replace(/[^0-9.]/g, '');" require autofocus>

                    <label>Código de Barras</label>
                    <input type="text" id="CodBar" name="CodBar" maxlength="13" oninput="this.value = this.value.replace(/[^0-9.]/g, '');" require autofocus>

                    <label>Descrição do Produto</label>
                    <input type="text" id="DescPro" name="DescPro" require autofocus>

                    <label>Categoria</label>
                    <input type="text" id="CategPro" name="CategPro" placeholder="Descartável" oninput="this.value = this.value.replace(/[^a-zA-Z]/g,'');" require autofocus>

                    <label>Imagem do Produto</label>
                    <input type="file" id="ImgPro" name="ImgPro" accept="image/*" require autofocus>
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