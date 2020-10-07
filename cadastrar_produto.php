<?php
    session_start();

	include_once('conexao.php');
	$nome = trim($_POST['nome']);
	$valor = trim($_POST['valor']);
	$marca = trim($_POST['marca']);
	$detalhes = trim($_POST['detalhes']);
    $descricao = trim($_POST['descricao']);
    $categoria = ($_POST['categoria']);

    $idadministrador = $_SESSION['idUsuarioadm'];
  

    if(isset($_FILES["img_produto"])){

        $arquivo = $_FILES['img_produto']['name'];
        //diretorio dos arquivos
        $pasta_dir = "img_produtos/todos_produtos/";
        // Faz o upload da imagem
        $arquivo_nome = $pasta_dir . $arquivo;
        //salva no banco
        move_uploaded_file($_FILES["img_produto"]['tmp_name'], $arquivo_nome);

        
	$sqlinsert = "insert into produtos (nome, valor, id_categoria, marca, detalhes, descricao, foto, ID_Adm)
    values ('$nome', $valor, $categoria, '$marca', '$detalhes', '$descricao','$arquivo_nome', '$idadministrador')";
    mysqli_query($conexao,$sqlinsert) or die("Erro ao tentar cadastrar registro" . mysqli_error($conexao));

    
    mysqli_close($conexao);
}
    echo   '<script type="text/javascript">
                alert("Salvo com Sucesso !");
                window.history.go(-1);
            </script>';
    header ('Location: index_adm.php');

	