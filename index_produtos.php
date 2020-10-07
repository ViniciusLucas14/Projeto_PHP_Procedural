<?php session_start(); ?>
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
    
    <title>Produtos</title>
</head>


<body class="body_produtos">

    <div class="div_undertop">
       
            <div class="search_box">
            <img src="img/uaumart.png" style="margin-left: 50px;"> <a class="uaumart" href="index_produtos.php">UAUMART</a>
                <input type="text" placeholder="Search"/>
                <a class="index" href="login_cliente.html" > <img src="img/login_index.png"  style="margin-left: 50px;">Olá,<?php echo(@$_SESSION['nome']); ?></a>
                <img src="img/add-user.png" ><a class="index" href="cadastro_cliente.php">Cadastro</a>
            </div>
    </div>

    <div id="category">
        <center><img src="img/caixa.png" > <a class="index"><strong><?php echo @$valor = $_GET['p']; ?></strong></a></center>
    </div>
    
    <section>
        <div class="div_produtos">
                <span id="conteudo"></span>
            </div>
    </section>  

    <div class="menuu">
        <nav class="menu">
            <ul>
                <li><a class="titulo" href="#">CATEGORIAS</a>
                    <ul>
                        <li><a href="./index_produtos.php?p=Acessorios">Acessórios </a></li>
                        <li><a href="./index_produtos.php?p=Beleza">Beleza e Cuidado Pessoal </a></li>
                        <li><a href="./index_produtos.php?p=Brinquedos">Brinquedos </a></li>
                        <li><a href="./index_produtos.php?p=Eletrodomesticos">Eletrodomésticos </a></li>
                        <li><a href="./index_produtos.php?p=Esporte">Esporte e lazer</a></li>     
                        <li><a href="./index_produtos.php?p=Ferramentas">Ferramentas </a></li>
                        <li><a href="./index_produtos.php?p=Calcados">Calçados </a></li>
                        <li><a href="./index_produtos.php?p=Itenscasa">Itens de Casa </a></li>
                        <li><a href="./index_produtos.php?p=Itenspessoais">Itens Pessoais </a></li>
                        <li><a href="./index_produtos.php?p=Joias">Jóias </a></li>
                        <li><a href="./index_produtos.php?p=Leitura">Leitura </a></li>
                        <li><a href="./index_produtos.php?p=Moda">Moda e Roupas</a></li>
                        <li><a href="./index_produtos.php?p=Relogios">Relógios</a></li>
                        <li><a href="./index_produtos.php?p=Tecnologia">Tecnologia</a></li>
                    </ul>
                </li>
                <li><a class="titulo" href="login_adm.php">AREA ADM</a></li>
            </ul>
        </nav>
    </div>

    <?php
    if ( isset( $_GET['p'] ) )
    {
        $valor = $_GET['p'];
        if ($valor == 'Acessorios') {
            $categoria = 10;
            $_SESSION['categoria'] = $categoria;
            require_once ('index_produtos.php');
        } 

        if ($valor == 'Beleza') {
            $categoria = 11;
            $_SESSION['categoria'] = $categoria;
            require_once ('index_produtos.php'); 
        }        

        if ($valor == 'Brinquedos') {
            $categoria = 8;
            $_SESSION['categoria'] = $categoria;
            require_once ('index_produtos.php'); 
        }        

        if ($valor == 'Eletrodomesticos') {
            $categoria = 1;
            $_SESSION['categoria'] = $categoria;
            require_once ('index_produtos.php'); 
        }        


        if ($valor == 'Esporte') {
            $categoria = 5;
            $_SESSION['categoria'] = $categoria;
            require_once ('index_produtos.php');
        } 


        if ($valor == 'Ferramentas') {
            $categoria = 9;
            $_SESSION['categoria'] = $categoria;
            require_once ('index_produtos.php'); 
        }        

        if ($valor == 'Calcados') {
            $categoria = 14;
            $_SESSION['categoria'] = $categoria;
            require_once ('index_produtos.php'); 
        }        

        if ($valor == 'Itenscasa') {
            $categoria = 2;
            $_SESSION['categoria'] = $categoria;
            require_once ('index_produtos.php'); 
        }        

        if ($valor == 'Itenspessoais') {
            $categoria = 15;
            $_SESSION['categoria'] = $categoria;
            require_once ('index_produtos.php'); 
        }        

        if ($valor == 'Joias') {
            $categoria = 6;
            $_SESSION['categoria'] = $categoria;
            require_once ('index_produtos.php'); 
        }        

        if ($valor == 'Leitura') {
            $categoria = 13;
            $_SESSION['categoria'] = $categoria;
            require_once ('index_produtos.php'); 
        }        

        if ($valor == 'Moda') {
            $categoria = 12;
            $_SESSION['categoria'] = $categoria;
            require_once ('index_produtos.php'); 
        }        

        if ($valor == 'Relogios') {
            $categoria = 7;
            $_SESSION['categoria'] = $categoria;
            require_once ('index_produtos.php'); 
        }        

        if ($valor == 'Tecnologia') {
            $categoria = 4;
            $_SESSION['categoria'] = $categoria;
            require_once ('index_produtos.php'); 
        }        
        
    }else{
        $categoria = null;
        $_SESSION['categoria'] = $categoria;
        require_once ('index_produtos.php');

    }
       
    ?>

            <script>
                $(document).ready(function () {
                    $.post('listar_produtos.php', function(retorna){
                        $("#conteudo").html(retorna)     
                    });
                });
            </script>

</body>
</html>