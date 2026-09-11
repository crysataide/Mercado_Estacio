<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Mercado Estácio — Sobre o Projeto</title>
    <?php require_once('top_admin.php')?>
        <main class="about-container">
            <!-- Card de Perfil do Desenvolvedor -->
            <section class="profile-card">
                <img src="https://avatars.githubusercontent.com/u/108529552?v=4" alt="Crystian Ataide" class="profile-avatar">
                <div style="flex: 1;">
                    <div style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 8px;">
                        <div>
                            <h2 style="font-family: var(--font-display); font-size: 1.5rem; font-weight: 700; color: var(--text-primary);">Crystian Ataide</h2>
                            <p style="font-family: var(--font-mono); font-size: 0.8rem; color: var(--brand-primary);">DESENVOLVEDOR FULL STACK &bull; MANAUS / AM</p>
                        </div>
                        <a href="https://crys-dev.vercel.app/" target="_blank" rel="noopener" class="btn btn-secondary btn-sm">
                            Ver Portfólio &rarr;
                        </a>
                    </div>
                    
                    <p style="color: var(--text-muted); font-size: 0.92rem; line-height: 1.6; margin-top: 14px;">
                        Projeto desenvolvido como atividade prática da disciplina de Desenvolvimento Web na <strong>Faculdade Estácio do Amazonas</strong>. A proposta une os fundamentos da arquitetura web tradicional em PHP com padrões modernos de código limpo, banco de dados relacional em nuvem (Neon DB) e interface responsiva.
                    </p>

                    <div class="social-pills">
                        <a href="https://github.com/crysataide" target="_blank" rel="noopener" class="social-pill">
                            <img src="../Imagens/social/github.png" alt="GitHub">
                            <span>GitHub</span>
                        </a>
                        <a href="https://www.linkedin.com/in/crysataide" target="_blank" rel="noopener" class="social-pill">
                            <img src="../Imagens/social/linkedin.png" alt="LinkedIn">
                            <span>LinkedIn</span>
                        </a>
                        <a href="https://wa.me/92981315164" target="_blank" rel="noopener" class="social-pill">
                            <img src="../Imagens/social/whatsapp.png" alt="WhatsApp">
                            <span>WhatsApp</span>
                        </a>
                        <a href="https://instagram.com/crys._.at" target="_blank" rel="noopener" class="social-pill">
                            <img src="../Imagens/social/instagram.png" alt="Instagram">
                            <span>Instagram</span>
                        </a>
                        <a href="mailto:crystianataide@gmail.com" target="_blank" rel="noopener" class="social-pill">
                            <img src="../Imagens/social/gmail.png" alt="Gmail">
                            <span>E-mail</span>
                        </a>
                    </div>
                </div>
            </section>

            <!-- Card de Tecnologias Utilizadas -->
            <section class="content-panel" style="margin-bottom: 30px;">
                <h3>Tecnologias &amp; Arquitetura</h3>
                <p>O ecossistema técnico do projeto foi modernizado para oferecer alto desempenho e compatibilidade serverless:</p>

                <div class="tech-tags">
                    <div class="tech-tag-chip">
                        <strong style="color: #777bb4;">PHP 8+</strong>
                        <span>Nativo / PDO</span>
                    </div>
                    <div class="tech-tag-chip">
                        <strong style="color: #336791;">PostgreSQL</strong>
                        <span>Neon Cloud DB</span>
                    </div>
                    <div class="tech-tag-chip">
                        <strong style="color: #e34f26;">HTML5 &amp; CSS3</strong>
                        <span>Dark Tech Design System</span>
                    </div>
                    <div class="tech-tag-chip">
                        <strong style="color: #f7df1e;">JavaScript</strong>
                        <span>Máscaras &amp; Validações</span>
                    </div>
                    <div class="tech-tag-chip">
                        <strong style="color: #00e5ff;">Vercel</strong>
                        <span>Serverless Functions</span>
                    </div>
                </div>
            </section>
        </main>

    <?php require_once('bottom_admin.php')?>