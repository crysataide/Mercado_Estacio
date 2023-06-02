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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
        <script type="text/javascript">
            $("#TelForn").mask("(00) 90000-0000");
            $("#DocForn").mask("00.000.000/0000-00");
        </script>
    </head>
    <header>
        <div class="cabecalho">
            <nav class="menu">
                <div class="navicon">
                    <div><img src="<?=$_SESSION['url']."../Imagens/menu.png"?>"></div>
                </div>
                <a href="<?=$_SESSION['url_admin'];?>">Home</a>
                <a href="<?=$_SESSION['url']."/about.php";?>">About</a>
                <a href="<?=$_SESSION['url']."/exit.php";?>">Exit</a>
            </nav>
            <div class="barra_topo">
                <div class="msg_name">
                    <label><?="Seja bem-vindo, ".$_SESSION['name'];?></label>
                </div>
                <div class="img_logo">
                    <a href="<?=$_SESSION['url_admin']?>"><img class="img_carrinho" src="<?=$_SESSION['url']."../Imagens/logo/carrinho.png"?>"></a>
                    <a href="<?=$_SESSION['url_admin']?>"><img class="img_estacio"  src="<?=$_SESSION['url']."../Imagens/logo/estacio-logo.png"?>"></a>
                </div>
            </div>
        </div>
    </header>
    <body>