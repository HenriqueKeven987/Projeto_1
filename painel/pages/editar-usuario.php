
<?php
	verificaPermicaoPagina(2);
?>

<div class="box-content">

	<h2 class=""><i class="fas fa-user-edit"></i> Editar Usuario</h2>

						<!--para q o upload de imagem funcione-->
	<form method="post" enctype="multipart/form-data">

		<?php

			if (isset($_POST['acao'])) {
				//enviou ataalizacao de usuario
				
				//esta cendo estanciado pq a funcao nao esta estatica
				$usuario = new Usuario;
				$nome = $_POST['nome'];
				$senha = $_POST['senha'];
				//$_FILES faz upload de arquivos
				$imagem = $_FILES['imagem'];
				$imagem_atual = $_POST['imagem_atual'];

				if ($imagem['name'] != '') {
					//existe o upload de imagem
					if (Painel::imagemValida($imagem)) {
						//imagem valida com sucesso
						Painel::deleteFile($imagem_atual);						
						$imagem = Painel::uploadFile($imagem);

						if($usuario->atualizarUsuario($nome,$senha,$imagem)){
							$_SESSION['img'] = $imagem;
							Painel::alertSuccess('sucesso','Atualizado Com Sucesso junto a imagem');
						}
						else{
							Painel::alertSuccess('erro','erro ao atualizar!');
						}						
						
					}else{
						Painel::alertSuccess('erro','formato de imagem nao valido!');
					}

				}else{
					//nao existe upload de imagem
					$imagem = $imagem_atual;
					$usuario = new Usuario();

					if($usuario->atualizarUsuario($nome,$senha,$imagem)){
						Painel::alertSuccess('sucesso','Atualizado Com Sucesso!');
					}else{
						Painel::alertSuccess('erro','erro ao atualizar!');
					}

				}

			}

		?>
		
		<div class="form-group">

			<label>Nome:</label>
			<input type="text" name="nome" required value="<?php echo $_SESSION['nome']; ?>">

		</div><!--form-group-->


		<div class="form-group">

			<label>Senha:</label>
			<input type="text" name="senha" required value="<?php echo $_SESSION['senha']; ?>">

		</div><!--form-group-->

		<div class="form-group">

			<label>imagem</label>
			<input type="file" name="imagem"/>
			<input type="hidden" name="imagem_atual" value="<?php echo $_SESSION['img'];  ?>">

		</div><!--form-group-->

		<div class="form-group">

			<input type="submit" name="acao" value="Atualizar!">

		</div><!--form-group-->

	</form>


</div><!--box-content-->
