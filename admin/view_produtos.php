<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Mercado Estácio - Produtos</title>
    <?php require('top_admin.php');

        require('../conexao.php');

        $select_produto = mysqli_query($conexao, "SELECT * FROM produtos ORDER BY ID_PRO");
    
        if (mysqli_num_rows($select_produto) > 0) {

            $dados_produto = mysqli_fetch_assoc($select_produto);

        } else {
            echo "<script> alert ('NÃO EXISTEM PRODUTOS CADASTRADOS!');</script>";
            echo "<script> window.location.href='$url_admin';</script>";
        }
    ?>
		<div class="tabela">
            <div class="area_titulo">
                <h2>PRODUTOS CADASTRADOS</h2>
                <a href="cad_produtos.php">
                    <button class="btn_incluir">
                        <img src="../Imagens/incluir.png">
                        <div class="text">Incluir</div>
                    </button>
                </a>
            </div>
            <table>	
                <tr class="tabela_cabecalho">
                    <th>CÓDIGO INTERNO</th>
                    <th>CÓDIGO DE BARRAS</th>
                    <th>DESCRIÇÃO</th>
                    <th>CATEGORIA</th>
                </tr>
            <?php do{?>
                <tr class="tabela_desc">
                    <td class="desc"><?php echo $dados_produto['CodPro'];?></td>
                    <td class="desc"><?php echo $dados_produto['CodBar'];?></td>
                    <td class="desc"><?php echo $dados_produto['DescPro'];?></td>
                    <td class="desc"><?php echo $dados_produto['CategPro'];?></td>
                    <!-- <td class="acao"> -->
                        <button class="btn_opcao">
                            <a href="edit.php?CodPro=<?php echo $dados_produto['CodPro'];?>">
                                <img src="../Imagens/tabela/lapis.png" class="botao_edit" title="Editar">
                            </a>
                            <a href="javascript:func()" onclick="delete_produto('<?php echo $dados_produto['CodPro'];?>')">
                                <img src="../Imagens/tabela/lixeira.png" class="botao_delete" title="Excluir">
                            </a>
                        </button>
                    <!-- </td> -->
                </tr>
            <?php }while ($dados_produto = mysqli_fetch_assoc($select_produto));?>
            </table>
		</div>
    </body>
    <?php require('botom_admin.php')?>
</html>