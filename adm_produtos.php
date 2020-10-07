<?php
session_start();
include_once('conexao.php');

//CONSULTA NO BANCO DE DADOS
		$result_produto = "SELECT IDProduto, p.Nome, p.Valor, p.Marca, p.Detalhes, p.Descricao, p.Foto, pc.nome as Categoria from Produtos p 
		inner join Categorias pc
		on p.id_categoria = pc.IDCategoria
		order by IDProduto asc;"; 
		
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
				<th>Editar || Deletar</th>
			</tr>
		</thead>
		<tbody>
		
			<?php

    while($row_produto = mysqli_fetch_assoc($resultado_produto)){
            ?>

			<style>
					.imagem{
					width: 50%;
					height: auto;
					}

					.td1{
						width: 40%
					}
			</style>
				<tr>
					<?php  $row_produto['IDProduto']; ?></td>
                    <td><?php echo $row_produto['Nome']; ?></td>
					<td><?php echo $row_produto['Valor']; ?></td>
					<td><?php echo $row_produto['Marca']; ?></td>
					<td><?php echo $row_produto['Detalhes']; ?></td>
					<td><?php echo $row_produto['Descricao']; ?></td>
					<td class="td1"> <center><?php echo "<img class='imagem' src='" . $row_produto['Foto'] . "'>"?></center></td>
					<td><?php echo $row_produto['Categoria']; ?></td>
					<td> <?php echo "<a href='editar_produto.php?id=" . $row_produto['IDProduto'] . "'>Editar</a>"?> &nbsp;
					&nbsp;&nbsp; <?php echo "<a href='proc_apagar_produto.php?id=" . $row_produto['IDProduto'] . "'>Deletar</a><br><hr>"?></td>
				</tr>
				<?php
			}   ?>
		</tbody>
	</table>
<?php
}else{
	echo "<div class='alert alert-danger' role='alert'>Nenhum produto encontrado!</div>";
}
