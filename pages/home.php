 
<?php
	$sql = Mysql::conectar()->prepare("SELECT * FROM `tb-site.slide` LIMIT 3 ORDER BY order_id ASC");
	$sql->execute();
	$sql = $sql->fetch();
	$slides = $sql;
?>

	<!---banner inicial-->
	<section class="banner-container">

		<?php foreach ($slides as $key => $value) {
			
		?>

		<div class="banner-single"><img src="<?php echo INCLUDE_PATH_PAINEL; ?>uploads/<?php echo $slides['slide']; ?>"></div><!--banner single-->

		<?php } ?> 

		<div class="overlay"></div><!--overlay-->

		<div class="center">


		<form method="post">

			<h2>Qual o Seu Melhor e-mail?</h2>

			<input type="email" name="email" required/>
			<!--input hidden esta validando graças ao value que ele guarda-->
			<input type="hidden" name="identificador" value="form_home"/>
			<input type="submit" name="acao" value="Cadastrar!"/>

		</form>
		</div><!--center-->

		<div class="bullets">

			<!--Span usado para colorir uma parte de um texto
			<span class="active-slider"></span>
			<span></span>
			<span></span>
			-->

		</div><!--bullets-->

	</section><!--banner-container-->

	<!--Descriçao inicio-->
	<section class="descricao-autor">
		<div class="center">
			<div class="w50 left">

				<h2><?php echo $infoSite['nome_author']; ?></h2>

				<p><?php echo $infoSite['descricao']; ?></p>
			</div><!--w50-->
		
			<div class="w50 left">
				<!--Pegar imagem dps-->
				<img class="right" src="<?php echo INCLUDE_PATH ?>imagens/crash.jpg"/>
			</div><!--w50-->
			<div class="clear"></div>
		</div><!--center-->
	</section><!--descriçao-autor-->

	<!--Especialidades Inicio-->
	 <section class="especialidades">
	 	<div class="center">
	 		<h2 class="title">Especialidades</h2>
	 		<div class="w33 left box-especialidades">
	 			<h3><i class="<?php echo $infoSite['icone1'];?>"></i></h3>
	 			<h4>CSS3</h4>
	 			<p><?php echo $infoSite['descricao1'];?></p>
	 		</div><!--especialidades-->

	 		<div class="w33 left box-especialidades">
	 			<h3><i class="<?php echo $infoSite['icone2'];?>"></i></h3>
	 			<h4>HTML5</h4>
	 			<p><?php echo $infoSite['descricao2'];?></p>
	 		</div><!--especialidades-->

	 		<div class="w33 left box-especialidades">
	 			<h3><i class="<?php echo $infoSite['icone3'];?>"></i></h3>
	 			<h4>JavaScript</h4>
	 			<p><?php echo $infoSite['descricao3'];?></p>
	 		</div><!--especialidades-->
	 		<div class="clear"></div>
	 	</div><!--center-->

	 </section><!--especialidades-->

	 <section class="extras">
	 	<div class="center">
	 		<div id="depoimentos" class="w50 left depoimento-conteiner">
	 			<h2 class="title">Depoimentos dos nossos clientes</h2>
	 				<?php 
	 				$sql = Mysql::conectar()->prepare("SELECT * FROM `tb-site.depoimentos` ORDER BY order_id ASC LIMIT 3");
	 				$sql->execute();
	 				$depoimentos = $sql->fetchAll();

	 				foreach ($depoimentos as $key => $value) {	 					
	 				?>		
			 			<div class="depoimento-single">
			 				<p class="depoimento-descricao">"<?php echo $value['depoimentos']; ?>"</p>
			 				<p class="nome-autor"><?php echo $value['nome']; ?> - <?php echo $value['data']; ?></p>
			 			</div><!--depoimento-single-->
	 			<?php } ?>
	 		</div><!--Depoimentos-->

	 		<div id="servicos" class="w50 left servicos-conteiner">
	 			<h2 class="title">Serviços</h2>
	 			<div class="servicos">
		 			<ul>
		 				<?php
		 					$sql = Mysql::conectar()->prepare("SELECT * FROM `tb-site.servicos` ORDER BY order_id ASC LIMIT 3");
		 					$sql->execute();
		 					$servicos = $sql->fetchAll();

		 					foreach ($servicos as $key => $value) {
		 				?>
		 					<li><?php echo $value['servicos']; ?> </li>		 					
		 				<?php } ?>
		 			</ul>
		 		</div><!--servicos-->
	 		</div><!--w50-->
	 		<div class="clear"></div>
	 	</div><!--center-->
	 </section><!--extras-->

