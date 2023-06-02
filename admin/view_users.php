<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Mercado Estácio - Usuários</title>
    <?php require('top_admin.php');

        require('../conexao.php');

        $select_users = mysqli_query($conexao, "SELECT * FROM login ORDER BY ID");
    
        if (mysqli_num_rows($select_users) > 0) {

            $data_users = mysqli_fetch_assoc($select_users);

        } else {
            echo "<script> alert ('NÃO EXISTEM USUÁRIOS CADASTRADOS!');</script>";
            echo "<script> window.location.href='$url_admin';</script>";
        }
    ?>
		<div class="tabela" id="tabela">
            <div class="area_titulo">
                <h2>USUÁRIOS CADASTRADOS</h2>
                <a href="cad_user.php">
                    <button class="btn_incluir">
                        <img src="../Imagens/tabela/incluir.png">
                        <div class="text">Incluir</div>
                    </button>
                </a>
            </div>
            <table>	
                <tr class="tabela_cabecalho">
                    <th>Nome</th>
                    <th>Usuários</th>
                    <th>Email</th>
                    <th>Senha</th>
                </tr>
            <?php do{?>
                <tr class="tabela_desc">
                    <td class="desc"><?php echo $data_users['name'];?></td>
                    <td class="desc"><?php echo $data_users['username'];?></td>
                    <td class="desc"><?php echo $data_users['email'];?></td>
                    <td class="desc"><?php echo $data_users['password'];?></td>
                    <td class="acao">
                        <button class="btn_opcao">
                            <div class="btn_acao">
                                <a class="btn_edit"   href="edit.php?ID=<?=$data_users['ID'];?>">
                                    <img src="../Imagens/tabela/lapis.png" class="img_edit img_acao" title="Editar">
                                </a>
                                <a class="btn_delete" href="javascript:func()" onclick="delete_user('<?=$data_users['ID'];?>')">
                                    <img src="../Imagens/tabela/lixeira.png" class="img_delete img_acao" title="Excluir">
                                </a>
                            </div>
                            <img src="../Imagens/tabela/opcao.png" class="img_opcao">
                        </button>
                    </td>
                </tr>
            <?php }while ($data_users = mysqli_fetch_assoc($select_users));?>
            </table>
		</div>
    </body>
    <?php require('bottom_admin.php')?>
</html>