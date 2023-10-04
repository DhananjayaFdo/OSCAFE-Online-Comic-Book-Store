<?php @include "db_reference.php";  ?>


<?php 
    if(isset($_POST['submit_btn'])){
        $newPass = $_POST['newPassword'];
        $conPass = $_POST['confirmPassword'];
        $user_mail = $_POST['user_email'];

        if($newPass != $conPass){
            $message[] = "password not match!!";
        }else{
            $check_email = "SELECT `email` FROM `users` WHERE `email` = '$user_mail';";
            $check_result = mysqli_query($connect, $check_email);
            
            if(mysqli_num_rows($check_result) > 0){
                $change_pass = "UPDATE `users` set `PASSWORD` = '$newPass' WHERE `email` = '$user_mail';";
                $change_pass_result = mysqli_query($connect, $change_pass);
                $message[] = "password change!!";
                header('location:login.php');  
            }else{
                $message[] = 'email not valid!!!';
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>

    <link rel="stylesheet" href="styles/signUp.css">

</head>
<body>
<body>
    <section class="forget_password_section">
        <div class="form_head">
            <h1>Reset Password</h1>
        </div>
        <div class="form_div">
            <form action="" method="POST" class="form">
                <input class="input email" type="email" name="user_email" value="<?php if(isset($_GET['mail'])){echo $_GET['mail'];} ?>">
                <input class="input email" type="password" name="newPassword" placeholder="Enter New Password" required>
                <input class="input email" type="password" name="confirmPassword" placeholder="Confirm Password" required>
                <?php include_once "message.php"; ?>
                <input class="input submit" type="submit" name="submit_btn" value="Rest Password">
            </form>
            <div class="home"><a href="login.php">OSCAFE</a></div>
        </div>
    </section>
</body>
</body>
</html>