<?php 
	
	$autoload = function($class){
		
		if($class == 'Email'){
			//incluir arquivo so que nao vai incluir mais de 1 vez
			require_once('classes/phpmailer/PHPMailerAutoload.php');
		}

		include('classes/'.$class.'.php');
	};

	spl_autoload_register($autoload);

	define('INCLUDE_PATH','http://localhost/projeto_1/');

	//Hostgator KLJcrash!987


?>