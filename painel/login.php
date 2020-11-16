<!DOCTYPE html>
<html>
<head>
	<title>Painel de conrole</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:300,400,700" rel="stylesheet"/>
	<link rel="stylesheet" type="text/css" href="<?php echo INCLUDE_PATH_PAINEL ?>css/style.css">
</head>
<body>

	<div class="box-login"><!--div do painel-->
	
		<form method="post">

			<h2>Efetue o Login</h2>
			<input type="text" name="user" placeholder="Usuario" required>
			<div></div>
			<input type="password" name="" placeholder="Senha" required>
			<div></div>
			<input type="submit" name="acao" value="Logar">

		</form>

	</div><!--div do painel-->

</body>
</html>