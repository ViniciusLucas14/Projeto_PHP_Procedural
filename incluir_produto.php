<?php
    session_start();
    $_SESSION['idUsuarioadm'];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="estilo/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sen:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:ital@1&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro&display=swap" rel="stylesheet">

     <?php
        $conexao = new PDO("mysql:host=localhost;dbname=ualmart","root","");
        $conexao->exec('SET CHARACTER SET utf8');
    ?>
    <title>Cadastrar Produto</title>
</head>

<body>
    
    <div class="div_top">
        <a href="login_adm.php"><img src="img/uaumart.png"style="margin-left:25%" ></a> <a class="uaumart">UAUMART</a>
    </div>

        <div class="div_conteudo">
                <div class="topo_conteudo">
                    <img src="img/cadastro.png" >
                    <a class="cadastro">Cadastro</a>
                    <a class="cadastro" href="index_adm.php"style="margin-left:70%">Voltar</a>
                </div><br>
                
    <form name="vendedor" action="cadastrar_produto.php" method="post" enctype="multipart/form-data">
                    <fieldset>
                        <legend>Informação do Produto</legend>
                        <p>Produto: <input class="inputs_cadastro" type="text" name="nome" /></p>
                        <p>Preço: <input class="inputs_cadastro" type="number"  name="valor" /></p>
                    </fieldset><br>

                    <fieldset>
                        <legend>Tipo do produto</legend>
                        <p>Categoria:</p>
                        <select name="categoria" id="categorias" >
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
                        <p>Marca: <input class="inputs_cadastro" type="text"  name="marca"/></p>
                    </fieldset>    

                    <fieldset>
                        <legend>Informações adicionais do Produto</legend>
                        <p>Detalhes: <input class="inputs_cadastro" type="text"  name="detalhes"></p>
                        <p style="display:inline-flex;">Descrição: <textarea class="inputs_cadastro" type="text" rows='4'cols='100'  name="descricao"></textarea></p>
                    </fieldset>

                    <fieldset>
                        <legend>Imagens do Produto</legend>
                        <p>Imagem: </b><input type="file" name="img_produto"> </p>
                        
                        <input class="submit" type="submit" value="Salvar">&nbsp;&nbsp;
                    </fieldset>
            </div>
    </form>
</body>
</html>