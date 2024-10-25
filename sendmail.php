<?php 

session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if(isset($_POST['submitContact']))
{

  $fullname = $_POST['full_name'];
  $email = $_POST['email'];
  $mobile = $_POST['mobile'];
  $message = $_POST['message'];
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      
    $mail->isSMTP();                                           
    $mail->Host       = 'smtp.gmail.com';                     
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = 'borgesachin365@gmail.com';                     
    $mail->Password   = 'amhphwormytnqyvx';                              
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            
    $mail->Port       = 587;                                   

    //Recipients
    $mail->setFrom('borgesachin365@gmail.com', 'Mail send using PHPmailer');
    $mail->addAddress('borgesachin365@gmail.com', 'Mail send using PHPmailer');    

    //Content
    $mail->isHTML(true);                                  
    $mail->Subject = 'New Enquiry - Funda of web IT Contact Form';
    $mail->Body    = '<h3>Hello you got an new enquiry</h3>
    <h4>Fullname: '.$fullname.'</h4>
    <h4>Email: '.$email.'</h4>
    <h4>Mobile: '.$mobile.'</h4>
    <h4>Message: '.$message.'</h4>
    ';
  if($mail->send())
  {
    $_SESSION['status'] = "Thank you for contacting us. Our team will get back to you soon!";
    header("Location: {$_SERVER["HTTP_REFERER"]} ");
    exit(0);
  }else{
    $_SESSION['status'] = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    header("Location: {$_SERVER["HTTP_REFERER"]} ");
    exit(0);
  }
    
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}
else{
  header('Location: index.php');
  exit(0);
}
?>