
//chamando funçao para toso o thml index.php
$(function(){

	//form de toda a pagina que passa pelo index
	$('body').on('submit','form',function(){
		var form = $(this);

		//ponte de js para linguagem de back-end caso PHP
		$.ajax({
			beforeSend:function(){
				//quando tiver dominio 
				//$('.overlay-loading').fadeIn();
				console.log('enviando');
			},
			url:include_path+'ajax/formularios.php',
			method:'post',
			dataType:'json',
			data:form.serialize()
		}).done(function(data){
			if (data.sucesso) {
				//quando tiver dominio
				//$('.overlay-loading').fadeOut();
				console.log('enviado Aleluia');
				$('.sucesso').fadeIn();
				setTimeout(function(){
					
					$('.sucesso').fadeOut();
				},3000)
			}else{
				console.log("ocorreu um erro ao enviar");
			}	
		});

		return false;

	})

})


