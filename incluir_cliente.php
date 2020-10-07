<html>
<meta charset="utf-8">

<title> PHP com Banco de Dados - Inclusão </title>
<body>
<h3>Inclusão</h3>
<?php
	include_once('conexao.php');

	$nome = trim($_POST['nome']);
	$cpf = trim($_POST['cpf']);
	$sexo = trim($_POST['sexo']);
	$data_nasc = $_POST['data_nasc'];
	$endereco = trim($_POST['endereco']);
	$email = trim($_POST['email']);
	$senha = md5($_POST['senha']);
	$telefone = trim($_POST['telefone']);
	$cidade = ($_POST['cidade']); 

	$sqlinsert = "insert into clientes (nome, cpf, sexo, data_nasc,endereco, email, senha, telefone, id_cidade)
	values ('$nome',$cpf,'$sexo','$data_nasc','$endereco','$email', '$senha','$telefone', $cidade)";
	

	$resultado = @mysqli_query($conexao, $sqlinsert);
	if (!$resultado)
	{
		die('Query Inválida'. @mysqli_error($conexao));
	} 
	else 
	{
		echo "Registro Cadastro com Sucesso";
	}
	mysqli_close($conexao);
?>
	<br><br>
	<input type='button' onclick="window.location='login_cliente.html';"value="Login">
</body>