<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<title>Mercado Estácio - Cadastro Login</title>
        <link rel="stylesheet" type="text/css" href="Styles/reset.css">
        <link rel="stylesheet" type="text/css" href="Styles/style.css">
    </head>
    <body>
        <header class="cabecalho_inicio">
            <a href="index.php"><img class="img_carrinho" src="Imagens/carrinho.png"></a>
            <a href="index.php"><img class="img_estacio"  src="Imagens/estacio-logo.png"></a>
        </header>
        <div class="cadastro">
            <!-- <div class="cad-form"> -->
                <form id="form_cad" name="form_cad" class="form_cad" method="post" action="admin/save.php">
                    <h2>Cadastro de Usuário</h2>
                    <label for="name">Nome:</label>
                    <input type="text" id="name" name="name" placeholder="Ex: Crystian Ataide" required autofocus>

                    <label for="username">Nome de Usuário:</label>
                    <input type="text" id="username" name="username" placeholder="Ex: crys" required autofocus>

                    <label for="password">Senha:</label>
                    <input type="password" id="password" name="password" required>

                    <input type="submit" id="botao_salvar" value="Salvar">
                </form>
            <!-- </div> -->
        </div>
    </body>
</html>
