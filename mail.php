<?php

// Include PHPMailer library files


require_once('PHPMailer/PHPMailerAutoload.php');
  
$mail = new PHPMailer(); 


$mail->isSMTP();
$mail->Host     = 'smtp.gmail.com';
$mail->SMTPSecure = 'tls';
$mail->Port     = 587;
$mail->SMTPAuth = true;

$mail->Username = 'dshivansh41@gmail.com';
$mail->Password = '123*456*789';



$mail->setFrom('dshivansh41@gmail.com', 'CodexWorld');
$mail->addReplyTo('info@example.com', 'CodexWorld');

// Add a recipient
$mail->addAddress('shivanshdu22@gmail.com');

// Add cc or bcc 
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

// Email subject
$mail->Subject = 'Send Email via SMTP using PHPMailer';

// Set email format to HTML
$mail->isHTML(true);

// Email body content
$mailContent = '
    <h2>Send HTML Email using SMTP in PHP</h2>
    <p>It is a test email by CodexWorld, sent via SMTP server with PHPMailer using PHP.</p>
    <p>Read the tutorial and download this script from <a href="https://www.codexworld.com/">CodexWorld</a>.</p>';
$mail->Body = $mailContent;

// Send email
if(!$mail->send()){
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}else{
    echo 'Message has been sent';
}
?>