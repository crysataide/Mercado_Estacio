<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Mercado Estácio - Escolha</title>
    <?php require('top_admin.php');?>
        <main class="main-escolha">
            <ul class="escolha" id='escolha'>
                <li class="lista">
                    <h2>Produtos</h2>
                    <a href="view_produtos.php"><img src="../Imagens/escolha/produtos.png" title="Produtos" alt="Imagem-Produto"></a>
                </li>
                <li class="lista">
                    <h2>Fornecedores</h2>
                    <a href="view_fornecedores.php"><img src="../Imagens/escolha/fornecedor.png" title="Fornecedores" alt="Imagem-Fornecedor"></a>
                </li>
                <?php
                    if ($_SESSION['username'] == 'admin') { ?>

                        <li class="lista" id='lista-usuarios'>
                            <h2>Usuários</h2>
                            <a href="view_users.php"><img src="../Imagens/escolha/usuarios.png" title="Usuários" alt="Imagem-Usuario"></a>
                        </li>
                    <script>
                        var listaEscolha = document.getElementById('escolha');
                        listaEscolha.style.width = '80%';
                    </script>
                <?php } else {?>
                    <script>
                        var listaEscolha = document.getElementById('escolha');
                        listaEscolha.style.width = '800px';
                    </script>
                <?php }?>
            </ul>
        </main>
    </body>
    <?php require('botom_admin.php')?>
</html>