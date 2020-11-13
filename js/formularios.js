
$(function(){


	//form de toda a pagina que passa pelo index
	$('body').on('submit','form',function(){
		var form = $(this);

		//ponte de js para linguagem de back-end caso PHP
		$.ajax({
			url:include_path+'ajax/formularios.php',
			method:'post',
			dataType: 'json',
			data:form.serialize()

		}).done(function(data){
			if (data.sucesso) {
				//vamos melhorar a interface
				console.log("email enviado!");
			}else{
				console.log("ocorreu um erro ao enviar");
			}	
		});

		return false;

	})

})


