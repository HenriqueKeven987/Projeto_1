
<?php
	
	if (isset($_GET['id'])) {
					//pegando o id
		$id = intval($_GET['id']);
		$slide = Painel::select('tb-site.slide','id = ?',array($id));		
	}else{
		$slide = Painel::select('tb-site.slide','id = ?',array($id));
		Painel::alertSuccess('erro','Voce Precissa Passar o id');
		die();
	}

?>


<div class="box-content">

	<h2 class=""><i class="fas fa-user-edit"></i> Editar Slide</h2>

						<!--para q o upload de imagem funcione-->
	<form method="post" enctype="multipart/form-data">

		<?php

			if (isset($_POST['acao'])) {
				//enviou atualizacao de slide
				
				$nome = $_POST['nome'];
				$imagem = $_FILES['imagem'];
				$imagem_atual = $_POST['imagem_atual'];

				if ($imagem['name'] != '') {

					if(Painel::imagemValida($imagem)){
						Painel::deleteFile($imagem_atual);
						$imagem = Painel::uploadFile($imagem);
						$arr = ['nome'=>$nome,'slide'=>$imagem,'nome_tabela'=>'tb-site.slide','id'=>$id];
						if (Painel::update($arr)) {
							Painel::alertSuccess('sucesso','Slide Atualizado com Sucesso!');
						}else{
							Painel::alertSuccess('erro','Slide Não foi Atualizado');
						}
					}else{
						Painel::alertSuccess('erro',' A Imagem Não E Valida!');
					}						
				}else{
					//$imagem = $imagem_atual;
					$arr = ['nome'=>$nome,'nome_tabela'=>'tb-site.slide','id'=>$id];
					if (Painel::update($arr)) {
						Painel::alertSuccess('sucesso','Nome do Slide Atualizado com Sucesso!');
					}else{
						Painel::alertSuccess('erro','Ocorreu algum erro!');
					}
				}
			}
		?>
		
		<div class="form-group">

			<label>Nome do Slide</label>
			<input type="text" name="nome" required value="<?php echo $slide['nome']; ?>">

		</div><!--form-group-->

		<div class="form-group">

			<label>Slide</label>
			<input type="file" name="imagem"/>
			<input type="hidden" name="imagem_atual" value="<?php echo $slide['slide']; ?>">

		</div><!--form-group-->

		<div class="form-group">

			<input type="submit" name="acao" value="Atualizar!">

		</div><!--form-group-->

	</form>


</div><!--box-content-->
