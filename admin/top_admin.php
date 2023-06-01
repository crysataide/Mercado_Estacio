<?php session_start();

    if (!isset($_SESSION['username'])) {	

        session_destroy();

        unset ($_SESSION['username']);

        echo "<script> alert ('ERRO: É NECESSÁRIO FAZER LOGIN');</script>";        
        echo "<script> window.location.href='http://localhost/Projeto_Web';</script>";
    }
?>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="<?=$_SESSION['url']."../Styles/reset.css";?>">
        <link rel="stylesheet" type="text/css" href="<?=$_SESSION['url']."../Styles/style.css";?>">
        <script src="../index.js"></script>
    </head>
    <header>
        <div class="cabecalho">
            <div class="barra_topo">
                <div class="botao_menu">
                    <nav>
                        <ul class="menu_admin">
                            <li>
                                <a href="#"><img src="<?=$_SESSION['url']."../Imagens/menu.png"?>"></a>
                                <ul>
                                    <li><a href="<?=$_SESSION['url_admin'];?>"><!-- <img src="../Imagens/cabecalho/"> -->Home</a></li>
                                    <li><a href="<?=$_SESSION['url']."/exit.php";?>"><!-- <img src="../Imagens/cabecalho/"> -->Sair</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="msg_name">
                    <label><?="Seja bem-vindo, ".$_SESSION['name'];?></label>
                </div>
            </div>
            <div class="img_logo">
                <a href="<?=$_SESSION['url_admin']?>"><img class="img_carrinho" src="<?=$_SESSION['url']."../Imagens/logo/carrinho.png"?>"></a>
                <a href="<?=$_SESSION['url_admin']?>"><img class="img_estacio"  src="<?=$_SESSION['url']."../Imagens/logo/estacio-logo.png"?>"></a>
            </div>
        </div>
    </header>
    <body>