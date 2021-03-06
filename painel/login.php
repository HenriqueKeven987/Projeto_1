<?php

	if (isset($_COOKIE['Lembrar'])) {
		//cookie buscando no banco o login e senha
		$usuario = $_COOKIE['usuario'];
		$senha = $_COOKIE['senha'];
		$sql = Mysql::conectar()->prepare("SELECT * FROM `tb-admin.usuarios` WHERE usuario = ? AND senha = ?");
		$sql->execute(array($usuario,$senha));
		if ($sql->rowCount() == 1) {
			//logado com sucesso
			$info = $sql->fetch();
			$_SESSION['login'] = true;
			$_SESSION['usuario'] = $usuario;
			$_SESSION['senha'] = $senha;
			$_SESSION['cargo'] = $info['cargo']; 
			$_SESSION['nome'] = $info['nome'];
			$_SESSION['img'] = $info['img'];
			header('location: '.INCLUDE_PATH_PAINEL);
			die();
		}
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
	<link rel="stylesheet" type="text/css" href="<?php echo INCLUDE_PATH_PAINEL; ?>css/style.css">
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
					$info = $sql->fetch();
					$_SESSION['login'] = true;
					$_SESSION['usuario'] = $usuario;
					$_SESSION['senha'] = $senha;
					$_SESSION['cargo'] = $info['cargo'];
					$_SESSION['nome'] = $info['nome'];
					$_SESSION['img'] = $info['img'];

					//cookie
					if (isset($_POST['Lembrar'])) {
						setcookie('Lembrar',true,time()+(60*60*24),'/');
						setcookie('usuario',$usuario,time()+(60*60*24),'/');
						setcookie('senha',$senha,time()+(60*60*24),'/');						
					}
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

			<div class="form-group-login left">
				<input type="submit" name="acao" value="Logar">
			</div>

			<div class="form-group-login right">
				<label>Lembrar-Me</label>
				<input type="checkbox" name="Lembrar"/>
			</div>
			<div class="clear"></div>
		</form>

	</div><!--div do painel-->

</body>
</html>