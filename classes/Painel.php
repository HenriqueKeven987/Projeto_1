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
					
				}

			}else{

				include('pages/home.php');

			}

		}
		
	}


?>