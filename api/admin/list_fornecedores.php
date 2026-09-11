<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Mercado Estácio — Fornecedores</title>
    <?php 
        require_once('top_admin.php');
        require_once('api/conexao.php');

        $stmt = $conexao->query("SELECT * FROM fornecedores ORDER BY id_forn ASC");
        $fornecedores = $stmt->fetchAll();
        $total = count($fornecedores);
    ?>
        <main class="table-page-container">
            <div class="data-panel">
                <div class="data-panel-header">
                    <div class="data-title-group">
                        <h2>Rede de Fornecedores</h2>
                        <span class="data-count-badge"><?=$total;?> <?=($total === 1 ? 'PARCEIRO CADASTRADO' : 'PARCEIROS CADASTRADOS');?></span>
                    </div>
                    <a href="cad_fornecedor.php" class="btn btn-primary btn-sm">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                        Novo Fornecedor
                    </a>
                </div>

                <?php if ($total === 0): ?>
                    <div style="padding: 60px 20px; text-align: center;">
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="var(--text-dim)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" style="margin: 0 auto 16px;"><rect x="1" y="3" width="15" height="13"></rect><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon><circle cx="5.5" cy="18.5" r="2.5"></circle><circle cx="18.5" cy="18.5" r="2.5"></circle></svg>
                        <p style="color: var(--text-muted); font-size: 0.95rem; margin-bottom: 20px;">Nenhum fornecedor cadastrado no momento.</p>
                        <a href="cad_fornecedor.php" class="btn btn-primary btn-sm">Cadastrar Primeiro Fornecedor</a>
                    </div>
                <?php else: ?>
                    <div class="table-responsive">
                        <table>	
                            <thead>
                                <tr>
                                    <th>Nome / Razão Social</th>
                                    <th>E-mail</th>
                                    <th>Telefone</th>
                                    <th>CPF / CNPJ</th>
                                    <th>Data Reg.</th>
                                    <th style="text-align: right;">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($fornecedores as $f): 
                                $idForn    = htmlspecialchars($f['id_forn'] ?? $f['ID_FORN'] ?? '');
                                $nameForn  = htmlspecialchars($f['nameforn'] ?? $f['NameForn'] ?? '');
                                $emailForn = htmlspecialchars($f['emailforn'] ?? $f['EmailForn'] ?? '');
                                $telForn   = htmlspecialchars($f['telforn'] ?? $f['TelForn'] ?? '');
                                $docForn   = htmlspecialchars($f['docforn'] ?? $f['DocForn'] ?? '');
                                $dateForn  = htmlspecialchars($f['dateforn'] ?? $f['DateForn'] ?? '');
                            ?>
                                <tr>
                                    <td style="font-weight: 600; color: var(--text-primary);"><?=$nameForn;?></td>
                                    <td class="dim-mono"><?=$emailForn;?></td>
                                    <td class="dim-mono"><?=$telForn;?></td>
                                    <td class="code-mono"><?=$docForn;?></td>
                                    <td class="dim-mono"><?=$dateForn;?></td>
                                    <td class="action-cell">
                                        <div class="action-buttons">
                                            <a href="edit.php?ID_FORN=<?=$idForn;?>" class="action-btn btn-edit" title="Editar Fornecedor">
                                                <svg viewBox="0 0 24 24"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" stroke="currentColor" stroke-width="2" fill="none"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" stroke="currentColor" stroke-width="2" fill="none"></path></svg>
                                            </a>
                                            <button type="button" onclick="delete_fornecedor('<?=$idForn;?>')" class="action-btn btn-del" title="Excluir Fornecedor">
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