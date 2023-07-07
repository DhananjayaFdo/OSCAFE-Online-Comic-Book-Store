<?php include_once "db_reference.php" ?>

<?php 
    if(isset($_POST['submit'])){

        $userEmail = $_POST['usemail'];
        $userName = $_POST['usename'];
        $accountType = $_POST['account_type'];
        $userPassword = $_POST['userpassword'];
        $confirmPassword = $_POST['confirmPassword'];
        $joinDate = date('d-M-Y');

        $check_email = "SELECT `email` FROM `users` WHERE `email` = '$userEmail';";
        $check_email_result = mysqli_query($connect,$check_email);
        

            if(mysqli_num_rows($check_email_result) > 0){
                $message[] = 'Email Alresy Exits'; 
            }else{
                if($userPassword  != $confirmPassword){
                    $message[] = 'entered password not matches';
                }else{
                    $userCreateSQl = "INSERT INTO users (email, name, password, type, join_date) VALUES ('$userEmail','$userName','$userPassword','$accountType', '$joinDate');";
                    $result = mysqli_query($connect, $userCreateSQl);
                    header('location:login.php');
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
    <title>Sign Up</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="styles/signUp.css">
</head>
<body>
    <h1></h1>
    <section class="signup_section">
        <div class="rightSide">
            <div class="signup_headlines">
            <a href="index.php" class="rightSide_head">OSCAFE</a>
                <h1>Sign Up</h1>
            </div>
            
        </div>
        <div class="leftSide">
            <form action="" class="signup_form" method="POST">
                <div class="form_inputs">
                    <div class="with_error_container">
                        <div class="container form_userMail">
                            <i class="fa fa-at"></i><input type="email" name="usemail" placeholder="enter email" required>
                        </div>
                    </div>
                    <div class="with_error_container">
                        <div class="container form_userMail">
                            <i class="fa fa-at"></i><input type="text" name="usename" placeholder="user name" required>
                        </div>
                    </div>
                    <div class="with_error_container">
                        <div class="container form_userMail">
                            <i class="fa fa-at"></i><input type="password" name="userpassword" placeholder="enter password" required>
                        </div>
                    </div>
                    <div class="with_error_container">
                        <div class="container form_userMail">
                            <i class="fa fa-at"></i><input type="password" name="confirmPassword" placeholder="confirm password" required>
                        </div>
                        <div class="error emailNotEnter">    
                       </div>
                    </div>
                    <div><?php include_once "message.php"; ?></div>
                    <input class="submit_btn" type="submit" name="submit"  value="Sign Up">
                </div>
                <div class="alredyhaveAccount">
                    <p>alredy have an account?<a href="login.php">log in</a></p>
                </div>
                <input type="hidden" name="account_type" value="user">
            </form>
        </div>
    </section>
</body>
</html>