<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Mercado Estácio — Editar Registro</title>
    <?php 
        require_once("top_admin.php");
        require_once('api/conexao.php');

        $cadastro = "";
        $voltarUrl = "home.php";

        if (isset($_GET['CodPro'])) {
            $cadastro = "produto_edit";
            $voltarUrl = "list_produtos.php";
            $codigo_produto = $_GET['CodPro'];

            $stmt = $conexao->prepare("SELECT * FROM produtos WHERE codpro = :cod LIMIT 1");
            $stmt->execute([':cod' => $codigo_produto]);
            $data_produto = $stmt->fetch();

            if (!$data_produto) {
                echo "<script>alert('PRODUTO NÃO ENCONTRADO!'); window.location.href='list_produtos.php';</script>";
                exit;
            }
        }
        else if (isset($_GET['ID_FORN'])) {
            $cadastro = "fornecedor_edit";
            $voltarUrl = "list_fornecedores.php";
            $codigo_fornecedor = $_GET['ID_FORN'];

            $stmt = $conexao->prepare("SELECT * FROM fornecedores WHERE id_forn = :id LIMIT 1");
            $stmt->execute([':id' => $codigo_fornecedor]);
            $data_fornecedor = $stmt->fetch();

            if (!$data_fornecedor) {
                echo "<script>alert('FORNECEDOR NÃO ENCONTRADO!'); window.location.href='list_fornecedores.php';</script>";
                exit;
            }
        }
        else if (isset($_GET['ID'])) {
            $cadastro = "usuario_edit";
            $voltarUrl = "list_users.php";
            $id_user = $_GET['ID'];

            $stmt = $conexao->prepare("SELECT * FROM login WHERE id = :id LIMIT 1");
            $stmt->execute([':id' => $id_user]);
            $data_user = $stmt->fetch();

            if (!$data_user) {
                echo "<script>alert('USUÁRIO NÃO ENCONTRADO!'); window.location.href='list_users.php';</script>";
                exit;
            }
        }
        else {
            header("Location: home.php");
            exit;
        }
    ?>
        <main class="form-page-container">
            <div class="form-panel">
                <div class="form-panel-head">
                    <?php if (isset($_GET['CodPro'])): ?>
                        <h2>Atualizar Produto</h2>
                    <?php elseif (isset($_GET['ID_FORN'])): ?>
                        <h2>Atualizar Fornecedor</h2>
                    <?php elseif (isset($_GET['ID'])): ?>
                        <h2>Atualizar Operador</h2>
                    <?php endif; ?>
                    <a href="<?=$voltarUrl;?>" class="btn btn-secondary btn-sm">
                        &larr; Voltar
                    </a>
                </div>

                <form id="form_cadastro" name="form_cadastro" method="post" class="form_cadastro" onsubmit="return validaForm('<?=$cadastro?>')" enctype="multipart/form-data" action="save.php">
                    <?php if (isset($_GET['CodPro'])): 
                        $codPro   = htmlspecialchars($data_produto['codpro'] ?? $data_produto['CodPro'] ?? '');
                        $descPro  = htmlspecialchars($data_produto['descpro'] ?? $data_produto['DescPro'] ?? '');
                        $categPro = htmlspecialchars($data_produto['categpro'] ?? $data_produto['CategPro'] ?? '');
                    ?>
                        <input type="hidden" name="acao" value="update_produto">
                        <input type="hidden" id="CodPro" name="CodPro" value="<?=$codPro;?>">

                        <div class="form-group">
                            <label>Código Interno (Fixo)</label>
                            <input type="text" value="<?=$codPro;?>" disabled>
                        </div>

                        <div class="form-group">
                            <label for="DescPro">Descrição do Produto</label>
                            <input type="text" id="DescPro" name="DescPro" value="<?=$descPro;?>" required autofocus>
                        </div>

                        <div class="form-grid-2">
                            <div class="form-group">
                                <label for="CategPro">Categoria</label>
                                <input type="text" id="CategPro" name="CategPro" value="<?=$categPro;?>" required>
                            </div>

                            <div class="form-group">
                                <label for="ImgPro">Atualizar Imagem (Opcional)</label>
                                <input type="file" id="ImgPro" name="ImgPro" accept="image/*">
                            </div>
                        </div>

                    <?php elseif (isset($_GET['ID_FORN'])): 
                        $idForn    = htmlspecialchars($data_fornecedor['id_forn'] ?? $data_fornecedor['ID_FORN'] ?? '');
                        $nameForn  = htmlspecialchars($data_fornecedor['nameforn'] ?? $data_fornecedor['NameForn'] ?? '');
                        $emailForn = htmlspecialchars($data_fornecedor['emailforn'] ?? $data_fornecedor['EmailForn'] ?? '');
                        $telForn   = htmlspecialchars($data_fornecedor['telforn'] ?? $data_fornecedor['TelForn'] ?? '');
                        $docForn   = htmlspecialchars($data_fornecedor['docforn'] ?? $data_fornecedor['DocForn'] ?? '');
                        $dateForn  = htmlspecialchars($data_fornecedor['dateforn'] ?? $data_fornecedor['DateForn'] ?? '');
                    ?>
                        <input type="hidden" name="acao" value="update_fornecedor">
                        <input type="hidden" id="ID_FORN" name="ID_FORN" value="<?=$idForn;?>">

                        <div class="form-group">
                            <label for="NameForn">Razão Social / Nome Fantasia</label>
                            <input type="text" id="NameForn" name="NameForn" value="<?=$nameForn;?>" required autofocus>
                        </div>

                        <div class="form-grid-2">
                            <div class="form-group">
                                <label for="EmailForn">E-mail Comercial</label>
                                <input type="email" id="EmailForn" name="EmailForn" value="<?=$emailForn;?>" required>
                            </div>

                            <div class="form-group">
                                <label for="TelForn">Telefone Comercial</label>
                                <input type="tel" id="TelForn" name="TelForn" minlength="11" maxlength="15" value="<?=$telForn;?>" required>
                            </div>
                        </div>

                        <div class="form-grid-2">
                            <div class="form-group">
                                <label for="DocForn">CPF ou CNPJ</label>
                                <input type="text" id="DocForn" name="DocForn" minlength="14" maxlength="18" value="<?=$docForn;?>" required>
                            </div>

                            <div class="form-group">
                                <label for="DateForn">Data de Fundação / Início</label>
                                <input type="date" id="DateForn" name="DateForn" value="<?=$dateForn;?>" required>
                            </div>
                        </div>

                    <?php elseif (isset($_GET['ID'])): 
                        $id       = htmlspecialchars($data_user['id'] ?? $data_user['ID'] ?? '');
                        $name     = htmlspecialchars($data_user['name'] ?? '');
                        $username = htmlspecialchars($data_user['username'] ?? '');
                        $email    = htmlspecialchars($data_user['email'] ?? '');
                    ?>
                        <input type="hidden" name="acao" value="update_user">
                        <input type="hidden" id="ID" name="ID" value="<?=$id;?>">

                        <div class="form-group">
                            <label for="name">Nome Completo</label>
                            <input type="text" id="name" name="name" value="<?=$name;?>" required autofocus>
                        </div>

                        <div class="form-grid-2">
                            <div class="form-group">
                                <label for="username">Nome de Usuário (Login)</label>
                                <input type="text" id="username" name="username" value="<?=$username;?>" oninput="this.value = this.value.replace(/[^a-zA-Z0-9_]/g,'');" required>
                            </div>

                            <div class="form-group">
                                <label for="email">E-mail</label>
                                <input type="email" id="email" name="email" value="<?=$email;?>" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password">Nova Senha (deixe em branco se não for alterar)</label>
                            <input type="password" id="password" name="password" placeholder="Digite uma nova senha para redefinir">
                        </div>
                    <?php endif; ?>

                    <div class="form-actions">
                        <button type="button" onclick="cancelEnvio()" class="btn btn-secondary">
                            Cancelar
                        </button>
                        <button type="submit" id="botao_salvar" name="botao_salvar" class="btn btn-primary">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8"></polyline></svg>
                            Salvar Alterações
                        </button>
                    </div>
                </form>
            </div>
        </main>

    <?php require_once('bottom_admin.php')?>