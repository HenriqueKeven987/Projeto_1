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


	define('BASE_DIR_PAINEL',__DIR__.'/painel/');

	//configuraçoes de acesso ao banco de dados
	define('HOST','localhost');
	define('DATABASE','projeto_1');
	define('USER','root');
	define('PASSWORD','');
	//Hostgator KLJcrash!987

	//funcoes do painel
	function pegaCargo($cargo){
		//id de cada cargo
		$arr = ['0' => 'normal','1' => 'sub admin','2' => 'administrador'];
		return $arr[$cargo];

	}

	function selecionadoMenu($selecionado){
		/*<i class="fas fa-angle-double-right"></i>*/

		//explode ('o que separa a string em array',o que vai ser separado);
		$url = explode('/',@$_GET['url'])[0];
		if ($url == $selecionado) {
			echo 'class="menu-active"';
		}

	}

	function verificaPermicaoMenu($permissao){
		if ($_SESSION['cargo'] >= $permissao) {
			return;
		}else{
			echo 'style="display:none;"';
		}
	}

	function verificaPermicaoPagina($permissao){
		if ($_SESSION['cargo'] >= $permissao) {
			return;
		}else{
			include('painel/pages/permicao_negada.php');
			die();
		}
	}




?>