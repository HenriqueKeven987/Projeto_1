<?php

	class Painel
	{
		public static function logado(){
			return isset($_SESSION['login']) ? true : false;
		}

		public static function loggout(){
			//destruir todos os dados da seçao
			session_destroy();
			header('Location: '.INCLUDE_PATH_PAINEL);
		}

		public static function carregarPagina(){

			if (isset($_GET['url'])) {
				
				$url = explode('/', $_GET['url']);
				
				if (file_exists('pages/'.$url[0].'.php')) {

					include('pages/'.$url[0].'.php');

				}else{
					//pagina nao existe direcionamento para painel
					header('Location: '.INCLUDE_PATH_PAINEL);			
				}

			}else{

				include('pages/home.php');

			}

		}

		public static function listarUsuariosOnline(){
			self::limparUsuarioOnline();
			$sql = Mysql::conectar()->prepare("SELECT * FROM `tb-admin.online`");
			$sql->execute();
			return $sql->fetchAll();
		}

		public static function limparUsuarioOnline(){
			$date = date("Y-m-d H:i:s");
			$sql = Mysql::conectar()->exec("DELETE FROM `tb-admin.online` WHERE ultima_acao < '$date' - INTERVAL 1 MINUTE");

		}

		public static function visitas(){
			$pegarVisitas = Mysql::conectar()->prepare("SELECT * FROM `tb-admin.visitas`");
			$pegarVisitas->execute();
			return $pegarVisitas;
		}

		public static function visitasHoje(){
			$pegarVisitasHj = Mysql::conectar()->prepare("SELECT * FROM `tb-admin.visitas` WHERE dia = ?");
			$pegarVisitasHj->execute(array(date('Y-m-d')));
			return $pegarVisitasHj;
				
		}

		public static function alertSuccess($tipo,$mensagem){
			if ($tipo == 'sucesso') {
				echo "<div class='box-alert sucesso'><i class='fas fa-check'></i> ".$mensagem."</div>";
			}else if ($tipo == 'erro') {
				echo "<div class='box-alert erro'><i class='fas fa-times'></i>".$mensagem."</div>";
			}
		}
		
	}


?>