<?php
session_start();
$categoria = $_SESSION['categoria'];
include_once('conexao.php');

//CONSULTA NO BANCO DE DADOS
if($categoria == null){
	$result_produto = "SELECT IDProduto, p.Nome, p.Valor, p.Marca, p.Detalhes, p.Descricao, p.Foto, pc.nome as Categoria from Produtos p 
		inner join Categorias pc
		on p.id_categoria = pc.IDCategoria


	
	order by IDProduto asc;"; 
}else{
	$categoria = $_SESSION['categoria'];
	$result_produto = "SELECT IDProduto, p.Nome, p.Valor, p.Marca, p.Detalhes, p.Descricao, p.Foto, pc.nome as Categoria from Produtos p 
		inner join Categorias pc
		on p.id_categoria = pc.IDCategoria

		where ID_Categoria = $categoria
		order by IDProduto asc;"; 
}


					
$resultado_produto  = @mysqli_query($conexao, $result_produto);
//VERIFICANDO SE RETORNOU REGISTROS
if(($resultado_produto) and ($resultado_produto->num_rows != 0)) {
    ?>
	<table class="table table-striped table-bordered table-hover">
		<thead class="thead-dark">
			<tr>
            <th>Nome</th>
				<th>Valor</th>
				<th>Marca</th>
				<th>Detalhes</th>
				<th>Descricao</th>
				<th>Foto</th>
				<th>Categoria</th>
				<th>Carrinho</th>
			</tr>
		</thead>
		<tbody>
		
			<?php

    while($row_produto = mysqli_fetch_assoc($resultado_produto)){
            ?>

			<style>
					.imagem{
					width: 40%;
					height: auto;
				}
			</style>
				<tr>
                    <td><?php echo $row_produto['Nome']; ?></td>
					<td><?php echo number_format($row_produto ['Valor'],2,",","."); ?></td>
					<td><?php echo $row_produto['Marca']; ?></td>
					<td><?php echo $row_produto['Detalhes']; ?></td>
					<td><?php echo $row_produto['Descricao']; ?></td>
					<td> <center><?php echo "<img class='imagem' src='" . $row_produto['Foto'] . "'>"?></center></td>
					<td><?php echo $row_produto['Categoria']; ?></td>
					<td><?php echo "<a href='carrinho.php?add=carrinho&id=" . $row_produto['IDProduto'] . "'>Adicionar ao Carrinho</a>"?>
				</tr>
				<?php
			}   ?>
		</tbody>
	</table>
<?php
}else{
	echo "<div class='alert alert-danger' role='alert'>Nenhum produto encontrado!</div>";
}
