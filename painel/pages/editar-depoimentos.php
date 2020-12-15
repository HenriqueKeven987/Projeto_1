
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
				Painel::alertSuccess('sucesso','Depoimento Foi atualizado');

				/*
				if (Painel::atualizarDepoimento($depoimento,$data,$id)) {							
					Painel::alertSuccess('sucesso','Depoimento Foi atualizado');
				}else{
					Painel::alertSuccess('erro','Depoimento Nao Foi atualizado');
				}*/
			
			}

		?>
	
		<div class="form-group">

			<label>Author:</label>
			<input type="text" name="nome" value="<?php echo $depoimentos['nome']; ?>">

		</div><!--form-group-->

		<div class="form-group">

			<label>Depoimento: </label>
			<textarea name="depoimento" required> <?php echo $depoimentos['depoimentos'];?></textarea>

		</div><!--form-group-->

		<div class="form-group">

			<label>Data: </label>
			<input type="text" formato="data" name="data" value="<?php echo $depoimentos['data']; ?>">

		</div><!--form-group-->

		<div class="form-group">

			<input type="submit" name="acao" value="Atualizar!">

		</div><!--form-group-->

	</form>


</div><!--box-content-->