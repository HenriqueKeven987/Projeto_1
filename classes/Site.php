<?php

	class Site{

		public static function updateUsuarioOnline(){

			if (isset($_SESSION['online'])) {
				$token = $_SESSION['online'];
				$horarioAtual = date('Y-m-d H:i:s');
				$sql = Mysql::conectar()->prepare("UPDATE `tb-admin.online` SET ultima_acao = ? WHERE token = ?");
				$sql->execute(array($horarioAtual,$token));
			}
			 else{
			 	//uniqid vai sempre retornar um unico id
			 	$_SESSION['online'] = uniqid();
			 	$ip = $_SERVER['REMOTE_ADDR'];
			 	$token = $_SESSION['online'];
				$horarioAtual = date('Y-m-d H:i:s');
			 	$sql = Mysql::conectar()->prepare("INSERT INTO `tb-admin.online` VALUES(null,?,?,?)");
				$sql->execute(array($ip,$horarioAtual,$token));

			}

		}

	}



?>