<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Mercado Estácio — Novo Fornecedor</title>
    <?php require_once('top_admin.php')?>
        <main class="form-page-container">
            <div class="form-panel">
                <div class="form-panel-head">
                    <h2>Cadastrar Novo Fornecedor</h2>
                    <a href="list_fornecedores.php" class="btn btn-secondary btn-sm">
                        &larr; Voltar
                    </a>
                </div>

                <form id="form_cadastro" name="form_cadastro" method="post" action="save.php" onsubmit="return validaForm('fornecedor_save')">
                    <input type="hidden" name="acao" value="insert_fornecedor">

                    <div class="form-group">
                        <label for="NameForn">Razão Social / Nome Fantasia</label>
                        <input type="text" id="NameForn" name="NameForn" placeholder="Ex: Distribuidora Amazonas LTDA" required autofocus>
                    </div>

                    <div class="form-grid-2">
                        <div class="form-group">
                            <label for="EmailForn">E-mail Comercial</label>
                            <input type="email" id="EmailForn" name="EmailForn" placeholder="contato@fornecedor.com.br" required>
                        </div>

                        <div class="form-group">
                            <label for="TelForn">Telefone Comercial</label>
                            <input type="tel" id="TelForn" name="TelForn" placeholder="(92) 99999-9999" minlength="11" maxlength="15" required>
                        </div>
                    </div>

                    <div class="form-grid-2">
                        <div class="form-group">
                            <label for="DocForn">CNPJ ou CPF</label>
                            <input type="text" id="DocForn" name="DocForn" placeholder="00.000.000/0000-00" minlength="14" maxlength="18" required>
                        </div>

                        <div class="form-group">
                            <label for="DateForn">Data de Fundação / Início</label>
                            <input type="date" id="DateForn" name="DateForn" required>
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="button" onclick="cancelEnvio()" class="btn btn-secondary">
                            Cancelar
                        </button>
                        <button type="submit" id="botao_salvar" name="botao_salvar" class="btn btn-primary">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8"></polyline></svg>
                            Salvar Fornecedor
                        </button>
                    </div>
                </form>
            </div>
        </main>

    <?php require_once('bottom_admin.php')?>