
<?php 
	
	if (isset($_GET['id'])) {
					//pegando o id
		$id = intval($_GET['id']);
		$depoimentos = Painel::select('tb-site.depoimentos','id = ?',array($id));		
	}else{
		Painel::alertSuccess('erro','Voce Precissa Passar o id');
		die();
	}	


?>


<div class="box-content">

	<h2 class=""><i class="fas fa-user-edit"></i> Editar Depoimento</h2>
					
	<form method="post">

		<?php

			if (isset($_POST['acao'])) {

				$nome = $_POST['nome'];

				if (Painel::update($_POST)) {
					Painel::alertSuccess('sucesso','O Depoimento de '.$nome.' foi atualizado');
					$depoimentos = Painel::select('tb-site.depoimentos','id = ?',array($id));		
				}else{
					Painel::alertSuccess('erro','Ocorreu algum Erro');
				}								
			
			}

		?>
	
		<div class="form-group">

			<label>Author:</label>
			<input type="text" name="nome" required value="<?php echo $depoimentos['nome']; ?>">

		</div><!--form-group-->

		<div class="form-group">

			<label>Depoimento: </label>
			<textarea name="depoimentos" required> <?php echo $depoimentos['depoimentos'];?></textarea>

		</div><!--form-group-->

		<div class="form-group">

			<label>Data: </label>
			<input type="text" formato="data" name="data" required value="<?php echo date('d/m/Y'); ?>">

		</div><!--form-group-->

		<div class="form-group">
			<input type="hidden" name="nome_tabela" value="tb-site.depoimentos">
			<input type="submit" name="acao" value="Atualizar!">

		</div><!--form-group-->

	</form>


</div><!--box-content-->