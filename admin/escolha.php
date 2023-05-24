<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Mercado Estácio - Escolha</title>
    <?php require('top_admin.php');?>
        <main class="main-escolha">
            <ul class="escolha">
                <li class="lista-produtos">
                    <h2>Produtos</h2>
                    <a href="view_produtos.php"><img src="../Imagens/produtos.png" title="Produtos" alt="Imagem-Produto"></a>
                </li>
                <li class="lista-fornecedores">
                    <h2>Fornecedores</h2>
                    <a href="view_fornecedores.php"><img src="../Imagens/fornecedor.png" title="Fornecedores" alt="Imagem-Fornecedor"></a>
                </li>
                <?php
                    if ($_SESSION['username'] == 'admin') { ?>

                        <li class="lista-usuarios lista-aparecendo">
                            <h2>Usuários</h2>
                            <a href="view_users.php"><img src="../Imagens/usuarios.png" title="Usuários" alt="Imagem-Usuario"></a>
                        </li>
                <?php } ?>
            </ul>
        </main>
    </body>
</html>