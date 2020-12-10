<?php
	
	$depoimentos = Painel::selectAll('tb-site.depoimentos');

?>

<div class="box-content">

	<h2 class=""><i class="fas fa-id-card"></i> Depoimentos Cadastrado</h2>

	<table>
		<tr>
			<td>Nome</td>
			<td>Depoimentos</td>
			<td>#</td>
			<td>#</td>
		</tr>

		<?php 
			foreach ($depoimentos as $key => $value) {
		?>

		<tr>
			<!--conteudo-->
			<td><?php echo $value['nome']; ?></td>
			<td><?php echo $value['depoimentos']; ?></td>
			<td><a class="btn edit" href=""><i class="fa fa-pencil-alt"></i> Editar</a></td>
			<td><a class="btn delete" href=""><i class="fa fa-times"></i> Deletar</a></td>
		</tr>

	<?php } ?>
	</table>

</div><!--box-content-->