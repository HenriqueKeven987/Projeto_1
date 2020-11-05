<?php 
	include('config.php'); 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Projeto 01</title>
	<link href="<?php echo INCLUDE_PATH ?>Estilo/css/all.css" rel="stylesheet"/>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:300,400,700" rel="stylesheet"/>
	<link rel="stylesheet" type="text/css" href="<?php echo INCLUDE_PATH ?>Estilo/style.css"/>
	<!--Desing respondsivel -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<meta name="description" content="Descrição do meu website"/>
	<meta name="keywords" content="palavras-chaves,do,meu,site"/>
	<meta charset="utf-8"/>
</head>
<body>

	<?php 

		$url = isset($_GET['url']) ? $_GET['url'] : 'home' ;
		switch ($url) {
			
			case 'sobre':
					//target indica abrir documento vinculado
					echo '<target target="sobre"/>  ';

			break;
			
			case 'servicos':
					//target indica abrir documento vinculado
					echo '<target target="servicos"/>  ';
			break;
		}
	?>
	<header>
		<div class="center">
			<div class="logo left"><a href="/">CRASH</a></div><!--logo-->
			<nav class="desktop right">
				<ul>
					<li><a href="<?php echo INCLUDE_PATH ?>home">Home</a></li>
					<li><a href="<?php echo INCLUDE_PATH ?>sobre">Sobre</a></li>
					<li><a href="<?php echo INCLUDE_PATH ?>servicos">Serviços</a></li>
					<li><a href="<?php echo INCLUDE_PATH ?>contato">Contato</a></li>
				</ul>
			</nav>
			<nav class="mobile right">
				<div class="botao-menu-mobile">
					<i class="fas fa-bars"></i>
				</div>
				<ul>
					<li><a href="<?php echo INCLUDE_PATH ?>home">Home</a></li>
					<li><a href="<?php echo INCLUDE_PATH ?>sobre">Sobre</a></li>
					<li><a href="<?php echo INCLUDE_PATH ?>servicos">Serviços</a></li>
					<li><a href="<?php echo INCLUDE_PATH ?>contato">Contato</a></li>
				</ul>
			</nav>
	<div class="clear"></div><!--clear-->		
	</div><!--center-->
	</header>

	<?php 

		//verificaçao para direcionamento da pagina
		//a variavel url vai ver se existe uma url valida se tiver ela recebe se nao vai receber a home
		$url = isset($_GET['url']) ? $_GET['url'] : 'home' ;

		if (file_exists('pages/'.$url.'.php')) {
			include('pages/'.$url.'.php');
		}else{
			//se nao achar o arquivo de pagina acima

			if ($url != 'sobre' && $url != 'servicos') { 	
				$pagina404 = true;
				include('pages/404.php');

			}else{
				include('pages/home.php');
			}	
		}

	?>
	

	 <footer <?php if(isset($pagina404) && $pagina404 == true) echo 'class="fixed"'; ?>>
	 	<div class="center">
	 		<p>&copy; Cobra Kai Direitos Reservados</p>

	 	</div>
	 </footer>

	<!--integraçao arquivo JS-->
	<script src="<?php echo INCLUDE_PATH ?>js/jquery.js"></script>

	<script src="<?php echo INCLUDE_PATH ?>js/coisa.js"></script>

	<!--garregar o script do google-->
	<?PHP

		if($url == 'contato'){

	?>

	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyDHPNQxozOzQSZ-djvWGOBUsHkBUoT_qH4"></script>

	<script src="<?php echo INCLUDE_PATH; ?>js/map.js"></script>


	<?php
		}
		//final do script do google
	?>

</body>

<!--
	quando trazer maquina de usuario identificar ate com o numero do chamada
	adicionar nota do numero do chamado 
	adicionar nota no chamado
-->

</html>



