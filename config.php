<?php 
	
	$autoload = function($class){
		
		if($class == 'Email'){
			include ('classes/phpmailer/PHPMailerAutoload.php');
		}

		include('classes/'.$class.'.php');
	};

	spl_autoload_register($autoload);

	define('INCLUDE_PATH','http://localhost/projeto_1/');

	
?>