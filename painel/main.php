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

	<div class="box-usuario">

		<?php if($_SESSION['img'] == ''){ ?>

			<div class="avatar-usuario">
				<i class="fa fa-user"></i>
			</div>

		<?php } else { ?>

			<div class="imagem-usuario">
				<img src="<?php echo INCLUDE_PATH_PAINEL ?>uploads/<?php echo $_SESSION['img'];?>"/>
			</div>

		<?php }?>

	</div><!--box-usuario-->

	<div class="nome-usuario">
		<p><?php echo $_SESSION['nome']; ?></p>
		<p><?php echo pegaCargo($_SESSION['cargo']); ?></p>
	</div><!--nome-usuario-->

</div>

<header>
	<div class="center">

		<div class="menu-btn"><!--botao-->
			<i class="fas fa-bars"></i>
		</div><!--botao-->

		<div class="loggout">
			<a href="<?php echo INCLUDE_PATH_PAINEL;?>?loggout"><i class="fas fa-sign-out-alt"><span> Sair</span></i></a>
		</div>
	</div>
	<div class="clear"></div><!--clear-->

</header>
	
<!--div conteudo principal-->
<div class="content">
	
	<div class="w100 box-content left">
			


	</div><!--box-content-->



	<!--
	<div class="w100 box-content left">
		
	</div>

	<div class="w50 box-content left">
		
	</div>

	<div class="w50 box-content right">
		
	</div>
	-->

	<div class="clear"></div><!--clear-->

</div><!--content-->

<div class="clear"></div>


<script src="<?php echo INCLUDE_PATH ?>js/jquery.js"></script >
<script src="<?php echo INCLUDE_PATH_PAINEL ?>js/main.js"></script>


</body>
</html>