<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="estilo/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro&display=swap" rel="stylesheet">

    <!-- CONEXÃO COM O BANCO EM PDO -->
    <?php
        $conexao = new PDO("mysql:host=localhost;dbname=ualmart","root","");
        $conexao->exec('SET CHARACTER SET utf8');
    ?>


    <title>Cadastro de Clientes</title>
</head>
<body>
    <div class="div_top">
        <a href="login_adm.php"><img src="img/uaumart.png"style="margin-left:25%" ></a> <a class="uaumart">UAUMART</a>
        <img src="img/entrar.png" style="margin-left:40%; margin-bottom: 5px;" ><a class="jauvendas"style="margin-bottom: 10px;" href="login_cliente.html">Login</a>

    </div>
    
    <div class="above_cadastroelogin">
        <img src="img/a.png" style="margin-left:40%"><a class="uaumart">Cadastro</a>
    </div>

    <div class="cadastroelogin_cliente">   
        <form name="cliente" action="incluir_cliente.php" method="post">
        
            <b>Nome Completo:</b> <input type="text" name="nome" cols='50'><br><br>
            
            <b>CPF:</b> <input type="number" name="cpf"><br><br>
            
            <b>Sexo: </b>    
                <select name="sexo">
                        <option value="0" type="text">selecione</option>               
                        <option value="M" name="m" type="text" >M</option>
                        <option value="F" name="f" type="text" >F</option>
                </select>
            
            <b>Data de Nascimento: </b> <input type="date" name="data_nasc"><br><br>
        
            <b>Endereco:</b> <input type="text" name="endereco" cols='50'><br><br>

            <b>Telefone:</b> <input type="number"  name="telefone" cols='50'><br><br>
            
            <!-- SELECT DO ESTADO -->
            <b>Estado:</b>  
            <select name="estados" id="estados" >
                <?php
                $select = $conexao->prepare("SELECT * FROM estados ORDER BY nome ASC");
                $select->execute();
                $fetchAll = $select->fetchAll();
                foreach($fetchAll as $estados)
                {
                    echo '<option value="'.$estados['idestado'].'">'.$estados['nome'].'</option>';
                }
                ?>
            </select>
            
            <b>Cidade:</b><select id="cidades" name="cidade" style="display: none;"> </select>

    </div>

        <div id="under_cadastro">
            <b>Email</b> <input type="email" name="email" required placeholder="Digite um email válido" onblur="validarEmail()" onfocus="redefinirMsg()" id="email"/>
            <span id="error-email"></span><br><br>
            
            <b>Confirmar Email:</b> <input type="text" name="repetir_email" required placeholder="Confirmar Email" oninput="confereEmail(this)" /><br><br>

            <b>Senha</b> <input type="password" name="senha" ><br><br>

            <input type="submit" value="Ok">&nbsp;&nbsp;
            <input type="reset" value="Limpar">
        </div>

        </form>
<!-- MAIS PERFOMANCE, POIS A PAGINA VAI CARREGAR RAPIDAMENTE E POR FIM EXECUTAR OS SCRIPTS -->
<script type="text/javascript" src="js_cidades/js.js"></script>
<!-- CND - PEGA A BIBLIOTECA PELO SERVIDOR--> 
<script type="text/JavaScript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js" ></script> 


</body>
</html>


<!-- EVENTO CHANGE PARA POPULAR O CAMPO CIDADE -->
<script>
    $("#estados").on("change",function(){
        var idEstado = $("#estados").val();

        $.ajax({
            url: 'buscaCidades.php',
            type: 'POST',
            data:{id:idEstado},
            beforeSend: function(){
                $("#cidades").css({'display':'inline'});
                $("#cidades").html("Carregando...");
            },
            success: function(data)
            {
                $("#cidades").css({'display':'inline'});
                $("#cidades").html(data);
            },
            error: function(data)
            {
                $("#cidades").css({'display':'inline'});
                $("#cidades").html("Houve um erro ao carregar");s
            }
        });
    });
</script>