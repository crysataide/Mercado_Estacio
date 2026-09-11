<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Mercado Estácio — Novo Produto</title>
    <?php require_once('top_admin.php')?>
        <main class="form-page-container">
            <div class="form-panel">
                <div class="form-panel-head">
                    <h2>Cadastrar Novo Produto</h2>
                    <a href="list_produtos.php" class="btn btn-secondary btn-sm" style="cursor: pointer;">
                        &larr; Voltar
                    </a>
                </div>

                <form id="form_cadastro" name="form_cadastro" method="post" onsubmit="return validaForm('produto_save')" enctype="multipart/form-data" action="save.php">
                    <input type="hidden" name="acao" value="insert_produto">

                    <div class="form-grid-2">
                        <div class="form-group">
                            <label for="CodPro">Código Interno</label>
                            <input type="text" id="CodPro" name="CodPro" placeholder="Ex: 000101" minlength="1" maxlength="10" oninput="this.value = this.value.replace(/[^0-9]/g, '');" required autofocus>
                        </div>

                        <div class="form-group">
                            <label for="CodBar">Código de Barras (EAN)</label>
                            <input type="text" id="CodBar" name="CodBar" placeholder="Ex: 7891234567890" maxlength="13" oninput="this.value = this.value.replace(/[^0-9]/g, '');" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="DescPro">Descrição do Produto</label>
                        <input type="text" id="DescPro" name="DescPro" placeholder="Ex: Caderno Universitário Estácio 10 Matérias" required>
                    </div>

                    <div class="form-grid-2">
                        <div class="form-group">
                            <label for="CategPro">Categoria</label>
                            <input type="text" id="CategPro" name="CategPro" placeholder="Ex: Papelaria, Descartável..." required>
                        </div>

                        <div class="form-group">
                            <label for="ImgPro">Foto do Produto (Opcional)</label>
                            <input type="file" id="ImgPro" name="ImgPro" accept="image/*">
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="button" onclick="cancelEnvio()" class="btn btn-secondary">
                            Cancelar
                        </button>
                        <button type="submit" id="botao_salvar" name="botao_salvar" class="btn btn-primary">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8"></polyline></svg>
                            Salvar Produto
                        </button>
                    </div>
                </form>
            </div>
        </main>

    <?php require_once __DIR__ . '/../../bottom_admin.php'?>