	
	//funçao com $ chamada automaticamente quando pagina for carregada
	//
	$(function(){
		//aqui vai too nosso codigo de javascript

		//o que vai acontecer quando clicar na nav.mobile
		$('nav.mobile').click(function(){
			//pode ser chamada como igual a do css
			var mobileMenu = $('nav.mobile ul');
			//abrir e fechar menu com o fadeIn or fadeOut
			/*
			if (mobileMenu.is (':hidden') == true ) {
				//fadein aparecer
				mobileMenu.fadeIn();
			}else{
				mobileMenu.fadeOut();
			}*/

			//abrir e fecha menu com isso mesmo 1 linha de comando FODA! 
			//mobileMenu.slideToggle(); 

			/* if (mobileMenu.is (':hidden') == true ) {
				//mobileMenu.show();
				//com esse metodo chamando o css
				mobileMenu.css('display','block');
			}else{
				//mobileMenu.hide();
				mobileMenu.css('display','none');
			}
			*/

			/*
			var mensagem = 'cobra kai';
			console.log(mensagem);
			alert(mensagem);
			*/

			//o metodo is verifica como esta

			//so pra deixar claro essa E pra o menu
			if (mobileMenu.is (':hidden') == true ) {

				//var icone = $('.botao-menu-mobile i');
				var icone = $('.botao-menu-mobile').find('i');
				icone.removeClass('fa-bars');
				icone.addClass('far fa-times-circle');
				mobileMenu.slideToggle();


			}else{

				var icone = $('.botao-menu-mobile').find('i');
				icone.removeClass('far fa-times-circle');
				icone.addClass('fa-bars');
				mobileMenu.slideToggle();	
			}

		})
		
		
	})

