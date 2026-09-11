<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Mercado Estácio — Detalhes do Produto</title>
    <?php
        require_once('top_admin.php');
        require_once('../conexao.php');
        
        $codigo_produto = $_GET['CodPro'] ?? '';
        
        if (!empty($codigo_produto)) {
            $stmt = $conexao->prepare("SELECT * FROM produtos WHERE codpro = :cod LIMIT 1");
            $stmt->execute([':cod' => $codigo_produto]);
            $dados_produto = $stmt->fetch();
        
            if (!$dados_produto) {
                echo "<script>alert('PRODUTO INVÁLIDO OU EXCLUÍDO'); window.location.href='list_produtos.php';</script>";
                exit;
            }
        } else {
            header("Location: list_produtos.php");
            exit;
        }

        $imgPro = $dados_produto['imgpro'] ?? $dados_produto['ImgPro'] ?? 's/img';
        $codPro = htmlspecialchars($dados_produto['codpro'] ?? $dados_produto['CodPro'] ?? '');
        $codBar = htmlspecialchars($dados_produto['codbar'] ?? $dados_produto['CodBar'] ?? '');
        $descPro = htmlspecialchars($dados_produto['descpro'] ?? $dados_produto['DescPro'] ?? '');
        $categPro = htmlspecialchars($dados_produto['categpro'] ?? $dados_produto['CategPro'] ?? '');
    ?>
        <main class="table-page-container" style="max-width: 900px;">
            <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 20px;">
                <div>
                    <h2 style="font-family: var(--font-display); font-size: 1.5rem; font-weight: 700; color: var(--text-primary);">Ficha do Produto</h2>
                    <p style="font-family: var(--font-mono); font-size: 0.8rem; color: var(--text-muted);">REGISTRO #<?=$codPro;?></p>
                </div>
                <a href="list_produtos.php" class="btn btn-secondary btn-sm">
                    &larr; Voltar à Lista
                </a>
            </div>

            <div class="product-showcase">
                <div class="product-image-box">
                    <?php if ($imgPro !== 's/img' && !empty($imgPro)): ?>
                        <img src="<?='..' . (strpos($imgPro, '/') === 0 ? '' : '/') . $imgPro;?>" alt="Foto do Produto">
                    <?php else: ?>
                        <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="var(--text-dim)" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" style="margin-bottom: 12px;"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><circle cx="8.5" cy="8.5" r="1.5"></circle><polyline points="21 15 16 10 5 21"></polyline></svg>
                        <span style="font-family: var(--font-mono); font-size: 0.72rem; color: var(--text-dim);">SEM IMAGEM CADASTRADA</span>
                    <?php endif; ?>
                    <span class="card-tag" style="margin-top: 10px;">CÓD: <?=$codPro;?></span>
                </div>

                <div class="product-spec-list">
                    <div class="product-spec-item">
                        <span class="spec-label">Descrição</span>
                        <span class="spec-val"><?=$descPro;?></span>
                    </div>

                    <div class="product-spec-item">
                        <span class="spec-label">Código de Barras</span>
                        <span class="spec-val" style="font-family: var(--font-mono);"><?=$codBar;?></span>
                    </div>

                    <div class="product-spec-item">
                        <span class="spec-label">Categoria</span>
                        <span class="badge-tag"><?=$categPro;?></span>
                    </div>

                    <div style="display: flex; gap: 12px; margin-top: 10px;">
                        <a href="edit.php?CodPro=<?=$codPro;?>" class="btn btn-primary btn-sm">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                            Editar Produto
                        </a>
                        <button type="button" onclick="delete_produto('<?=$codPro;?>')" class="btn btn-danger btn-sm">
                            Excluir
                        </button>
                    </div>
                </div>
            </div>
        </main>

    <?php require_once('bottom_admin.php')?>