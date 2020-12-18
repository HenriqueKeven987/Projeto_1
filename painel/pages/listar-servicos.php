<?php
	//servicos por pagina
	$paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
	$porPagina = 8;
	$servicos = Painel::selectAll('tb-site.servicos',($paginaAtual - 1) * $porPagina,$porPagina);

	//excluir Registro
	if (isset($_GET['excluir'])) {
		$idExclur = intval($_GET['excluir']);
		Painel::deletarRegistro('tb-site.servicos',$idExclur);
		Painel::redirect(INCLUDE_PATH_PAINEL.'listar-servicos');

	}else if(isset($_GET['order']) && isset($_GET['id'])) {
		Painel::orderItem('tb-site.servicos',$_GET['order'],$_GET['id']);
		Painel::redirect(INCLUDE_PATH_PAINEL.'listar-servicos');
	}


?>

<div class="box-content">

	<h2 class=""><i class="fas fa-id-card"></i> Servicos Cadastrado</h2>

	<div class="whaper-table">
		<table>
			<tr>
				<td>Servicos</td>
				<td>#</td>
				<td>#</td>
				<td>#</td>
				<td>#</td>
			</tr>

			<?php 
				foreach ($servicos as $key => $value) {
			?>
				<tr>
					<!--conteudo-->
					<td><?php echo $value['servicos']; ?></td>
					<td><a class="btn edit" href="<?php INCLUDE_PATH_PAINEL; ?>editar-servicos?id=<?php echo $value['id']; ?>"><i class="fa fa-pencil-alt"></i> Editar</a></td>
					<td><a actionBtn="delete" class="btn delete" href="<?php INCLUDE_PATH_PAINEL; ?>listar-servicos?excluir=<?php echo $value['id']; ?>"><i class="fa fa-times"></i> Deletar</a></td>
					<td><a class="btn order" href="<?php INCLUDE_PATH_PAINEL ?>listar-servicos?order=up&id=<?php echo $value['id']; ?>"><i class="fas fa-arrow-up"></i></a></td>
					<td><a class="btn order" href="<?php INCLUDE_PATH_PAINEL ?>listar-servicos?order=down&id=<?php echo $value['id']; ?>"><i class="fas fa-arrow-down"></i></a></td>
				</tr>

			<?php } ?>
		</table>
	</div><!--whaper-table-->

	<div class="paginacao">
		<?php
							//ceil vai fazer com q se o valor for float vai arredondar para cima
			$totalPaginas = ceil(count(Painel::selectAll('tb-site.servicos')) / $porPagina);


			for($i = 1;$i <= $totalPaginas; $i++){
				if ($i == $paginaAtual) 
					echo '<a class="page-select" href="'.INCLUDE_PATH_PAINEL.'listar-servicos?pagina='.$i.'">'.$i.'</a>';
				else
					echo '<a href="'.INCLUDE_PATH_PAINEL.'listar-servicos?pagina='.$i.'">'.$i.'</a>';
				
			}

		?>
	</div><!--paginacao-->

</div><!--box-content-->