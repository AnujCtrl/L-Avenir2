<?php
use PHPMailer\PHPMailer\PHPMailer;

require_once 'phpmailer/Exception.php';
require_once 'phpmailer/PHPMailer.php';
require_once 'phpmailer/SMTP.php';

$mail = new PHPMailer(true);

$alert = '';

if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];
  $contact = $_POST['Contact'];

  try{
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    // $mail->Username = 'bapusteam@gmail.com'; // Gmail address which you want to use as SMTP server
    // $mail->Password = 'anuj2001'; // Gmail address Password
    $mail->Username = 'k.utturwar@gmail.com';
    $mail->Password = 'Kas@1234';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = '587';

    // $mail->setFrom('bapusteam@gmail.com'); // Gmail address which you used as SMTP server
    $mail->setFrom('k.utturwar@gmail.com');
    //$mail->addAddress('lavenirlanguagealliance@gmail.com'); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)
    $mail->addAddress('k.utturwar@gmail.com');

    $mail->isHTML(true);
    $mail->Subject = 'Message Received (Contact Page)';
    $mail->Body = "<h3>Name : $name <br>Email: $email <br>Message : $message <br>Contact : $contact</h3>";

    $mail->send();
    $alert = '<div class="alert-success">
                 <span>Message Sent! Thank you for contacting us.</span>
                </div>';
                
  } catch (Exception $e){
    $alert = '<div class="alert-error">
                <span>'.$e->getMessage().'</span>
              </div>';
  }
}
header('Location: index.html');
