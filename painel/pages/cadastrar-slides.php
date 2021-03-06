
<div class="box-content">

	<h2 class=""><i class="fas fa-image"></i> Adicionar Slide</h2>

						<!--para q o upload de imagem funcione-->
	<form method="post" enctype="multipart/form-data">

		<?php

			if (isset($_POST['acao'])) {

				$nome = $_POST['nome'];
				$imagem = $_FILES['imagem'];

				if ($nome == '') {
					Painel::alertSuccess('erro','Nome do Slide nao Foi especificado!');
				}else{

					if (Painel::tipoImagem($imagem) == false) {
						Painel::alertSuccess('erro','A imagem nao e valida');	
					}
					else{						
						$imagem = Painel::uploadFile($imagem);
						$array = ['nome'=>$nome,'slide'=>$imagem,'order_id'=>'0','nome_tabela'=>'tb-site.slide',];
						Painel::insert($array);
						Painel::alertSuccess('sucesso','Cadastro de Slide realizado com sucesso!'); 
					}
				}
			}//ACAO

		?>
		
		<div class="form-group">

			<label>Nome do slide:</label>
			<input type="text" name="nome" required/>

		</div><!--form-group-->


		<div class="form-group">

			<label>Imagem:</label>
			<input type="file" name="imagem" required/>

		</div><!--form-group-->	

		<div class="form-group">

			<input type="submit" name="acao" value="Cadastrar!">			

		</div><!--form-group-->

	</form><!--formulario de adduser-->


</div><!--box-content-->
