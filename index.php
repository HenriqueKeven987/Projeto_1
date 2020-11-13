<?php 
	include('config.php'); 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Projeto 01</title>
	<link href="<?php echo INCLUDE_PATH; ?>Estilo/css/all.css" rel="stylesheet"/>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:300,400,700" rel="stylesheet"/>
	<link rel="stylesheet" type="text/css" href="<?php echo INCLUDE_PATH;?>Estilo/style.css"/>
	<!--Desing respondsivel -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<meta name="description" content="Descrição do meu website"/>
	<meta name="keywords" content="palavras-chaves,do,meu,site"/>
	<meta charset="utf-8"/>
	<link rel="icon" href= "<?php echo INCLUDE_PATH; ?>Korone_Boobs.ico" type="image/x-icon"/>
	<base base="<?php echo INCLUDE_PATH; ?>"/>
</head>
<body>

	<base base="<?php echo INCLUDE_PATH; ?>" />

	<?php 

		$url = isset($_GET['url']) ? $_GET['url'] : 'home' ;
		switch ($url) {
			
			case 'depoimentos':
					//target indica abrir documento vinculado
					echo '<target target="depoimentos"/>  ';
			break;
			
			case 'servicos':
					//target indica abrir documento vinculado
					echo '<target target="servicos"/>  ';
			break;
		}
	?>

	<!--<?php //new Email(); ?>-->

	<header>
		<div class="center">
			<div class="logo left"><a href="/">CRASH</a></div><!--logo-->
			<nav class="desktop right">
				<ul>
					<li><a href="<?php echo INCLUDE_PATH; ?>">Home</a></li>
					<li><a href="<?php echo INCLUDE_PATH; ?>depoimentos">Depoimentos</a></li>
					<li><a href="<?php echo INCLUDE_PATH; ?>servicos">Serviços</a></li>
					<li><a realtime="contato" href="<?php echo INCLUDE_PATH;?>contato">Contato</a></li>
				</ul>
			</nav>
			<nav class="mobile right">
				<div class="botao-menu-mobile">
					<i class="fas fa-bars"></i>
				</div>
				<ul>
					<li><a href="<?php echo INCLUDE_PATH; ?>">Home</a></li>
					<li><a href="<?php echo INCLUDE_PATH; ?>depoimentos">Depoimentos</a></li>
					<li><a href="<?php echo INCLUDE_PATH; ?>servicos">Serviços</a></li>
					<li><a realtime="contato" href="<?php echo INCLUDE_PATH;?>contato">Contato
					</a></li>
				</ul>
			</nav>
	<div class="clear"></div><!--clear-->		
	</div><!--center-->
	</header>


	<div class="container-principal">

		<?php 

			//verificaçao para direcionamento da pagina
			//a variavel url vai ver se existe uma url valida se tiver ela recebe se nao vai receber a home
			//$url = isset($_GET['url']) ? $_GET['url'] : 'home' ;

			if (file_exists('pages/'.$url.'.php')) {
				include('pages/'.$url.'.php');
			}else{
				//se nao achar o arquivo de pagina acima

				if ($url != 'depoimentos' && $url != 'servicos') { 
					$pagina404 = true;
					include('pages/404.php');

				}else{
					include('pages/home.php');
				}	
			}

		?>

	</div><!--container-principal-->
	

	 <footer <?php if(isset($pagina404) && $pagina404 == true) echo 'class="fixed"'; ?>>
	 	<div class="center">
	 		<p>&copy; Cobra Kai Direitos Reservados</p>

	 	</div>
	 </footer>

	<!--integraçao arquivo JS-->
	<script src="<?php echo INCLUDE_PATH; ?>js/jquery.js"></script>

	<script src="<?php echo INCLUDE_PATH; ?>js/coisa.js"></script>

	<script src="<?php echo INCLUDE_PATH; ?>js/constants.js"></script>

	<script src="<?php echo INCLUDE_PATH; ?>js/map.js"></script>

	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyDHPNQxozOzQSZ-djvWGOBUsHkBUoT_qH4"></script>

	<!--garregar o script dos slider.js apenas na home-->
	<?php
		if ($url == 'home' or $url == '') {
	?>

	<script src="<?php echo INCLUDE_PATH; ?>js/slider.js"></script>

	<?php
		}
	?>


	<!--garregar o script do google map apenas na page dos contatos-->
	<?PHP

		if($url == 'contato'){
	?>

	<?php
		}
	?>

	<script src="<?php echo INCLUDE_PATH; ?>js/formularios.js"></script>

	<script src="<?php echo INCLUDE_PATH; ?>js/exemplo.js"></script>

</body>

<!--
	quando trazer maquina de usuario identificar ate com o numero do chamada
	adicionar nota do numero do chamado 
	adicionar nota no chamado
-->

</html>



