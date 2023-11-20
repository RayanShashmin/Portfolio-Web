<?php

$name = $_POST["name"];
$email = $_POST["email"];
$message = $_POST["message"];


//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require 'send-email-main/PHPMailer/src/Exception.php';
require 'send-email-main/PHPMailer/src/PHPMailer.php';
require 'send-email-main/PHPMailer/src/SMTP.php';


//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
                 
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'rayanshashmin@gmail.com';                     //SMTP username
    $mail->Password   = 'wztjthezhfdzikgy';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom($email,$name);
    $mail->addAddress('rayanshashmin@gmail.com');     //Add a recipient

    

    //Content
    $mail->isHTML(true);                                  //Set email format to HTM
    $mail->Body    = $message;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}