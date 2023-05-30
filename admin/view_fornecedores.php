<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Mercado Estácio - Fornecedores</title>
    <?php require('top_admin.php');

        require('../conexao.php');

        $select_fornecedores = mysqli_query($conexao, "SELECT * FROM fornecedores ORDER BY ID_FORN");
        
        if (mysqli_num_rows($select_fornecedores) > 0) {

            $dados_fornecedores = mysqli_fetch_assoc($select_fornecedores);

        } else {
            echo "<script> alert ('NÃO EXISTEM FORNECEDORES CADASTRADOS!');</script>";
            echo "<script> window.location.href='$url_admin/escolha.php';</script>";
        }
    ?>
		<div class="tabela">
			<div class="area_titulo">
                <h2>FORNECEDORES CADASTRADOS</h2>
                <a href="cad_fornecedor.php">
                    <button class="btn_incluir">
                        <img src="../Imagens/tabela/incluir.png">
                        <div class="text">Incluir</div>
                    </button>
                </a>
            </div>
            <table>	
                <tr class="tabela_cabecalho">
                    <th>NOME</th>
                    <th>EMAIL</th>
                    <th>TELEFONE</th>
                    <th>CPF/CNPJ</th>
                    <th>NASCIMENTO</th>
                </tr>
            <?php do{?>
                <tr class="tabela_desc">
                    <td class="desc"><?php echo $dados_fornecedores['NameForn'];?></td>
                    <td class="desc"><?php echo $dados_fornecedores['EmailForn'];?></td>
                    <td class="desc"><?php echo $dados_fornecedores['TelForn'];?></td>
                    <td class="desc"><?php echo $dados_fornecedores['DocForn'];?></td>
                    <td class="desc"><?php echo $dados_fornecedores['DateForn'];?></td>
                    <td class="acao">
                        <button class="btn_opcao">
                            <div class="btn_acao">
                                <a class="btn_edit"   href="edit.php?CodForn=<?=$dados_fornecedores['CodForn'];?>">
                                    <img src="../Imagens/tabela/lapis.png" class="img_edit" title="Editar">
                                </a>
                                <a class="btn_delete" href="javascript:func()" onclick="delete_fornecedor('<?=$dados_fornecedores['CodForn'];?>')">
                                    <img src="../Imagens/tabela/lixeira.png" class="img_delete" title="Excluir">
                                </a>
                            </div>
                            <img src="../Imagens/tabela/opcao.png" class="img_opcao">
                        </button>
                    </td>
                </tr>
            <?php }while ($dados_fornecedores = mysqli_fetch_assoc($select_fornecedores));?>
			</table>
		</div>
    </body>
    <?php require('botom_admin.php')?>
</html>