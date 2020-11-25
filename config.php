<?php 
	
	//iniciando ou continuando uma session fica salva ate o usuario fechar o navegador
	session_start();
	date_default_timezone_set('America/Sao_paulo');
	
	$autoload = function($class){
		
		if($class == 'Email'){
			//incluir arquivo so que nao vai incluir mais de 1 vez
			require_once('classes/phpmailer/PHPMailerAutoload.php');
		}

		include('classes/'.$class.'.php');
	};

	spl_autoload_register($autoload);

								//quando for subir online ip da maquina no localhost
	define('INCLUDE_PATH','http://localhost/projeto_1/');
	define('INCLUDE_PATH_PAINEL', INCLUDE_PATH.'painel/');

	//configuraçoes de acesso ao banco de dados
	define('HOST','localhost');
	define('DATABASE','projeto_1');
	define('USER','root');
	define('PASSWORD','');
	//Hostgator KLJcrash!987

	//funcoes
	function pegaCargo($cargo){
		//id de cada cargo
		$arr = ['0' => 'normal','1' => 'sub admin','2' => 'administrador'];

		return $arr[$cargo];

	}


?>