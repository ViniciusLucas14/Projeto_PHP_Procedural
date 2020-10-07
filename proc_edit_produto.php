<?php
session_start();
include_once("conexao.php");

$id = trim($_POST['IDProduto']);
$nome = trim($_POST['nome']);
$valor = trim($_POST['valor']);
$marca = trim($_POST['marca']);
$detalhes = trim($_POST['detalhes']);
$descricao = trim($_POST['descricao']);
$categoria = ($_POST['categoria']);
// $arquivo   = $_FILES['img_produto'];  

$result_produto = "UPDATE produtos SET nome='$nome', valor=$valor, marca='$marca', detalhes='$detalhes', descricao='$descricao', ID_Categoria='$categoria' WHERE IDProduto='$id'";
$resultado_produto = mysqli_query($conexao, $result_produto);

if(mysqli_affected_rows($conexao)){
	$_SESSION['msg'] = "<p style='color:green;'>Produto editado com sucesso</p>";
	header("Location: index_adm.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Produto não foi editado com sucesso</p>";
	header("Location: editar_produto.php?IDProduto=$id");
}
