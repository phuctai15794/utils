<?php 
$config['mail_config']['host'] = "smtp.gmail.com";
$config['mail_config']['port'] = "465";
$config['mail_config']['email'] = "";
$config['mail_config']['password'] = "";

include_once "SMTP_phpmailer/class.phpmailer.php";
include_once "SMTP_phpmailer/class.smtp.php";

$mail = new PHPMailer();
$mail->IsSMTP(); // set mailer to use SMTP
$mail->Host = $config['mail_config']['host']; // specify main and backup server
$mail->Port = $config['mail_config']['port']; // set the port to use
$mail->SMTPAuth = true; // turn on SMTP authentication
$mail->SMTPSecure = 'ssl';
$mail->Username = $config['mail_config']['email']; // your SMTP username or your gmail username
$mail->Password = $config['mail_config']['password']; // your SMTP password or your gmail password
$from = $config['mail_config']['email']; // Reply to this email
$to=$config['mail_config']['email']; // Recipients email ID
$name=$row_setting_admin["ten_$lang"]; // Recipient's name
$mail->SetFrom($config['mail_config']['email'],$row_setting_admin["ten_$lang"]);
$mail->From = $from;
$mail->FromName = $row_setting_admin["ten_$lang"]; // Name to indicate where the email came from when the recepient received
$mail->AddAddress($to,$name);
$mail->AddReplyTo($from,$row_setting_admin["ten_$lang"]);
$mail->IsHTML(true); // send as HTML
?>