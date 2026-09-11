<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Mercado Estácio — Painel Principal</title>
    <?php 
        require_once('top_admin.php');
        require_once('api/conexao.php');

        // Consultas rápidas para exibição de métricas nos cards
        $totalProdutos = 0;
        $totalFornecedores = 0;
        $totalUsers = 0;

        try {
            $totalProdutos     = (int)$conexao->query("SELECT COUNT(*) FROM produtos")->fetchColumn();
            $totalFornecedores = (int)$conexao->query("SELECT COUNT(*) FROM fornecedores")->fetchColumn();
            $totalUsers        = (int)$conexao->query("SELECT COUNT(*) FROM login")->fetchColumn();
        } catch (Exception $e) {
            // Em caso de exceção pontual, mantém 0
        }
    ?>
        <main class="main-dashboard">
            <section class="hero-greeting">
                <div>
                    <h1>Painel de Controle</h1>
                    <p>Gestão unificada do estoque, fornecedores e operadores do Mercado Estácio.</p>
                </div>
                <div class="system-clock">
                    servidor ativo<br>
                    <strong>PostgreSQL &bull; Neon Cloud</strong>
                </div>
            </section>

            <!-- Cards de Escolha Rápidos (Inspirados em Hustla) -->
            <section class="escolha-grid">
                <!-- Card 1: Produtos -->
                <article class="escolha-card">
                    <div>
                        <div class="card-top">
                            <div class="card-icon-box">
                                <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                            </div>
                            <span class="card-tag"><?=$totalProdutos;?> ITENS</span>
                        </div>
                        <div class="card-content">
                            <h3>Produtos</h3>
                            <p>Controle de catálogo, códigos de barras, imagens, descrições e categorização do estoque.</p>
                        </div>
                    </div>
                    <a href="list_produtos.php" class="card-action-link">
                        Acessar Catálogo
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                    </a>
                </article>

                <!-- Card 2: Fornecedores -->
                <article class="escolha-card">
                    <div>
                        <div class="card-top">
                            <div class="card-icon-box">
                                <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="3" width="15" height="13"></rect><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon><circle cx="5.5" cy="18.5" r="2.5"></circle><circle cx="18.5" cy="18.5" r="2.5"></circle></svg>
                            </div>
                            <span class="card-tag"><?=$totalFornecedores;?> PARCEIROS</span>
                        </div>
                        <div class="card-content">
                            <h3>Fornecedores</h3>
                            <p>Cadastro completo de parceiros comerciais, contatos, CNPJ/CPF e datas de registro.</p>
                        </div>
                    </div>
                    <a href="list_fornecedores.php" class="card-action-link">
                        Acessar Fornecedores
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                    </a>
                </article>

                <!-- Card 3: Usuários (visível para admin) -->
                <?php if (($_SESSION['username'] ?? '') === 'admin'): ?>
                <article class="escolha-card">
                    <div>
                        <div class="card-top">
                            <div class="card-icon-box">
                                <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                            </div>
                            <span class="card-tag"><?=$totalUsers;?> CONTAS</span>
                        </div>
                        <div class="card-content">
                            <h3>Operadores</h3>
                            <p>Gestão de acessos, credenciais de operadores e permissões no painel administrativo.</p>
                        </div>
                    </div>
                    <a href="list_users.php" class="card-action-link">
                        Gerenciar Usuários
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                    </a>
                </article>
                <?php endif; ?>
            </section>

            <!-- Seção Institucional e Localização -->
            <section class="info-section">
                <div class="content-panel">
                    <h3>Sobre o Mercado Estácio</h3>
                    <p>O <strong>Mercado Estácio</strong> é uma aplicação desenvolvida como projeto acadêmico de Desenvolvimento Web para a <strong>Faculdade Estácio do Amazonas</strong>. A plataforma simula um sistema robusto de retaguarda para pequenos e médios comércios, integrando cadastro de estoque, rede de fornecedores e controle de acesso.</p>
                    <p>Agora refatorado para uma arquitetura moderna com <strong>PHP Nativo e PDO</strong> conectado à nuvem através do <strong>PostgreSQL no Neon DB</strong>, com suporte a Serverless na Vercel.</p>
                </div>

                <div class="map-wrapper">
                    <div class="map-header">
                        <h4>Campus Estácio Amazonas</h4>
                        <span class="card-tag">MANAUS / AM</span>
                    </div>
                    <div class="map-frame-container">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d940.1008272069633!2d-60.02695959705718!3d-3.0923821156361164!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x926c1aaa40d37829%3A0xa30d9bb8e0fec27a!2sFaculdade%20Est%C3%A1cio%20do%20Amazonas!5e0!3m2!1spt-BR!2sbr!4v1685620086067!5m2!1spt-BR!2sbr" loading="lazy" referrerpolicy="no-referrer-when-downgrade" title="Localização da Faculdade Estácio"></iframe>
                    </div>
                </div>
            </section>
        </main>

    <?php require_once('bottom_admin.php')?>