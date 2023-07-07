<?php 

@include "db_reference.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

function send_password_reset($user_name, $user_email, $token){
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        //Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                       //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = "smtp.gmail.com";                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = "oc621859@gmail.com";                     //SMTP username
        $mail->Password   = "ukfepmoqzfuxzviu";                               //SMTP password
        $mail->SMTPSecure = "tls";            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('oc621859@gmail.com', $user_name);
        $mail->addAddress($user_email);     //Add a recipient
        

        $email_template = " <p>Your Password ChangeCode</p>
                            <a href='http://localhost/OSCAFE/resetPassword.php?token=$token&mail=$user_email'> click me </a>    
                                ";

       //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Reset Password Code';
        $mail->Body    = $email_template;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        $message[] = 'Message has been sent';
    } catch (Exception $e) {
        $message[] = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
   
}

if(isset($_POST['submit_btn'])){
    $user_mail = $_POST['user_email'];
    
    $sql = "SELECT * FROM `users` WHERE email = '$user_mail';";
    $result = mysqli_query($connect, $sql);
    $token = md5(rand(111111, 999999));

    if(mysqli_num_rows($result) > 0){
        $user_details = mysqli_fetch_assoc($result);

        $user_name = $user_details['name'];
        $user_email = $user_details['email'];

        $token_insert = "UPDATE `users` set `token` = '$token' WHERE `email` = '$user_mail' LIMIT 1;";
        $update_token = mysqli_query($connect, $token_insert);
            if($update_token){
                send_password_reset($user_name, $user_email, $token);
                $message[] = 'Password reset pin send to your email';
            }else{
                $message[] = 'soomthing went wrong!!';
            }    
        }else{
            $message[] = 'email not available';
    }
}
?>