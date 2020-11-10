
<?php
	
	class Email
	{
		//__construct sempre vai ser chamada ao chamar a classe	
		function __construct()
		{

			// Import PHPMailer classes into the global namespace
			// These must be at the top of your script, not inside a function

			//use PHPMailer\PHPMailer\PHPMailer;
			//use PHPMailer\PHPMailer\SMTP;
			//use PHPMailer\PHPMailer\Exception;

			// Load Composer's autoloader
			//require 'vendor/autoload.php';
			
			$mail = new PHPMailer;

			try {
			    //Server settings
			    $mail->isSMTP();                                            // Send using SMTP
			    $mail->Host       = 'seduc.ce.gov.br';                    // Set the SMTP server to send through
			    $mail->SMTPAuth   = true;                             // Enable SMTP authentication
			    $mail->Username   = 'henrique.keven@seduc.ce.gov.br';                     // SMTP username
			    $mail->Password   = 'KLJcrash987';                               // SMTP password
			    $mail->SMTPSecure = 'http';         
			    $mail->Port       = 465;                                    

			    //Recipients
			    $mail->setFrom('kljcrash987@gmail.com', 'Gmail');
			    $mail->addAddress('manriquekeven@hotmail.com', 'hotmail');     // Add a recipient;   

			    // anexo de arquivos no email
			    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
			    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

			    //content
			    // permicao de html no email 
			    $mail->isHTML(true);                                  // Set email format to HTML
			    $mail->Subject = 'Assunto do email';
			    $mail->Body    = 'corpo do meu <b>email</b>';
			    $mail->AltBody = 'corpo do meu email';

			    $mail->send();
			    echo 'Message has been sent';
			}
			//try vai tentar e catch se tentou e nao deu certo
			catch (Exception $e) {
			    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
			}

		}
	}

?>
