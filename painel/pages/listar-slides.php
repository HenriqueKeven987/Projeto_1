<?php
	//slide por pagina
	$paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
	$porPagina = 8;
	$slide = Painel::selectAll('tb-site.slide',($paginaAtual - 1) * $porPagina,$porPagina);

	//excluir Registro
	if (isset($_GET['excluir'])) {
		$idExclur = intval($_GET['excluir']);
		$imagemSelect = Mysql::conectar()->prepare("SELECT slide FROM `tb-site.slide` WHERE id = ?");
		$imagemSelect->execute(array($_GET['excluir']));
		$imagem = $imagemSelect->fetch()['slide'];
		Painel::deleteFile($imagem);
		Painel::deletarRegistro('tb-site.slide',$idExclur);
		Painel::redirect(INCLUDE_PATH_PAINEL.'listar-slides');

	}else if(isset($_GET['order']) && isset($_GET['id'])) {
		Painel::orderItem('tb-site.slide',$_GET['order'],$_GET['id']);
		Painel::redirect(INCLUDE_PATH_PAINEL.'listar-slides');
	}

?>

<div class="box-content">

	<h2 class=""><i class="fas fa-id-card"></i> Slides Cadastrado</h2>

	<div class="whaper-table">
		<table>
			<tr>
				<td>Nome</td>
				<td>slide</td>
				<td>#</td>
				<td>#</td>
				<td>#</td>
				<td>#</td>
			</tr>

			<?php 
				foreach ($slide as $key => $value) {
			?>
				<tr>
					<!--conteudo-->
					<td><?php echo $value['nome']; ?></td>
					<td><img style="width: 70px;height: 50px;" src="<?php echo INCLUDE_PATH_PAINEL?>uploads/<?php echo $value['slide']; ?>"></td>
					<td><a class="btn edit" href="<?php INCLUDE_PATH_PAINEL; ?>editar-slide?id=<?php echo $value['id']; ?>"><i class="fa fa-pencil-alt"></i> Editar</a></td>
					<td><a actionBtn="delete" class="btn delete" href="<?php INCLUDE_PATH_PAINEL; ?>listar-slides?excluir=<?php echo $value['id']; ?>"><i class="fa fa-times"></i> Deletar</a></td>
					<td><a class="btn order" href="<?php INCLUDE_PATH_PAINEL ?>listar-slides?order=up&id=<?php echo $value['id']; ?>"><i class="fas fa-arrow-up"></i></a></td>
					<td><a class="btn order" href="<?php INCLUDE_PATH_PAINEL ?>listar-slides?order=down&id=<?php echo $value['id']; ?>"><i class="fas fa-arrow-down"></i></a></td>
				</tr>

			<?php } ?>
		</table>
	</div><!--whaper-table-->

	<div class="paginacao">
		<?php
							//ceil vai fazer com q se o valor for float vai arredondar para cima
			$totalPaginas = ceil(count(Painel::selectAll('tb-site.slide')) / $porPagina);


			for($i = 1;$i <= $totalPaginas; $i++){
				if ($i == $paginaAtual) 
					echo '<a class="page-select" href="'.INCLUDE_PATH_PAINEL.'listar-slide?pagina='.$i.'">'.$i.'</a>';
				else
					echo '<a href="'.INCLUDE_PATH_PAINEL.'listar-slide?pagina='.$i.'">'.$i.'</a>';
				
			}

		?>
	</div><!--paginacao-->

</div><!--box-content-->