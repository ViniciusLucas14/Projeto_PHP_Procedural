<?php
session_start();
include_once("conexao.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_produto = "SELECT * FROM produtos WHERE IDProduto = $id";
$resultado_produto = @mysqli_query($conexao, $result_produto);
$row_produto = mysqli_fetch_assoc($resultado_produto);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CND - PEGA A BIBLIOTECA PELO SERVIDOR--> 
    <script type="text/JavaScript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js" ></script> 

    <link href="estilo/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sen:wght@700&display=swap" rel="stylesheet">
    <link href="cssTABELA/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <?php
        $conexao = new PDO("mysql:host=localhost;dbname=ualmart","root","");
        $conexao->exec('SET CHARACTER SET utf8');
    ?>
    <title>Editar Produtos</title>
</head>

<body>
        <div class="div_top">
                <a href="login_adm.php"><img src="img/uaumart.png"style="margin-left:25%" ></a> <a class="uaumart">UAUMART</a>
        </div>
            <div class="div_conteudo">
                <div class="topo_conteudo">
                    <img src="img/cadastro.png" >
                    <a class="cadastro">Edição de Produto</a>
                    <a class="cadastro" href="index_adm.php"style="margin-left:50%">Voltar</a>
                </div><br>

            <form method="POST" action="proc_edit_produto.php">
                <input type="hidden" name="IDProduto" value="<?php echo $row_produto['IDProduto']; ?>">
                <fieldset>
                            <legend>Informação do Produto</legend>
                            <p>Produto: <input class="inputs_cadastro" type="text" name="nome" value="<?php echo $row_produto['Nome']; ?>"/></p>
                            <p>Preço: <input class="inputs_cadastro" type="number"  name="valor" value="<?php echo $row_produto['Valor']; ?>"/></p>
                        </fieldset><br>

                        <fieldset>
                            <legend>Tipo do produto</legend>
                            <p>Categoria:</p>
                            <select name="categoria" id="categorias"value="<?php echo $row_produto['Categoria']; ?>">
                                <?php
                                $select = $conexao->prepare("SELECT * FROM Categorias ORDER BY nome ASC");
                                $select->execute();
                                $fetchAll = $select->fetchAll();
                                foreach($fetchAll as $categorias)
                                {
                                    echo '<option value="'.$categorias['IDCategoria'].'">'.$categorias['nome'].'</option>';
                                }
                                ?>
                            </select>
                        </fieldset><br>

                        <fieldset>
                            <legend>Marca do Produto</legend>
                            <p>Marca: <input class="inputs_cadastro" type="text"  name="marca" value="<?php echo $row_produto['Marca']; ?>"/></p>
                        </fieldset>    

                        <fieldset>
                            <legend>Informações adicionais do Produto</legend>
                            <p>Detalhes: <input class="inputs_cadastro" type="text"  name="detalhes" value="<?php echo $row_produto['Detalhes']; ?>"></p>
                            <p style="display:inline-flex;">Descrição: <textarea class="inputs_cadastro" type="text" rows='4'cols='100'  name="descricao" value="<?php echo $row_produto['Descricao']; ?>"></textarea></p>
                        </fieldset>

                        <fieldset>
                            <legend>Imagens do Produto</legend>
                            <p>Imagem: </b><input type="file" name="img_produto"> </p>
                        </fieldset>
                        
                        <input type="submit" value="Editar">
        </div>
		    </form>
	</body>
</html>