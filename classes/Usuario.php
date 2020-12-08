<?php

	class Usuario{

		//preciassar ser instanciada pelo fato de nao ser estatic
		public function atualizarUsuario($nome,$senha,$imagem){

			$sql = Mysql::conectar()->prepare("UPDATE `tb-admin.usuarios` SET nome = ?, senha = ?, img = ? WHERE usuario = ?");

			if($sql->execute(array($nome,$senha,$imagem,$_SESSION['usuario']))){
				return true;
			}else{
				return false;
			}

		}


		//preciassar ser instanciada pelo fato de nao ser static
		public function adicionarUsuario($login,$senha,$imagem,$nome,$cargo){
			$sql = Mysql::conectar()->prepare("INSERT INTO `tb-admin.usuarios` VALUES (null,?,?,?,?,?)");
			$sql->execute(array($login,$senha,$imagem,$nome,$cargo)); 			
		}

		//verificando se o usuario existe
		public static function usuarioExiste($login){
			$sql = Mysql::conectar()->prepare("SELECT * FROM `tb-admin.usuarios` WHERE usuario = ?");
			$sql->execute(array($login));

			if ($sql->rowCount() == 1) {
				return true;
			}else{
				return false;
			}

		}

	}//class Usuario


?>