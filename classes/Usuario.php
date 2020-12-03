<?php

	class Usuario{

		//preciassar ser instanciada pelo fato de nao ser estatica
		public function atualizarUsuario($nome,$senha,$imagem){

			$sql = Mysql::conectar()->prepare("UPDATE `tb-admin.usuarios` SET nome = ?, senha = ?, img = ? WHERE usuario = ?");

			if($sql->execute(array($nome,$senha,$imagem,$_SESSION['usuario']))){
				return true;
			}else{
				return false;
			}

		}


		//preciassar ser instanciada pelo fato de nao ser estatica
		public function adicionarUsuario($login,$senha,$imagem,$nome,$cargo){
			$sql = Mysql::conectar()->prepare("INSERT INTO `tb-admin.usuarios` VALUES (null,?,?,?,?,?)");
			if ($sql->execute(array($login,$senha,$imagem,$nome,$cargo))) {
				return true;
			}else{
				return false;
			}

		}

	}//class Usuario


?>