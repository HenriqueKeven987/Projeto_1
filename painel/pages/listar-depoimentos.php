<?php
	//depoimentos por pagina
	$paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
	$porPagina = 8;
	$depoimentos = Painel::selectAll('tb-site.depoimentos',($paginaAtual - 1) * $porPagina,$porPagina);

	//excluir Registro
	if (isset($_GET['excluir'])) {
		$idExclur = intval($_GET['excluir']);
		Painel::deletarRegistro('tb-site.depoimentos',$idExclur);
		Painel::redirect(INCLUDE_PATH_PAINEL.'listar-depoimentos');	
	}
?>

<div class="box-content">

	<h2 class=""><i class="fas fa-id-card"></i> Depoimentos Cadastrado</h2>

	<div class="whaper-table">
		<table>
			<tr>
				<td>Nome</td>
				<td>Depoimentos</td>
				<td>Data</td>
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
					<td><?php echo $value['data']; ?></td>
					<td><a class="btn edit" href="<?php INCLUDE_PATH_PAINEL; ?>editar-depoimentos?id=<?php echo $value['id']; ?>"><i class="fa fa-pencil-alt"></i> Editar</a></td>
					<td><a actionBtn="delete" class="btn delete" href="<?php INCLUDE_PATH_PAINEL; ?>listar-depoimentos?excluir=<?php echo $value['id']; ?>"><i class="fa fa-times"></i> Deletar</a></td>
				</tr>

			<?php } ?>
		</table>
	</div><!--whaper-table-->

	<div class="paginacao">
		<?php
							//ceil vai fazer com q se o valor for float vai arredondar para cima
			$totalPaginas = ceil(count(Painel::selectAll('tb-site.depoimentos')) / $porPagina);


			for($i = 1;$i <= $totalPaginas; $i++){
				if ($i == $paginaAtual) 
					echo '<a class="page-select" href="'.INCLUDE_PATH_PAINEL.'listar-depoimentos?pagina='.$i.'">'.$i.'</a>';
				else
					echo '<a href="'.INCLUDE_PATH_PAINEL.'listar-depoimentos?pagina='.$i.'">'.$i.'</a>';
				
			}

		?>
	</div><!--paginacao-->

</div><!--box-content-->