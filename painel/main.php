<?php
	if(isset($_GET['loggout'])){
		Painel::loggout();
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Painel de controle</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link href="<?php echo INCLUDE_PATH; ?>/Estilo/css/all.css" rel="stylesheet"/>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:300,400,700" rel="stylesheet"/>
	<link rel="stylesheet" type="text/css" href="<?php echo INCLUDE_PATH_PAINEL ?>css/style.css">
</head>
<body>

<div class="menu">

</div>

<header>
	<div class="center">

		<div class="menu-btn"><!--botao-->
			<i class="fas fa-bars"></i>
		</div><!--botao-->

		<div class="loggout">
			<a href="<?php echo INCLUDE_PATH_PAINEL;?>?loggout"><i class="fas fa-sign-out-alt"></i></a>
		</div>
	</div>
	<div class="clear"></div><!--clear-->

</header>
<div class="clear"></div>




</body>
</html>