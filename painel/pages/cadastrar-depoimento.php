

<div class="box-content">

	<h2 class=""><i class="fas fa-align-center"></i> Adicionar Depoimento</h2>

	<form method="post">

		<?php

			if (isset($_POST['acao'])) {
				
				if (Painel::adicionarDepoimento($_POST)) {
					$nome = $_POST['nome'];
					Painel::alertSuccess('sucesso','Depoimento de '.$nome.' adicionado com sucesso!');

				}else{
					Painel::alertSuccess('erro','Ocorreu um erro ao cadastrar!');					
				}

				
			}

		?>

		<!--formulario do depoimento-->
		
		<div class="form-group">

			<label>Author: </label>
			<input type="text" name="nome" required>

		</div><!--form-group-->

		<div class="form-group">

			<label>Depoimento: </label>
			<textarea name="depoimento" required></textarea>

		</div><!--form-group-->

		<div class="form-group">

			<input type="submit" name="acao" value="Cadastrar!">

		</div><!--form-group-->

	</form><!--formulario do depoimento-->


</div><!--box-content-->
