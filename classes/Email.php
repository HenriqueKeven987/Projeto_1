
<?php
	
	class Email
	{

		private $mailer;

		//__construct sempre vai ser chamada ao chamar a classe	
		public function __construct($host,$username,$senha,$name)
		{
			
			$this->mailer = new PHPMailer;

			{
			    //Server settings
			    $this->mailer->isSMTP();                       
			    $this->mailer->Host       = $host;                   
			    $this->mailer->SMTPAuth   = true;                            
			    $this->mailer->Username   = $username;                     
			    $this->mailer->Password   = $senha;
			    //assm vc pergunta isso la no posto ipirangua
			    //porta do servidor e protocolo de segurança                               
			    $this->mailer->SMTPSecure = 'ssl';         
			    $this->mailer->Port       = 465;

			    //metodo de envio 
			    $this->mailer->setFrom($username,$name);
			    //permitir html no email enviado   
			    $this->mailer->isHTML(true);
			    //setando o cassete ou desculpa o charset utf 8 no email
			    $this->mailer->CharSet = "UTF-8";

			}

		}


		public function addAdress($email,$nome){

			$this->mailer->addAddress($email,$nome);

		}//addAdress

		public function formatarEmail($info){
                                  
			$this->mailer->Subject = $info['assunto'];
			$this->mailer->Body    = $info['corpo'];
									//tirar o que tiver de codigo html strip_tags	
			$this->mailer->AltBody = strip_tags($info['assunto']);

		}//formatarEmail

		public function enviarEmail(){

			if ($this->mailer->send()){
				return true;
			}
			else{
				return false;
			}
		}//enviarMail


	}

?>
