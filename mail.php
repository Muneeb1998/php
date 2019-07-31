
<?php
if (isset($_POST["submit"])){
		$name= $_POST["name"];
		$from= $_POST["email"];
		$phone= $_POST["phone"];
		$msg= $_POST["message"];
		require "phpmailer/PHPMailerAutoload.php";
		$mail = new PHPMAILER;
		//$name = $_POST['name'];
		//$from= $_POST['email'];// sender

		$mail->isSMTP();                            // Set mailer to use SMTP
		$mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                     // Enable SMTP authentication
		$mail->Username = "";          // SMTP username (gmail account)
		$mail->Password = ''; 			// SMTP password (gmail account password)
		$mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 587;                          // TCP port to connect to

		$mail->setFrom($_POST["email"],$name);
		$mail->addAddress("");   // Add a your gmail account
		$mail->addReplyTo($from,$name);
		$mail->isHTML(true);  // Set email format to HTML

		$bodyContent = '<h1>Contact form</h1>';
		$bodyContent .= "<h1 align=center>Name: ".$name."<br>Email :".$from."<br>Contact Number :".$phone."<br>Message :".$msg."</h1>";

		$mail->Subject = 'Contact by '.$name." ";
		$mail->Body    = $bodyContent;

		if(!$mail->send()) {
			echo 'Message could not be sent.';
			echo 'Mailer Error: ' . $mail->ErrorInfo;
		} else {
			echo 'Message has been sent';
		}
}
?>
