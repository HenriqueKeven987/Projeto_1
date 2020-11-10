
<?php
	
	class Email
	{
		//__construct sempre vai ser chamada ao chamar a classe	
		function __construct()
		{
			
			$mail = new PHPMailer;

			try {
			    //Server settings
	
			    $mail->isSMTP();                                            // Send using SMTP
			    $mail->Host       = '';                    // Set the SMTP server to send through
			    $mail->SMTPAuth   = true;                             // Enable SMTP authentication
			    $mail->Username   = 'user@example.com';                     // SMTP username
			    $mail->Password   = 'secret';                               // SMTP password
			    $mail->SMTPSecure = 'tsl';         
			    $mail->Port       = 587;                                    

			    //Recipients
			    $mail->setFrom('from@example.com', 'Mailer');
			    $mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
			    $mail->addAddress('ellen@example.com');               // Name is optional
			    $mail->addReplyTo('info@example.com', 'Information');
			    $mail->addCC('cc@example.com');
			    $mail->addBCC('bcc@example.com');

			    // Attachments
			    $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
			    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

			    // Content
			    $mail->isHTML(true);                                  // Set email format to HTML
			    $mail->Subject = 'Here is the subject';
			    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
			    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

			    $mail->send();
			    echo 'Message has been sent';
			} catch (Exception $e) {
			    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
			}

		}
	}

?>
