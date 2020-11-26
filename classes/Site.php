<?php

	class Site{

		public static function updateUsuarioOnline(){

			//se sua sessao ja existe mais falta o token 
			if (isset($_SESSION['online'])) {
				$token = $_SESSION['online'];
				$horarioAtual = date('Y-m-d H:i:s');
				$check = Mysql::conectar()->prepare("SELECT `id` FROM `tb-admin.online` WHERE token = ?");
				$check->execute(array($_SESSION['online']));

				if ($check->rowCount() == 1) {
					//atualizando a ultima secao do usuario com base em seu token
					$sql = Mysql::conectar()->prepare("UPDATE `tb-admin.online` SET ultima_acao = ? WHERE token = ?");
					$sql->execute(array($horarioAtual,$token));

				}else{
					//no caso se o token nao existir vai ser adicionado o seu ip de acesso um token e sua ultima sessao
					$ip = $_SERVER['REMOTE_ADDR'];//pegando ip do usuario pra adicionar no banco
				 	$token = $_SESSION['online'];
					$horarioAtual = date('Y-m-d H:i:s');
				 	$sql = Mysql::conectar()->prepare("INSERT INTO `tb-admin.online` VALUES(null,?,?,?)");
					$sql->execute(array($ip,$horarioAtual,$token));
				}

			}
			 else{
			 	//primeiro login no site
			 	//uniqid vai sempre retornar um unico id
			 	$_SESSION['online'] = uniqid();
			 	$ip = $_SERVER['REMOTE_ADDR'];//pegando ip do usuario pra adicionar no banco
			 	$token = $_SESSION['online'];
				$horarioAtual = date('Y-m-d H:i:s');
			 	$sql = Mysql::conectar()->prepare("INSERT INTO `tb-admin.online` VALUES(null,?,?,?)");
				$sql->execute(array($ip,$horarioAtual,$token));

			}

		}

	}



?>