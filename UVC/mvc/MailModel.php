<?php
	class MailModel{
		function __construct(){
		}

		function send_mail($json){
			$Root = $_SERVER["DOCUMENT_ROOT"];
			// require($Root."/lib/PHPMailer-master/src/PHPMailer.php");
			// require($Root."/lib/PHPMailer-master/src/SMTP.php");
			include_once $Root."/".$json["project"]."/lib/PHPMailer-master/src/PHPMailer.php";
			include_once $Root."/".$json["project"]."/lib/PHPMailer-master/src/SMTP.php";
			include_once $Root."/".$json["project"]."/lib/PHPMailer-master/src/Exception.php";
			
			$mail = new PHPMailer\PHPMailer\PHPMailer();
			$mail->IsSMTP(); // enable SMTP
		
			$body = $json["body"];
			$title = $json["title"];
			$to_list = $json["to_list"];
			$set_from = $json["set_from"];
			$from_name = $json["from_name"];
			
			
			$mail->CharSet = "UTF-8";
			$mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only, 0 = No message
			$mail->SMTPAuth = true; // authentication enabled
			$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
			$mail->Host = "smtp.gmail.com";
			$mail->Port = 465; // or 587
			$mail->IsHTML(true);
			$mail->Username = "datgsender@gmail.com";  
			$mail->Password = "kkmsqippccxkpkzl";
			$mail->SetFrom($set_from,$from_name);
			$mail->Subject = $title;
			$mail->Body = $body;
		
			for($i=0;$i<count($to_list);$i++){
				$mail->AddAddress($to_list[$i]);
			}
			// print_r($json["file"]);
			if (isset($json["file_1"])) {
				for($i = 0; $i < count($json["file_1"]); $i++){
					$mail->addAttachment($json["file_1"][$i]);
				}
			}

			if (isset($json["file_2"])) {
				for($i = 0; $i < count($json["file_2"]); $i++){
					$mail->addAttachment($json["file_2"][$i]);
				}
			}
			// if (isset($json["file"])) {
			// 	$mail->addAttachment($json["file"]);
			// }
			// Attachments
			// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
			// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

			$result = $mail->Send();
			return $result;
			if(!$mail->Send()) {
				echo "Mailer Error: ";
			} else {
				echo "Message has been sent";
			}
		}
	}
?>
