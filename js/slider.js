$(function(){

	var curSlider = 0;

	//length caboeta esta mostrando o numero de elemento nessa classe
	var maxSlider = $('.banner-single').length - 1; 

	var delay = 3;

	initSlider();
	changeSlider();
	

	function initSlider(){
		//hide() vai ocultar todos os elementos do .banner-single
		$('.banner-single').hide();
		//eq esta escolhendo o elemento 0 do banner e com show() vai mostrar o que eu selecionei 
		$('.banner-single').eq(0).show();
	}

	function changeSlider(){

		//setInterval como o nome ja diz setando intervalo
		setInterval(function(){

			//fadeOut(); diminui a transparencia pode receber ate tempo
			$('.banner-single').eq(curSlider).fadeOut();
			curSlider++;
			if (curSlider > maxSlider)
				curSlider = 0;
				//fadeIn(); almenta a transparencia pode receber ate tempo 
				$('.banner-single').eq(curSlider).fadeIn();

		},delay * 1000);

	}

})

