<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Mercado Estácio — Novo Operador</title>
    <?php require_once('top_admin.php')?>
        <main class="form-page-container">
            <div class="form-panel">
                <div class="form-panel-head">
                    <h2>Cadastrar Novo Operador</h2>
                    <a href="list_users.php" class="btn btn-secondary btn-sm">
                        &larr; Voltar
                    </a>
                </div>

                <form id="form_cadastro" name="form_cadastro" method="post" action="save.php" onsubmit="return validaForm('usuario_save')">
                    <input type="hidden" name="acao" value="insert_user">

                    <div class="form-group">
                        <label for="name">Nome Completo</label>
                        <input type="text" id="name" name="name" placeholder="Ex: Crystian Ataide" required autofocus>
                    </div>

                    <div class="form-grid-2">
                        <div class="form-group">
                            <label for="username">Nome de Usuário (Login)</label>
                            <input type="text" id="username" name="username" placeholder="Ex: crys" oninput="this.value = this.value.replace(/[^a-zA-Z0-9_]/g,'');" required>
                        </div>

                        <div class="form-group">
                            <label for="email">E-mail Corporativo</label>
                            <input type="email" id="email" name="email" placeholder="usuario@estacio.br" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password">Senha de Acesso</label>
                        <input type="password" id="password" name="password" placeholder="••••••••" required>
                    </div>

                    <div class="form-actions">
                        <button type="button" onclick="cancelEnvio()" class="btn btn-secondary">
                            Cancelar
                        </button>
                        <button type="submit" id="botao_salvar" name="botao_salvar" class="btn btn-primary">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8"></polyline></svg>
                            Salvar Operador
                        </button>
                    </div>
                </form>
            </div>
        </main>

    <?php require_once('bottom_admin.php')?>