
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="estilo/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <title>Carrinho</title>
</head>
<body>
    <div class="div_top">
        <center><a href="index_produtos.php"><img src="img/uaumart.png" ></a> <a class="uaumart">Carrinho de Compras - UALMART</a>
            <a class="cadastro" href="index_produtos.php"style="margin-left:20%">Voltar</a>
        </center>
        
    </div> 
    <?php
    session_start();
    //adiciona ao carrinho
        if(!isset($_SESSION['itens']))
        {
            $_SESSION['itens'] = array();
        }
        if(isset($_GET['add']) && $_GET['add']=="carrinho")
        {
            $idProduto = $_GET['id'];
            if(!isset($_SESSION['itens'][$idProduto]))
            {
                $_SESSION['itens'][$idProduto] = 1;
            }else{
                $_SESSION['itens'][$idProduto] += 1;
            }
        }
        //exibe o carrinho
        if(count($_SESSION['itens'])== 0){
            echo 'Carrinho Vazio<br><a href="index_produtos.php">Adicionar Produtos </a>';
        }else{
            $conexao = new PDO("mysql:host=localhost;dbname=ualmart","root","");
            foreach($_SESSION['itens'] as $idProduto => $quantidade){
                $select = $conexao->prepare("SELECT * FROM Produtos WHERE IDProduto=?");
                $select->bindParam(1,$idProduto);
                $select->execute();
                $produtos = $select->fetchAll();
                @$total = $quantidade * $produtos[0]["Valor"];
                echo
                    'Nome: '.@$produtos[0]["Nome"].'<br/>
                    Preço: ' .number_format(@$produtos[0]["Valor"],2,",",".").'<br/>
                    Quantidade: '.$quantidade.'<br/>
                    Total: R$ '.number_format($total,2,",",".").'</br>
                    <a href="remover.php?remover=carrinho&id='.$idProduto.'">Remover</a>
                    <hr/>';
                    
            }
        }
    ?>
 </body>
</html> 