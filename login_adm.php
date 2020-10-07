<?php
session_start();
include('conexao.php');

if(empty($_POST['email']) || empty ($_POST['senha'])){
    header('Location: login_adm.html');
    exit();
}

$email = mysqli_real_escape_string($conexao, $_POST['email']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

$query = "select idUsuarioadm, email from usuarios_adm where email ='{$email}' and senha = '{$senha}'";

$result = mysqli_query($conexao, $query);

$row= mysqli_num_rows($result);

$arrayResultado = mysqli_fetch_assoc($result); 

if($row == 1){  
    $_SESSION['email'] = $email;
    $_SESSION['idUsuarioadm'] = $arrayResultado['idUsuarioadm'];
    header('Location: index_adm.php');
    exit();
} 
else {
    $_SESSION['nao_autenticado'] = true;
    header ('Location: login_adm.html');
    exit();
}
?>