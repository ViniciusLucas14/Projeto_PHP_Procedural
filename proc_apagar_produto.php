<?php
session_start();
include_once("conexao.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if(!empty($id)){
	$result_produto = "DELETE FROM Produtos WHERE IDProduto='$id'";
	$resultado_produto = mysqli_query($conexao, $result_produto);
	if(mysqli_affected_rows($conexao)){
		$_SESSION['msg'] = "<p style='color:green;'>Produto apagado com sucesso</p>";
		header("Location: index_adm.php");
	}else{
		
		$_SESSION['msg'] = "<p style='color:red;'>Erro o Produto não foi apagado com sucesso</p>";
		header("Location: index_adm.php");
	}
}else{	
	$_SESSION['msg'] = "<p style='color:red;'>Necessário selecionar um Produto</p>";
	header("Location: index_adm.php");
}
