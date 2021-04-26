 
	
<?php 
	$site = Painel::select('tb-site.painel');
?>

<div class="box-content">

	<h2 class=""><i class="fab fa-artstation"></i> Editar Conteudo do Site</h2>
					
	<form method="post">

		<?php

			if (isset($_POST['acao'])) {
				
				if (Painel::update($_POST,true)) {
					Painel::alertSuccess('sucesso','Atualizaçao de Site Feita Com Sucesso!');					
					$site = Painel::select('tb-site.painel');
				}else{
					Painel::alertSuccess('erro','Algum Campo Esta Vazio');
				}

																
			}

		?>

		<div class="form-group">

			<label>Titulo</label>
			<input type="text" name="titulo" value="<?php echo $site['titulo'];?>">

		</div><!--form-group-->

		<div class="form-group">

			<label>Nome Do Author</label>
			<input type="text" name="nome_author" value="<?php echo $site['nome_author'];?>">

		</div><!--form-group-->

		<div class="form-group">

			<label>descricao</label>
			<textarea name="descricao"> <?php echo $site['descricao'];?></textarea>

		</div><!--form-group-->

		<div class="form-group">

			<label>icone 1</label>
			<input type="text" name="icone1" value="<?php echo $site['icone1'];?>">  

		</div><!--form-group-->		

		<div class="form-group">

			<label>descricao do icone 1</label>
			<textarea name="descricao1"> <?php echo $site['descricao1'];?></textarea>

		</div><!--form-group-->		

		<div class="form-group">

			<label>icone 2</label>
			<input type="text" name="icone2" value="<?php echo $site['icone2']; ?>">  

		</div><!--form-group-->

		<div class="form-group">

			<label>descricao do icone 2</label>
			<textarea name="descricao2"> <?php echo $site['descricao2'];?></textarea>

		</div><!--form-group-->

		<div class="form-group">

			<label>icone 3</label>
			<input type="text" name="icone3" value="<?php echo $site['icone3']; ?>">  

		</div><!--form-group-->

		<div class="form-group">

			<label>descricao do icone 3</label>
			<textarea name="descricao3"> <?php echo $site['descricao3'];?></textarea>

		</div><!--form-group-->


		<div class="form-group">
			<input type="hidden" name="nome_tabela" value="tb-site.painel">
			<input type="submit" name="acao" value="Atualizar!">

		</div><!--form-group-->

	</form>


</div><!--box-content-->