<?php 
  
use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\Exception; 
use PHPMailer\PHPMailer\SMTP; 
  
require 'vendor/autoload.php'; 
  
$mail = new PHPMailer(true); 
$u_name=$this->input->post('u_name');

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
    $mail->addAddress($u_name); 
                   
    $mail->Subject = 'Password Reset'; 
    $mail->Body    = 'A request for forget password has been produced. <br /><br /> Click on the following link to reset your password.<br /><br /><a href="'.base_url('/Home/reset_my_password').'">Reset Password</a> '; 
    $mail->AltBody = 'Body in plain text for non-HTML mail clients'; 
    $mail->send(); 

    $this->session->set_flashdata('mailsend',"success");
    redirect('Home/login','refresh');

  } catch (Exception $e) { 
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"; 
} 
  

?> 