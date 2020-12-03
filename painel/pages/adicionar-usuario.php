
<?php
	verificaPermicaoPagina(2);
?>


<div class="box-content">

	<h2 class=""><i class="fas fa-user-edit"></i> Adicionar Usuario</h2>

						<!--para q o upload de imagem funcione-->
	<form method="post" enctype="multipart/form-data">

		<?php

			if (isset($_POST['acao'])) { 
				//enviou cadastro de usuario

				$login = $_POST['login'];
				$nome = $_POST['nome'];
				$senha = $_POST['senha'];
				$imagem = $_FILES['imagem'];
				$cargo = $_POST['cargo'];
					
				if ($login == '') {
					Painel::alertSuccess('erro','O Login Esta Vazio');
				}else if ($nome == '') {
					Painel::alertSuccess('erro','O Nome Esta Vazio');
				}else if ($senha == '') {
					Painel::alertSuccess('erro','A Senha Esta Vazia');
				}else if($cargo == ''){
					Painel::alertSuccess('erro','O Cargo nao sei como Esta Vazio');
				}else if ($imagem['name'] == '') {
					Painel::alertSuccess('erro','O Selecione uma imagem');
				}else{
					//Podemos continuar o Cadastro nunhum campo vazio
					if ($cargo >= $_SESSION['cargo']) {
						Painel::alertSuccess('erro','voce nao tem autorirazao para colocar esse cargo');
					}else if (Painel::imagemValida($imagem) == false) {
						Painel::alertSuccess('erro','imagem nao E valida');
					}else{
						//podemos cadastrar no banco de dados
						$usuario = new Usuario;
						//$usuario->adicionarUsuario($login,$senha,$imagem,$nome,$cargo);
						Painel::alertSuccess('sucesso','O Cadastro de '.$nome.' foi feito com sucesso!');
					}
				}

			}//ACAO

		?>

		<!--formulario de adduser-->
		<div class="form-group">

			<label>Login:</label>
			<input type="text" name="login" >

		</div><!--form-group-->
		
		<div class="form-group">

			<label>Nome:</label>
			<input type="text" name="nome" >

		</div><!--form-group-->

		<div class="form-group">

			<label>Senha:</label>
			<input type="text" name="senha" >

		</div><!--form-group-->

		<div class="form-group">
			<label>Cargo</label>
			<select name="cargo">
				<?php 
					foreach (Painel::$cargos as $key => $value) {
						if($key < $_SESSION['cargo']) 
							echo '<option value="'.$key.'">'.$value.'</option>';

					}
				?>
			</select>

		</div><!--form-group-->

		<div class="form-group">

			<label>Imagem</label>
			<input type="file" name="imagem" />

		</div><!--form-group-->

		<div class="form-group">

			<input type="submit" name="acao" value="Cadastrar!">

		</div><!--form-group-->

	</form><!--formulario de adduser-->


</div><!--box-content-->
