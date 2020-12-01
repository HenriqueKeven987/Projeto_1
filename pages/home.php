 
	<!---banner inicial-->
	<section class="banner-container">

		<div style="background-image: url('<?php echo INCLUDE_PATH;?>imagens/watch.dogs.jpg');" class="banner-single"></div><!--banner single-->

		<div style="background-image: url('<?php echo INCLUDE_PATH;?>imagens/watch.dogs(1).jpg');" class="banner-single"></div><!--banner single-->

		<div style="background-image: url('<?php echo INCLUDE_PATH?>imagens/watch.dogs(2).jpg');" class="banner-single"></div><!--banner single-->



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

				<h2>Henrique K. Sousa</h2>

				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>

				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
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
	 			<h3><i class="fab fa-css3"></i></h3>
	 			<h4>CSS3</h4>
	 			<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
	 		</div><!--especialidades-->

	 		<div class="w33 left box-especialidades">
	 			<h3><i class="fab fa-html5"></i></h3>
	 			<h4>HTML5</h4>
	 			<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
	 		</div><!--especialidades-->

	 		<div class="w33 left box-especialidades">
	 			<h3><i class="fab fa-js"></i></h3>
	 			<h4>JavaScript</h4>
	 			<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
	 		</div><!--especialidades-->
	 		<div class="clear"></div>
	 	</div><!--center-->

	 </section><!--especialidades-->

	 <section class="extras">
	 	<div class="center">
	 		<div id="depoimentos" class="w50 left depoimento-conteiner">
	 			<h2 class="title">Depoimentos dos nossos clientes</h2>
	 			<div class="depoimento-single">
	 				<p class="depoimento-descricao">"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book."</p>
	 				<p class="nome-autor">Lorem Ipsum</p>
	 			</div><!--depoimento-single-->
	 			<div class="depoimento-single">
	 				<p class="depoimento-descricao">"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book."</p>
	 				<p class="nome-autor">Lorem Ipsum</p>
	 			</div><!--depoimento-single-->
	 			<div class="depoimento-single">
	 				<p class="depoimento-descricao">"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book."</p>
	 				<p class="nome-autor">Lorem Ipsum</p>
	 			</div><!--depoimento-single-->
	 	</div><!--w50-->

	 	<div id="servicos" class="w50 left servicos-conteiner">
	 			<h2 class="title">Serviços</h2>
	 			<div class="servicos">
		 			<ul>
		 				<li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</li>

		 				<li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</li>

		 				<li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</li>
		 			</ul>
		 		</div><!--servicos-->
	 	</div><!--w50-->
	 	<div class="clear"></div>
	 	</div><!--center-->
	 </section><!--extras-->

