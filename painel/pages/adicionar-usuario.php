
<div class="box-content">

	<h2 class=""><i class="fas fa-user-edit"></i> Adicionar Usuario</h2>

						<!--para q o upload de imagem funcione-->
	<form method="post" enctype="multipart/form-data">

		<?php

			if (isset($_POST['acao'])) {
				//enviou cadastro de usuario

			}

		?>
		
		<div class="form-group">

			<label>Nome:</label>
			<input type="text" name="nome" required>

		</div><!--form-group-->


		<div class="form-group">

			<label>Senha:</label>
			<input type="text" name="senha" required>

		</div><!--form-group-->

		<div class="form-group">

			<label>imagem</label>
			<input type="file" name="imagem" required/>

		</div><!--form-group-->

		<div class="form-group">

			<input type="submit" name="acao" value="Cadastrar!">

		</div><!--form-group-->

	</form>


</div><!--box-content-->
