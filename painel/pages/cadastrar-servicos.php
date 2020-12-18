

<div class="box-content">

	<h2 class=""><i class="fas fa-align-center"></i> Adicionar Serviços</h2>

	<form method="post">

		<?php

			if (isset($_POST['acao'])) {	
				if (Painel::insert($_POST)) {
					Painel::alertSuccess('sucesso','O Serviço Foi Cadastrado!');
				}else{
					Painel::alertSuccess('erro','O Serviço Não Foi Cadastrado!');
				}
			}
		?>

		<!--formulario do depoimento-->
		
		<div class="form-group">

			<label>Descreva o Serviço: </label>
			<textarea name="servicos"></textarea>

		</div><!--form-group-->

		<div class="form-group">
			<input type="hidden" name="order_id" value="0">
			<input type="hidden" name="nome_tabela" value="tb-site.servicos">
			<input type="submit" name="acao" value="Cadastrar!">

		</div><!--form-group-->

	</form><!--formulario do depoimento-->

</div><!--box-content-->
