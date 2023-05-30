<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<title>Mercado Estácio - Login</title>
        <link rel="stylesheet" type="text/css" href="Styles/reset.css">
        <link rel="stylesheet" type="text/css" href="Styles/style.css">
    </head>
    <body>
        <header class="cabecalho_inicio">
            <a href="index.php"><img class="img_carrinho" src="Imagens/logo/carrinho.png"></a>
            <a href="index.php"><img class="img_estacio"  src="Imagens/logo/estacio-logo.png"></a>
        </header>
        <div class="container">
            <div class="login-form">
                <form id="form_login" name="form_login" class="form_login" method="post" action="valida.php">
                    <h2>Login</h2>
                    <label for="username">Usuário:</label>
                    <input type="text" id="username" name="username" required autofocus>

                    <label for="password">Senha:</label>
                    <input type="password" id="password" name="password" required>

                    <input type="submit" id="botao_entrar" name="botao_entrar" value="Entrar">
                </form>
            </div>
        </div>
    </body>
</html>
