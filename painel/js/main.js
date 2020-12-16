
$(function(){

	var open = true;

	//window puxando a key 0 funcoes nativas do js e innerWidth puxando a largura
	var windowSize = $(window)[0].innerWidth;

	var targetSizeMenu = (windowSize <= 768) ? 250 : 300;


	if (windowSize <= 768) {

		$('.menu').css('width','0').css('padding','0');
		open = false;

	}

	//quando clicar no menu
	$('.menu-btn').click(function(){

		if (open) {
			//menu esta aberto

			$('.menu').animate({'width':0, 'padding': 0},function(){
				open = false;
			});
			$('.content,header').css('width','100%');
			$('.content,header').animate({'left':0},function(){
				open = false;
			});

		}
		else{
			//o menu esta fechado
			$('.menu').animate({'width':targetSizeMenu+'px', 'padding':'10px'},function(){
				open = true;
			});
			//$('.content,header').css('width','calc(100% - 300px)');
			$('.content,header').animate({'left':targetSizeMenu+'px'},function(){
				open = true;
			});

		}

	})


	//redimencionar em tempo real
	$(window).resize(function(){	

		windowSize = $(window)[0].innerWidth;
		targetSizeMenu = (windowSize <= 400) ? 200 : 250;

		if (windowSize <= 768) {

			$('.menu').css('width','0').css('padding','0');
			$('.content, header').css('width', '100%').css('left','0');
			open = false;

		}else{

			$('.menu').animate({'width':targetSizeMenu+'px','padding':'10px 0'},function(){
				open = true;
			});

			$('.content, header').css('width', 'calc(100% - 250px)');
			$('.content, header').animate({'left':targetSizeMenu+'px'},function(){
				open = true;
			})
		}

	})


	$('[formato=data]').mask('99/99/9999');

	//caixa de confimaçao de excluir
	$('[actionBtn=delete]').click(function(){
		var r = confirm("Tem Certeza que Deseja Excluir?");
		if (r == true) {
		  return;
		}else{
		  return false;
		}
	})


})

