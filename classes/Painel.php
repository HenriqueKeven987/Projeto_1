<?php

	class Painel
	{

		public static $cargos = ['0'=> 'Normal','1'=>'Sub admin','2'=>'Administrador'];

		public static function logado(){
			return isset($_SESSION['login']) ? true : false;
		}

		public static function loggout(){
			setcookie('Lembrar',true,time()-3600,'/'); // '/' para todo o site

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

			$formatoArquivo = explode('.', $file['name']);
			//pegando o nome da imagem e transformando em um unico id
			$imagemNome = uniqid().'.'.$formatoArquivo[count($formatoArquivo) - 1];

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

		//adicionando depoimento
		public static function insert($arr){
			$certo = true;			
			$nome_tabela = $arr['nome_tabela'];
			$query = "INSERT INTO `$nome_tabela` VALUES(null";

			foreach ($arr as $key => $value) {
				$nome = $key;
				$valor = $value;
				if ($nome == 'acao' or $value == $arr['nome_tabela']) 
					continue;
				if ($value == '') {
				 	$certo = false;
				 	break;	
				}
				$query.=",?";
				$parametros[] = $value;
			}

			$query.=")";

			if ($certo == true) {
				$sql = Mysql::conectar()->prepare($query);
				$sql->execute($parametros);
				$lastID = Mysql::conectar()->lastInsertId();
				$sql = Mysql::conectar()->prepare("UPDATE `$nome_tabela` SET order_id = ? WHERE id = $lastID");
				$sql->execute(array($lastID));
				//lastInsertId() funçao do PDO que pega o ultimo id
			}
			return $certo;
		}

		//atualizar depoimentos
		public static function update($arr){
			$certo = true;
			$primeiro = false;
			$nome_tabela = $arr['nome_tabela'];
			$query = "UPDATE `$nome_tabela` SET ";

			foreach ($arr as $key => $value) {
				$nome = $key;
				$valor = $value;
				if ($nome == 'acao' or $nome == 'nome_tabela' or $nome == 'id') 
					continue;
				if ($value == '') {
				 	$certo = false;
				 	break;	
				}
				if ($primeiro == false) {
					$primeiro = true;
					$query.="$nome = ?";
				}else{
					$query.=",$nome = ?";
				}
				$parametros[] = $value;

			}

			if ($certo == true) {	
				$parametros[] = $arr['id']; 		
				$sql = Mysql::conectar()->prepare($query.' WHERE id = ?');
				$sql->execute($parametros);
			}
			return $certo;
		}

		//paginacao de listamento
		public static function selectAll($tabela,$start = null,$end = null){ 
			if ($start == null and $end == null) 
				$sql = Mysql::conectar()->prepare("SELECT * FROM `$tabela` ORDER BY order_id ASC");
			else
				$sql = Mysql::conectar()->prepare("SELECT * FROM `$tabela` ORDER BY order_id ASC LIMIT $start,$end");
			
			$sql->execute();
			return $sql->fetchAll();
			
		}

		//excluir Registro
		public static function deletarRegistro($tabela,$idExcluir){
			$sql = Mysql::conectar()->prepare("DELETE FROM `$tabela` WHERE id = ?");
			$sql->execute(array($idExcluir));
		}

		public static function redirect($url){
			echo '<script>location.href="'.$url.'" </script>';
			die();
		}

		public static function select($tabela,$query,$arr){
			$sql = Mysql::conectar()->prepare("SELECT * FROM `$tabela` WHERE $query");
			$sql->execute($arr);
			return $sql->fetch();
		}

		public static function atualizarDepoimento($nome,$depoimentos,$data,$id){

			$sql = Mysql::conectar()->prepare("UPDATE `tb-site.depoimentos` SET nome = ?, depoimentos = ?, data =  ? WHERE id = ?");
			if($sql->execute(array($nome,$depoimentos,$data,$id))){
				return true;
			}else{
				return false;
			}

		}

		public static function orderItem($tabela,$order,$id){
			if ($order == 'up') {
				$infoItemAtual = Painel::select($tabela,'id=?',array($id));
				$order_id = $infoItemAtual['order_id'];
				$itemBefore = Mysql::conectar()->prepare("SELECT * FROM `$tabela` WHERE order_id < $order_id ORDER BY order_id DESC LIMIT 1");
				$itemBefore->execute();
				if ($itemBefore->rowCount() == 0) 
					return;
				$itemBefore= $itemBefore->fetch();				
				Painel::update(array('nome_tabela'=>$tabela,'id'=>$itemBefore['id'],'order_id'=>$infoItemAtual['order_id']));
				Painel::update(array('nome_tabela'=>$tabela,'id'=>$infoItemAtual['id'],'order_id'=>$itemBefore['order_id']));
			}else if ($order == 'down') {
				$infoItemAtual = Painel::select($tabela,'id=?',array($id));
				$order_id = $infoItemAtual['order_id'];
				$itemAfter = Mysql::conectar()->prepare("SELECT * FROM `$tabela` WHERE order_id > $order_id ORDER BY order_id ASC LIMIT 1");
				$itemAfter->execute();
				if ($itemAfter->rowCount() == 0) 
					return;
				$itemAfter= $itemAfter->fetch();				
				Painel::update(array('nome_tabela'=>$tabela,'id'=>$itemAfter['id'],'order_id'=>$infoItemAtual['order_id']));
				Painel::update(array('nome_tabela'=>$tabela,'id'=>$infoItemAtual['id'],'order_id'=>$itemAfter['order_id']));
			}
		}

		
	}


?>