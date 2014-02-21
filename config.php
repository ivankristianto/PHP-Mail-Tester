<?php 

$mailtests = array();

//Test 1 using mail()
$test1 = array(
	'transport'		=> 	'mail',
	'from_name'		=> 	'Your Sender Name',
	'from_email'	=>	'Your Sender Email',
	'to_name'		=>	'Your Target Name',
	'to_email'		=>	'Your Target Email',
	'subject'		=>	'test email',
	'message'		=>	'test message here'
);
$mailtests[] = $test1;

$test2 = array(
	'transport'		=> 	'sendmail',
	'from_name'		=> 	'Your Sender Name',
	'from_email'	=>	'Your Sender Email',
	'to_name'		=>	'Your Target Name',
	'to_email'		=>	'Your Target Email',
	'subject'		=>	'test email',
	'message'		=>	'test message here'
);
$mailtests[] = $test2;

$test3 = array(
	'transport'		=> 	'smtp',
	'smtp_server'	=>	'smtp.gmail.com',
	'smtp_username'	=>	'Your SMTP Username',
	'smtp_password'	=>	'Your SMTP Password',
	'smtp_encryption'	=>	'tls',
	'from_name'		=> 	'Your Sender Name',
	'from_email'	=>	'Your Sender Email',
	'to_name'		=>	'Your Target Email',
	'to_email'		=>	'Your Target Email',
	'subject'		=>	'test email',
	'message'		=>	'test message here'
);

$mailtests[] = $test3;