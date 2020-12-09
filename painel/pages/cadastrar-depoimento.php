

<div class="box-content">

	<h2 class=""><i class="fas fa-align-center"></i> Adicionar Depoimento</h2>

	<form method="post">

		<?php

			if (isset($_POST['acao'])) {
				
				if (Painel::adicionarDepoimento($_POST)) {
					$nome = $_POST['nome'];
					Painel::alertSuccess('sucesso','Depoimento de '.$nome.' adicionado com sucesso!');

				}else{
					Painel::alertSuccess('erro','Campos Vazios Nao Sao Permitidos!');					
				}
				
			}

		?>

		<!--formulario do depoimento-->
		
		<div class="form-group">

			<label>Author: </label>
			<input type="text" name="nome">

		</div><!--form-group-->

		<div class="form-group">

			<label>Depoimento: </label>
			<textarea name="depoimento"></textarea>

		</div><!--form-group-->

		<div class="form-group">
			<input type="hidden" name="nome_tabela" value="tb-site.depoimentos">
			<input type="submit" name="acao" value="Cadastrar!">

		</div><!--form-group-->

	</form><!--formulario do depoimento-->


</div><!--box-content-->
