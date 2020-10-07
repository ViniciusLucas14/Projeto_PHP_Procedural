<?php
session_start();
include('conexao.php');

if(empty($_POST['email']) || empty ($_POST['senha'])){
    header('Location: login_cliente.html');
    exit();
}

$email = mysqli_real_escape_string($conexao, $_POST['email']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

$nome = mysqli_real_escape_string($conexao, $_POST['nome']);

$query = "select idcliente, email, nome from clientes where email ='{$email}' and senha = md5('{$senha}')";

$result = mysqli_query($conexao, $query);

 foreach($result as $k => $registro){
     echo($registro['nome']);
}

if ($result = $conexao->query($query)) {
    while ($row = $result->fetch_row()) {
        $_SESSION['nome'] =  $row[2];
        header('Location: index_produtos.php');
        exit();
    }
} 
else {
    $_SESSION['nao_autenticado'] = true;
    header ('Location: erro.html');
    exit();
}
?>
