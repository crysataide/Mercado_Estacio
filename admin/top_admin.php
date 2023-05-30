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
        <link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['url']."../Styles/reset.css";?>">
        <link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['url']."../Styles/style.css";?>">
        <script>
            function delete_produto(cod_prod) {
            var resposta = confirm("Deseja continuar com a exclusão do produto?");
                if (resposta == true){
                    window.location.href = "delete.php?CodPro="+cod_prod;
                }
            }
            function delete_fornecedor(id_forn) {
            var resposta = confirm("Deseja continuar com a exclusão do fornecedor?");
                if (resposta == true){
                    window.location.href = "delete.php?ID_FORN="+id_forn;
                }
            }
            function delete_user(id_user) {
            var resposta = confirm("Deseja continuar com a exclusão do usuário?");
                if (resposta == true){
                    window.location.href = "delete.php?ID="+id_user;
                }
            }
        </script>
    </head>
    <header>
        <div class="cabecalho">
            <div class="barra_topo">
                <div class="botao_menu">
                    <nav>
                        <ul class="menu_admin">
                            <li>
                                <a href="#"><img src="../Imagens/menu.png"></a>
                                <ul>
                                    <li><a href="<?php echo $_SESSION['url_admin'];?>">Home</a></li>
                                    <li><a href="<?php echo $_SESSION['url']."/exit.php";?>">Sair</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="msg_name">
                    <label><?php echo "Seja bem-vindo, ".$_SESSION['name'];?></label>
                </div>
            </div>
            <div class="img_logo">
                <a href="../index.php"><img class="img_carrinho" src="<?php echo $_SESSION['url']."../Imagens/logo/carrinho.png"?>"></a>
                <a href="../index.php"><img class="img_estacio"  src="<?php echo $_SESSION['url']."../Imagens/logo/estacio-logo.png"?>"></a>
            </div>
        </div>
    </header>
    <body>