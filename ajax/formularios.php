<?php

	//ajax faz com que o php e javascript namore kkkk tenha uma interaçao 
	//javascript e php vao fazer troca troca
	//json serve pra trocar insformaçoes da linguagem de back-end para o javascript


	include('../config.php');

	$data = [];
	$assunto = 'nova mensagem do site';
	$corpo = '';


	foreach ($_POST as $key => $value) {
							//ucfirst faz com q a primeira letra do php fique maiuscula
		$corpo.=ucfirst($key).': '.$value;
		$corpo.="<br/>";

	}

	$info = ['assunto: '=>$assunto,'corpo'=>$corpo];

	$classMailContato = new Email('dankicode.com','testes@dankicode.com','gui123456','Guilherme');
	$classMailContato->addAdress('contato@dankicode.com','Guilherme');
	$classMailContato->addAdress('kljcrash987@gmai.com','Henrique');

	$classMailContato->formatarEmail($info);

	if ($classMailContato->enviarEmail()){
		$data['sucesso'] = true;
	}
	else{
		$data['erro'] = true;
	}

	$data['retorno'] = 'sucesso';

	//json_encode trasnformando a array data do php em objeto do js
	die(json_encode($data));

?>