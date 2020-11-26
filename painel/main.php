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
	<div class="menu-whaper">
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

		<div class="nome-usuario">
			<p><?php echo $_SESSION['nome']; ?></p>
			<p><?php echo pegaCargo($_SESSION['cargo']); ?></p>
		</div><!--nome-usuario-->

	</div><!--box-usuario-->

		<div class="items-menu">

			<h2>Cadastro</h2>
			<a href="<?php echo INCLUDE_PATH_PAINEL?>cadastrar-depoimento">Cadastrar Depoimento</a>
			<a href="">Cadastro Serviços</a>
			<a href="">Cadastrar slides</a>

			<h2>Gestao</h2>
			<a href="">Listar Depoimento</a>
			<a href="">Listar Serviços</a>
			<a href="">Gerenciar Slides</a>

			<h2>Administração do Painel</h2>
			<a href="<?php echo INCLUDE_PATH_PAINEL?>editar-usuario">Editar Usuario</a>
			<a href="">Adicionar Usuario</a>

			<h2>Configuraçao geral</h2>
			<a href="">Editar</a>

		</div><!--items--menu-->
	</div><!--menu-whaper-->
</div><!--menu-->

<header>
	<div class="center">

		<div class="menu-btn">
			<i class="fas fa-bars"> Painel</i> 
		</div><!--menu-btn-->

		<div class="loggout">
			<a href="<?php echo INCLUDE_PATH_PAINEL;?>"><i class="fas fa-home"><span> Pagina Inicial</span></i></a>
			<a href="<?php echo INCLUDE_PATH_PAINEL;?>?loggout"><i class="fas fa-sign-out-alt"><span> Sair</span></i></a>
		</div>
	</div>
	<div class="clear"></div><!--clear-->

</header>

<div class="content">

<?php
		
	Painel::carregarPagina();

?>

</div><!--content-->

<div class="clear"></div>


<script src="<?php echo INCLUDE_PATH ?>js/jquery.js"></script >
<script src="<?php echo INCLUDE_PATH_PAINEL ?>js/main.js"></script>


</body>
</html>