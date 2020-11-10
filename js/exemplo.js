$(function(){

	var atual = -1;
	var maximo = $('.box-especialidades').length -1;
	var timer;
	var animacaoDelay = 2;

	executarAnimacao();
	function executarAnimacao(){

		$('.box-especialidades').hide();

		timer = setInterval (logicaAnimacao,animacaoDelay * 1000);

		function logicaAnimacao(){

			atual++;
			if (atual > maximo) {
				//para o timer
				clearInterval(timer);
				return false; 
			}

			//alert('parando intervalo'); 

			$('.box-especialidades').eq(atual).fadeIn();

		} 

	}


})