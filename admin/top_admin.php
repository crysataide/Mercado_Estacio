<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['username'])) {	
    session_destroy();
    echo "<script>alert('ERRO: É NECESSÁRIO FAZER LOGIN'); window.location.href='../index.php';</script>";
    exit;
}

header('Content-Type: text/html; charset=utf-8');

$currentUser = $_SESSION['name'] ?? $_SESSION['username'] ?? 'Usuário';
$initials = strtoupper(substr($currentUser, 0, 1));
$currentPage = basename($_SERVER['PHP_SELF']);
?>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/svg+xml" href="../favicon.svg">
        <link rel="stylesheet" type="text/css" href="../Styles/reset.css">
        <link rel="stylesheet" type="text/css" href="../Styles/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
        <script src="../index.js"></script>
    </head>
    <body>
        <header>
            <div class="cabecalho">
                <div class="brand-wrapper">
                    <a href="home.php" title="Mercado Estácio — Painel Principal">
                        <img class="brand-logo-img" src="../Imagens/logo/mercado-estacio-logo.svg" alt="Mercado Estácio">
                    </a>
                    <div class="status-badge">
                        <span class="status-dot"></span>
                        <span>ONLINE</span>
                    </div>
                </div>

                <nav class="menu" aria-label="Navegação do Painel">
                    <div class="menu_opcao">
                        <a href="home.php" class="<?=$currentPage === 'home.php' ? 'active' : '';?>">
                            Início
                        </a>
                        <a href="list_produtos.php" class="<?=$currentPage === 'list_produtos.php' ? 'active' : '';?>">
                            Produtos
                        </a>
                        <a href="list_fornecedores.php" class="<?=$currentPage === 'list_fornecedores.php' ? 'active' : '';?>">
                            Fornecedores
                        </a>
                        <?php if (($_SESSION['username'] ?? '') === 'admin'): ?>
                        <a href="list_users.php" class="<?=$currentPage === 'list_users.php' ? 'active' : '';?>">
                            Usuários
                        </a>
                        <?php endif; ?>
                        <a href="about.php" class="<?=$currentPage === 'about.php' ? 'active' : '';?>">
                            Sobre
                        </a>
                        <a href="../exit.php" class="btn-exit" title="Encerrar Sessão">
                            Sair
                        </a>
                    </div>
                </nav>

                <div class="user-profile-badge">
                    <div class="user-avatar"><?=$initials;?></div>
                    <span class="user-name"><?=htmlspecialchars($currentUser);?></span>
                </div>
            </div>
        </header>