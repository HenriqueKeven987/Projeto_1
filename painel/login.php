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

	<div class="box-login"><!--div do painel-->

		<?php
			//login do usuario
			if (isset($_POST['acao'])) {
				$usuario = $_POST['usuario'];
				$senha = $_POST['senha'];
				$sql = Mysql::conectar()->prepare("SELECT * FROM `tb-admin.usuarios` WHERE usuario = ? AND senha = ?");
				$sql->execute(array($usuario,$senha));

				if ($sql->rowCount() == 1) {
					//logado com sucesso
					$_SESSION['login'] = true;
					$_SESSION['usuario'] = $usuario;
					$_SESSION['senha'] = $senha;
					//header direcionamento php
					header('location: '.INCLUDE_PATH_PAINEL);
					die();
				}else{
					//login deu erro
					echo "<div class='erro-box'><i class='fas fa-times'></i> Usuario ou senha incorretos!</div>";
				}


			}

		?>

	
		<form method="post">

			<h2>Efetue o Login</h2>
			<input type="text" name="usuario" placeholder="Usuario" required>
			
			<input type="password" name="senha" placeholder="Senha" required>
			
			<input type="submit" name="acao" value="Logar">

		</form>

	</div><!--div do painel-->

</body>
</html>