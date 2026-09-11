<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/svg+xml" href="../favicon.svg">
        <title>Mercado Estácio — Acesso ao Sistema</title>
        <meta name="description" content="Plataforma de gestão integrada de produtos, fornecedores e estoques do Mercado Estácio.">
        <link rel="stylesheet" type="text/css" href="../Styles/reset.css">
        <link rel="stylesheet" type="text/css" href="../Styles/style.css">
    </head>
    <body>
        <header class="cabecalho_inicio">
            <a href="index.php" title="Mercado Estácio - Página Inicial">
                <img class="brand_logo" src="../Imagens/logo/mercado-estacio-logo.svg" alt="Mercado Estácio">
            </a>
        </header>

        <main class="login-container">
            <div class="login-card">
                <div class="login-card-header">
                    <h2>Acesso ao Painel</h2>
                    <p>Identifique-se com suas credenciais do campus</p>
                </div>

                <form id="form_login" name="form_login" method="post" action="valida.php">
                    <div class="form-group">
                        <label for="username">Nome de Usuário</label>
                        <input type="text" id="username" name="username" placeholder="Ex: admin" required autofocus autocomplete="username">
                    </div>

                    <div class="form-group">
                        <label for="password">Senha de Acesso</label>
                        <input type="password" id="password" name="password" placeholder="••••••••" required autocomplete="current-password">
                    </div>

                    <button type="submit" id="botao_entrar" name="botao_entrar" class="btn btn-primary btn-block" style="margin-top: 24px; padding: 14px;">
                        Entrar no Sistema
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display:inline-block; vertical-align:middle; margin-left: 6px;"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                    </button>
                </form>

                <div style="margin-top: 24px; text-align: center; border-top: 1px solid var(--border-subtle); padding-top: 18px;">
                    <div class="status-badge" style="display: inline-flex;">
                        <span class="status-dot"></span>
                        <span>PostgreSQL Neon DB conectado</span>
                    </div>
                </div>
            </div>
        </main>

        <footer class="rodape">
            <div class="rodape-content" style="justify-content: center;">
                <p>Mercado Estácio &copy; <?=date('Y');?> — Projeto de Desenvolvimento Web</p>
            </div>
        </footer>
    </body>
</html>
