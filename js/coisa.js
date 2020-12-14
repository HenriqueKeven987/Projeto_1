	

	//funçao com $ chamada automaticamente quando pagina for carregada
	//$ fazendo referencia a todo elemento
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


		//ajuste de scroll em sobre e servicos
		if($('target').length > 0){

			//attr esta selecionando o atributo target que esta na tag target
			//nao esquece de declarar a id genio 
			var elemento = '#'+$('target').attr('target');
			//alert(elemento);
			//offSet retornar as coordenadas do elemento
			var divScroll = $(elemento).offset().top;
			//animate vai alterar a altura de acordo com a coordenada passada pelo offSet
			//assim fazendo com que a pagina dessa ao depoimento ou o servicos
			$('html,body').animate({'scrollTop':divScroll});

		}

		carregarDinamico();	 	

		function carregarDinamico(){

			$('[realtime]').click(function(){

				var pagina = $(this).attr('realtime');

				$('.container-principal').hide();
				$('.container-principal').load(include_path+'pages/'+pagina+'.php');

				setTimeout(function(){
					initialize();
					addMarker(-3.772760,-38.619230,'',"Minha casa",undefined,false);
				},1000);

				$('.container-principal').fadeIn(1000);
				//versao evoluida do $_GET 
				window.history.pushState('','',pagina);

				return false;

			})
		}
		
		
	})

