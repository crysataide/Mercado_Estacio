<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Mercado Estácio - Escolha</title>
    <?php require('top_admin.php');?>
        <main class="main-escolha">
            <div class="texto">
                <h2>Bem-vindo ao Mercado Estácio</h2>
                <p>A Mercado Estácio é muito mais do que um site convencional. Como extensão da renomada Faculdade Estácio, oferecemos uma solução inovadora para gerenciar informações vitais de produtos e fornecedores em um ambiente prático e eficiente.</p>

                <p>Com nossa plataforma intuitiva, você pode cadastrar novos produtos, atualizar informações, consultar detalhes importantes e acompanhar todo o ciclo de vida dos itens. Além disso, facilitamos o gerenciamento de fornecedores, permitindo que você mantenha todos os dados essenciais atualizados e acesse informações relevantes em um único local.</p>

                <p>Nossa abordagem combina a expertise da Faculdade Estácio com a praticidade do comércio moderno. Aproveite a comodidade de realizar todas as operações necessárias para o seu negócio em um só lugar, economizando tempo e esforço.</p>

                <p>No Mercado Estácio, acreditamos na importância da eficiência e da qualidade na gestão de produtos e fornecedores. Nossa plataforma foi projetada para atender às suas necessidades e simplificar processos, permitindo que você foque no que é realmente importante: fazer seu negócio crescer.</p>
            </div>
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