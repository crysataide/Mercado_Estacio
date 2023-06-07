<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Sobre o site</title>
        <?php require('top_admin.php')?>
    </head>
    <body>
        <div class="about_border">
            <h2>Informações Complementares</h2>
            <div class="text_img_about">
                <p>Bem-vindo ao meu site da Mercado Estácio. Desenvolvido como parte do projeto da disciplina de Desenvolvimento Web. O site foi cuidadosamente projetado para gerenciar informações vitais de produtos e fornecedores em um ambiente prático e eficiente.</p>
                <div class="perfil">
                    <a href="https://github.com/crysataide"><img src="https://avatars.githubusercontent.com/u/108529552?v=4" class="img_perfil"></a>
                    <a href="https://github.com/crysataide" style="text-decoration: none;"><p>Crystian Ataide</p></a>
                    <div class="redes_sociais">
                        <ul>
                            <li><a href="https://instagram.com/crys._.at"            title="Gmail">    <img src="<?=$_SESSION['url']."/Imagens/social/instagram.png"?>"></a></li>
                            <li><a href="mailto:crystianataide@gmail.com"            title="Instagram"><img src="<?=$_SESSION['url']."/Imagens/social/gmail.png"?>"></a></li>
                            <li><a href="https://wa.me/92981315164"                  title="Whatsapp"> <img src="<?=$_SESSION['url']."/Imagens/social/whatsapp.png"?>"></a></li>
                            <li><a href="https://www.linkedin.com/in/crystianataide" title="Linkendin"><img src="<?=$_SESSION['url']."/Imagens/social/linkedin.png"?>"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <br><br>
            <h2 class="titulo_ling">Linguagens utilizadas</h2>
            <div class="lista_liguagens">
                <ul>
                    <li><img src="https://raw.githubusercontent.com/devicons/devicon/1119b9f84c0290e0f0b38982099a2bd027a48bf1/icons/html5/html5-original.svg" title="HTML5" alt="HTML" width="30" height="30"/>&nbsp; - HTML: Utilizada junto do PHP para marcações e organizações da página</li>
                    <li><img src="https://raw.githubusercontent.com/devicons/devicon/1119b9f84c0290e0f0b38982099a2bd027a48bf1/icons/css3/css3-original.svg" title="CSS3" alt="CSS" width="30" height="30"/>&nbsp; - CSS: Usada para a estilização do site</li>
                    <li><img src="https://raw.githubusercontent.com/devicons/devicon/1119b9f84c0290e0f0b38982099a2bd027a48bf1/icons/php/php-original.svg" title="PHP3" alt="PHP" width="30" height="30"/>&nbsp; - PHP: Utilizada junto do HTML para validações de segurança, conexão com o banco e chamada de arquivos</li>
                    <li><img src="https://raw.githubusercontent.com/devicons/devicon/1119b9f84c0290e0f0b38982099a2bd027a48bf1/icons/javascript/javascript-original.svg" title="JavaScript" alt="JavaScript" width="30" height="30"/>&nbsp; - JavaScript: Utilizada para validar as exclusões, dimensões da página e caracteres do formulário</li>
                    <li><img src="https://cdn-icons-png.flaticon.com/128/4248/4248443.png" title="SQL" alt="SQL" width="30" height="30"/>&nbsp; - SQL: Utilizada pelo PHP para fazer consultas, inclusões, atualizações e exclusão</li>
                </ul>
            </div>
        </div>
    </body>
    <?php require('bottom_admin.php')?>
</html>