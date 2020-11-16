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
		
	}


?>