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
            <div class="escolha">
                <h3>Escolha</h3>
                <ul class="escolha_box" id='escolha'>
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
                            <li class="lista">
                                <h2>Usuários</h2>
                                <a href="view_users.php"><img src="../Imagens/escolha/usuarios.png" title="Usuários" alt="Imagem-Usuario"></a>
                            </li>
                    <?php }?>
                </ul>
            </div>
            <div class="mapa">
                <h3 class="titulo_mapa">Nosso Estabelecimento</h3>
                <div class="mapa_conteudo">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d940.1008272069633!2d-60.02695959705718!3d-3.0923821156361164!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x926c1aaa40d37829%3A0xa30d9bb8e0fec27a!2sFaculdade%20Est%C3%A1cio%20do%20Amazonas!5e0!3m2!1spt-BR!2sbr!4v1685620086067!5m2!1spt-BR!2sbr" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </main>
    </body>
    <?php require('bottom_admin.php')?>
</html>