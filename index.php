<?php 
require_once 'vendor/autoload.php';
require_once 'config.php';

if(!$mailtests) die('please fill the mail tests array');

$mailer = new PHPMailer;
?>
<!DOCTYPE html>
<html>
<head>
	<title>PHP Mailer Test by IvanKristianto.com</title>
</head>
<body>
<?php
foreach ($mailtests as $test) {
	
	echo "=========================== <br/>";

	switch ($test['transport']) {
		case 'sendmail':
			# code...
			$mailer->isSendmail();
			echo "Transport Protocol: Sendmail <br/>";
			break;
		case 'smtp':
			$mailer->SMTPDebug = 2;
			$mailer->isSMTP();
			$mailer->Host = $test['smtp_server'];
			$mailer->SMTPAuth = true; // Enable SMTP authentication
			$mailer->Username = $test['smtp_username'];
			$mailer->Password = $test['smtp_password'];
			$mailer->SMTPSecure = $test['smtp_encryption'];

			echo "Transport Protocol: SMTP <br/>";
			echo "SMTP Server: ".$test['smtp_server']." <br/>";
			echo "SMTP Username: ".$test['smtp_username']." <br/>";
			echo "SMTP Password: ".$test['smtp_password']." <br/>";
			echo "SMTP Encryption: ".$test['smtp_encryption']." <br/>";

			break;
		case 'mail':
		default:
			$mailer->isMail();
			echo "Transport Protocol: mail <br/>";
			break;
	}

	$mailer->From = $test['from_email'];
	$mailer->FromName = $test['from_name'];
	$mailer->addAddress($test['to_email'], $test['to_name']); 

	$mailer->WordWrap = 50;
	$mailer->isHTML(false);
	$mailer->Subject = $test['subject'];
	$mailer->Body    = $test['message'];

	echo "Email From: ".$test['from_name']." (".$test['from_email'].") <br/>";
	echo "Email To: ".$test['to_name']." (".$test['to_email'].") <br/>";

	echo "<strong>Result</strong> <br/>";

	if(!$mailer->send()) {
	   echo 'Message could not be sent.<br/>';
	   echo 'Mailer Error: ' . $mailer->ErrorInfo;
	   echo '<br/><br/>';
	}else{
		echo 'Message has been sent <br/><br/>';
	}
}
?>
</body>
</html>
