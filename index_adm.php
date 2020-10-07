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
     
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
    <title>Produtos</title>
</head>


<body class="body_produtos">
    
    <div class="div_top">
        <img src="img/uaumart.png" ><a class="uaumart" href="index_produtos.php">UAUMART</a>
        <img src="img/adm.png" style="margin-left:25%"> <a class="uaumart"> Área do Administrador</a>
    </div>
    
  

    <section>
            <div class="div_produtos">
                <div class="all_produtos"><a href="incluir_produto.php"><h1><center><img src="img/add.png">Cadastrar novo produto </h1></center></a></div>      
                <?php
                    if(isset($_SESSION['msg'])){
                        echo $_SESSION['msg'];
                        unset($_SESSION['msg']);
                    }
                ?>   
                    <span id="conteudo"></span>
                </div>
            </div>
    </section>
 
    <script>
        $(document).ready(function () {
            $.post('adm_produtos.php', function(retorna){
                $("#conteudo").html(retorna)     
        });
            });
            </script>

</body>
</html>