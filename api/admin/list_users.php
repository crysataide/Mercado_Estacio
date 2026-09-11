<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Mercado Estácio — Operadores</title>
    <?php 
        require_once('top_admin.php');
        require_once('api/conexao.php');

        $stmt = $conexao->query("SELECT * FROM login ORDER BY id ASC");
        $users = $stmt->fetchAll();
        $total = count($users);
    ?>
        <main class="table-page-container">
            <div class="data-panel">
                <div class="data-panel-header">
                    <div class="data-title-group">
                        <h2>Operadores do Sistema</h2>
                        <span class="data-count-badge"><?=$total;?> <?=($total === 1 ? 'USUÁRIO REGISTRADO' : 'USUÁRIOS REGISTRADOS');?></span>
                    </div>
                    <a href="cad_user.php" class="btn btn-primary btn-sm">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                        Novo Usuário
                    </a>
                </div>

                <div class="table-responsive">
                    <table>	
                        <thead>
                            <tr>
                                <th>Nome Completo</th>
                                <th>Usuário (Login)</th>
                                <th>E-mail</th>
                                <th>Senha</th>
                                <th>Nível</th>
                                <th style="text-align: right;">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($users as $u): 
                            $id       = htmlspecialchars($u['id'] ?? $u['ID'] ?? '');
                            $name     = htmlspecialchars($u['name'] ?? '');
                            $username = htmlspecialchars($u['username'] ?? '');
                            $email    = htmlspecialchars($u['email'] ?? '');
                            $isAdmin  = ($username === 'admin');
                        ?>
                            <tr>
                                <td style="font-weight: 600; color: var(--text-primary);"><?=$name;?></td>
                                <td class="code-mono">@<?=$username;?></td>
                                <td class="dim-mono"><?=$email;?></td>
                                <td class="dim-mono">••••••••</td>
                                <td>
                                    <?php if ($isAdmin): ?>
                                        <span class="badge-tag" style="background: var(--accent-gold-dim); border-color: rgba(212, 167, 44, 0.3); color: var(--accent-gold);">ADMIN</span>
                                    <?php else: ?>
                                        <span class="badge-tag" style="background: rgba(255,255,255,0.05); border-color: var(--border-subtle); color: var(--text-muted);">OPERADOR</span>
                                    <?php endif; ?>
                                </td>
                                <td class="action-cell">
                                    <div class="action-buttons">
                                        <a href="edit.php?ID=<?=$id;?>" class="action-btn btn-edit" title="Editar Usuário">
                                            <svg viewBox="0 0 24 24"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" stroke="currentColor" stroke-width="2" fill="none"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" stroke="currentColor" stroke-width="2" fill="none"></path></svg>
                                        </a>
                                        <?php if (!$isAdmin): ?>
                                        <button type="button" onclick="delete_user('<?=$id;?>')" class="action-btn btn-del" title="Excluir Usuário">
                                            <svg viewBox="0 0 24 24"><polyline points="3 6 5 6 21 6" stroke="currentColor" stroke-width="2" fill="none"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" stroke="currentColor" stroke-width="2" fill="none"></path></svg>
                                        </button>
                                        <?php endif; ?>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>

    <?php require_once('bottom_admin.php')?>