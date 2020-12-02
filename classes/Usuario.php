<?php

	class Usuario{

		public function atualizarUsuario($nome,$senha,$imagem){

			$sql = Mysql::conectar()->prepare("UPDATE `tb-admin.usuarios` SET nome = ?, senha = ?, img = ? WHERE usuario = ?");

			if($sql->execute(array($nome,$senha,$imagem,$_SESSION['usuario']))){
				return true;
			}else{
				return false;
			}

		}

		public function adicionarUsuario($login,$nome,$senha,$cargo,$imagem){
			$sql = Mysql::conectar()->prepare("INSERT INTO `tb-admin.usuarios` VALUES (null,?,?,?,?,?)");

			if ($sql->execute(array($login,$nome,$senha,$cargo,$imagem)) {
				return true;
			}else{
				return false;
			}

		}

	}//class Usuario


?>