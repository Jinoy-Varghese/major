<?php 
  
use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\Exception; 
use PHPMailer\PHPMailer\SMTP; 
  
require 'vendor/autoload.php'; 
  
$mail = new PHPMailer(true); 
  $mail->isSMTP();
try { 
   
    $mail->SMTPDebug = 0;  
    $mail->Mailer='smtp';                                      
    $mail->isSMTP();                                             
    $mail->Host       = 'mail.postale.io';                     
    $mail->SMTPAuth   = true;                              
    $mail->Username   = 'support@mtcst.ml';                  
    $mail->Password   = 'oxaqguAMkgq3';                         
    $mail->SMTPSecure = 'STARTTLS';                               
    $mail->Port       = 587;   
    $mail->IsHTML(TRUE);
    $mail->setFrom('support@mtcst.ml', 'MTCST'); 
    $maill="jinoy.v2000@gmail.com";           
    $mail->addAddress($maill); 
                   
    $mail->Subject = 'Subject'; 
    $mail->Body    = 'helloo jino.aa....  this is a message from eparish '; 
    $mail->AltBody = 'Body in plain text for non-HTML mail clients'; 
    $mail->send(); 
    echo "Mail has been sent successfully!"; 
} catch (Exception $e) { 
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"; 
} 
  

?> 