<?php 
@include "db_reference.php"; 

include_once "mailer.php";
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget Password</title>

    <link rel="stylesheet" href="styles/signUp.css">
    
</head>
<body>
    <section class="forget_password_section">
        <div class="form_head">
            <h1>Forget Password</h1>
        </div>
        <div class="form_div">
            <form action="" method="POST" class="form">
                <div>Enter Your Email:</div>
                <input class="input email" type="email" name="user_email" placeholder="eg:- ......@gmail.com" required>
                <?php include_once "message.php"; ?>
                <input class="input submit" type="submit" name="submit_btn">              
            </form>
            <div class="home"><a href="login.php">OSCAFE</a></div>
        </div>
    </section>
</body>
</html>