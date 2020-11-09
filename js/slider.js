$(function(){

	var curSlider = 0;

	//length caboeta esta mostrando o numero de elemento nessa classe
	var maxSlider = $('.banner-single').length - 1; 

	var delay = 3;

	initSlider();
	changeSlider();
	
	//troca de slider span
	function initSlider(){
		//hide() vai ocultar todos os elementos do .banner-single
		$('.banner-single').hide();
		//eq esta escolhendo o elemento 0 do banner e com show() vai mostrar o que eu selecionei 
		$('.banner-single').eq(0).show();

		for (i = 0; i < maxSlider+1; i++)	{
			var bullets = $('.bullets').html();

			if (i === 0)
				bullets+= '<span classe="active-slider"></span>';

			else
				bullets+= '<span></span>';			

			$('.bullets').html(bullets);
		}

	}

	//troca de slider imagens
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
<<<<<<< HEAD

=======
				//trocar bullets da navegacao do slider
				$('.bullets span').removeClass('active-slider');
				$('.bullets span').eq(curSlider).addClass('active-slider');
>>>>>>> 94fa9ce2166a84cb8b5f8c1a5f474a3f78cd253a
		},delay * 1000);

	}

	//controle de slider 
	$('body').on('click','.bullets span',function(){
		var curBullets = $(this);
		$('.banner-single').eq(curSlider).fadeOut();
		//index(); retorna a posicicao do elemento clicado
		curSlider = curBullets.index();
		$('.banner-single').eq(curSlider).fadeIn();
		$('.bullets span').removeClass('active-slider');
		curBullets.addClass('active-slider');

	})

})

