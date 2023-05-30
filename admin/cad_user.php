<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Cadastro de Fornecedor</title>
    <?php require('top_admin.php')?>
        <form id="form_cadastro" name="form_cadastro" method="post" action="save.php" class="form_cadastro">
            <section class="cadastro">    
                <h2>Cadastro de Usuário</h2>
                <div class="cad_form">
                    <label for="name">Nome:</label>
                    <input type="text" id="name" name="name" placeholder="Ex: Crystian Ataide" required autofocus>

                    <label for="username">Nome de Usuário:</label>
                    <input type="text" id="username" name="username" placeholder="Ex: crys" required autofocus>

                    <label for="password">Senha:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="cad_btn">
                    <input type="submit" id="botao_cancel" name="botao_cancel" value="Cancelar">
                    <input type="submit" id="botao_salvar" name="botao_salvar" value="Salvar">
                </div>
            </section>
        </form>
    </body>
    <?php require('botom_admin.php')?>
</html>