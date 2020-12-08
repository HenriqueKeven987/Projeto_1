<?php

	class Painel
	{

		public static $cargos = ['0'=> 'Normal','1'=>'Sub admin','2'=>'Administrador'];

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

		//usuarios online
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

		//visitas
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

		//validar imagem
		public static function imagemValida($imagem){
			if ($imagem['type'] == 'image/jpeg' or
				$imagem['type'] == 'image/jpg' or
				$imagem['type'] == 'image/png') {				 
							//intval valor fica inteiro
				$tamanho = intval($imagem['size']/1024);
				//DOUBLE = 12.5;
				//INTEIRO = 12;
				if($tamanho <= 300)
					return true;
				else
					return false;

			}else{
				return false;
			}
		}

		//upload de arquivos
		public static function uploadFile($file){

<<<<<<< HEAD
			$formatoArquivo = explode('.', $file['nome']);
			$imagemNome = $formatoArquivo[0];
=======
			$formatoArquivo = explode('.', $file['name']);
			//pegando o nome da imagem e transformando em um unico id
			$imagemNome = uniqid().'.'.$formatoArquivo[count($formatoArquivo) - 1];

>>>>>>> d4121a440e8982cfbc56a01c5abf66c35b6a48f7
			if (move_uploaded_file($file['tmp_name'],BASE_DIR_PAINEL.'/uploads/'.$imagemNome)) 
				return $imagemNome;
			else
				return false;
		}

		//deletando arquivos
		public static function deleteFile($file){
			//esse @ vai ocultar erros ao deletar o arquivo
			//unlink deleta arquivos (diretorio,nome do arquivo)
			@unlink(BASE_DIR_PAINEL.'/uploads/'.$file);
		}
		

	}


?>