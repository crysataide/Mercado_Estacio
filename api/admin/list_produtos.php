<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Mercado Estácio — Produtos</title>
    <?php 
        require_once('top_admin.php');
        require_once('api/conexao.php');

        $stmt = $conexao->query("SELECT * FROM produtos ORDER BY codpro ASC");
        $produtos = $stmt->fetchAll();
        $total = count($produtos);
    ?>
        <main class="table-page-container">
            <div class="data-panel">
                <div class="data-panel-header">
                    <div class="data-title-group">
                        <h2>Catálogo de Produtos</h2>
                        <span class="data-count-badge"><?=$total;?> <?=($total === 1 ? 'PRODUTO REGISTRADO' : 'PRODUTOS REGISTRADOS');?></span>
                    </div>
                    <a href="cad_produtos.php" class="btn btn-primary btn-sm">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                        Novo Produto
                    </a>
                </div>

                <?php if ($total === 0): ?>
                    <div style="padding: 60px 20px; text-align: center;">
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="var(--text-dim)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" style="margin: 0 auto 16px;"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path></svg>
                        <p style="color: var(--text-muted); font-size: 0.95rem; margin-bottom: 20px;">Nenhum produto cadastrado no momento.</p>
                        <a href="cad_produtos.php" class="btn btn-primary btn-sm">Cadastrar Primeiro Produto</a>
                    </div>
                <?php else: ?>
                    <div class="table-responsive">
                        <table>	
                            <thead>
                                <tr>
                                    <th>Cód. Interno</th>
                                    <th>Cód. de Barras</th>
                                    <th>Descrição do Item</th>
                                    <th>Categoria</th>
                                    <th style="text-align: right;">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($produtos as $p): 
                                $codPro   = htmlspecialchars($p['codpro'] ?? $p['CodPro'] ?? '');
                                $codBar   = htmlspecialchars($p['codbar'] ?? $p['CodBar'] ?? '');
                                $descPro  = htmlspecialchars($p['descpro'] ?? $p['DescPro'] ?? '');
                                $categPro = htmlspecialchars($p['categpro'] ?? $p['CategPro'] ?? 'Geral');
                            ?>
                                <tr>
                                    <td class="code-mono"><?=$codPro;?></td>
                                    <td class="dim-mono"><?=$codBar;?></td>
                                    <td style="font-weight: 500;"><?=$descPro;?></td>
                                    <td><span class="badge-tag"><?=$categPro;?></span></td>
                                    <td class="action-cell">
                                        <div class="action-buttons">
                                            <a href="view_produto.php?CodPro=<?=$codPro;?>" class="action-btn btn-view" title="Visualizar Detalhes">
                                                <svg viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" stroke="currentColor" stroke-width="2" fill="none"></path><circle cx="12" cy="12" r="3" stroke="currentColor" stroke-width="2" fill="none"></circle></svg>
                                            </a>
                                            <a href="edit.php?CodPro=<?=$codPro;?>" class="action-btn btn-edit" title="Editar Produto">
                                                <svg viewBox="0 0 24 24"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" stroke="currentColor" stroke-width="2" fill="none"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" stroke="currentColor" stroke-width="2" fill="none"></path></svg>
                                            </a>
                                            <button type="button" onclick="delete_produto('<?=$codPro;?>')" class="action-btn btn-del" title="Excluir Produto">
                                                <svg viewBox="0 0 24 24"><polyline points="3 6 5 6 21 6" stroke="currentColor" stroke-width="2" fill="none"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" stroke="currentColor" stroke-width="2" fill="none"></path></svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
        </main>

    <?php require_once('bottom_admin.php')?>