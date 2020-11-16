<?php 
	
	//iniciando ou coninuando uma session fica salva ate o usuario fechar o navegador
	session_start();
	
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

?>