
<?php 
	
	if (isset($_GET['id'])) {
					//pegando o id
		$id = intval($_GET['id']);
		$servicos = Painel::select('tb-site.servicos','id = ?',array($id));		
	}else{
		Painel::alertSuccess('erro','Voce Precissa Passar o id');
		die();
	}	


?>


<div class="box-content">

	<h2 class=""><i class="fas fa-user-edit"></i> Editar Serviços</h2>
					
	<form method="post">

		<?php

			if (isset($_POST['acao'])) {

				$nome = $_POST['nome'];

				if (Painel::update($_POST)) {
					Painel::alertSuccess('sucesso','O Serviços de '.$nome.' foi atualizado');
					$servicos = Painel::select('tb-site.servicos','id = ?',array($id));		
				}else{
					Painel::alertSuccess('erro','Ocorreu algum Erro');
				}								
			
			}

		?>
	
		<div class="form-group">

			<label>Nome do Serviço: </label>
			<input type="text" name="nome" required value="<?php echo $servicos['nome']; ?>">

		</div><!--form-group-->

		<div class="form-group">

			<label>Serviço: </label>
			<textarea name="servicos" required> <?php echo $servicos['servicos'];?></textarea>

		</div><!--form-group-->

		<div class="form-group">
			<input type="hidden" name="id" value="<?php echo $id; ?>">
			<input type="hidden" name="nome_tabela" value="tb-site.servicos">
			<input type="submit" name="acao" value="Atualizar!">

		</div><!--form-group-->

	</form>


</div><!--box-content-->