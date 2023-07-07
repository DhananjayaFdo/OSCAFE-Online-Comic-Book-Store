<?php

session_start();

 include_once "db_reference.php" 
?>

<?php

    if(isset($_POST['submit'])){

        $userEmail = $_POST['usemail'];
        $password = $_POST['passwordEnter'];


        $mail_check = "SELECT `email` FROM `users` WHERE `email` = '$userEmail';";
        $mail_check_result = mysqli_query($connect, $mail_check);

        if(mysqli_num_rows($mail_check_result) == 0){
            $message[] = 'email not exist, create new account!!';
        }else{
            $pass_check = "SELECT * FROM `users` WHERE `email` = '$userEmail' and PASSWORD = '$password';";
            $pass_check_result = mysqli_query($connect, $pass_check);
            if(mysqli_num_rows($pass_check_result) > 0){
                $row = mysqli_fetch_assoc($pass_check_result);
                if($row['type'] == 'user'){
    
                    $_SESSION['user_name'] = $row['name'];
                    $_SESSION['user_email'] = $row['email'];
                    $_SESSION['user_id'] = $row['id']; 
                    header('location:index.php');
    
                }elseif($row['type'] == 'admin'){
    
                    $_SESSION['admin_user'] = $row['name'];
                    $_SESSION['admin_email'] = $row['email'];
                    $_SESSION['admin_id'] = $row['id'];
                    header('location:admin_index.php');
    
                }else{
                    $message[] = 'user not valid!!';
                }
            }else{
                $message[] = 'password not correct!!';
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
    <title>login</title>

    

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="styles/signUp.css">
</head>
<body>
    <h1></h1>
    <section class="signup_section">
        <div class="rightSide">
            <div class="signup_headlines">
                <a href="index.php" class="rightSide_head">OSCAFE</a>
                <h1>Log In</h1>
            </div>
            
        </div>
        <div class="leftSide">
            <form action="" class="signup_form" method="POST">
                <div class="form_inputs">
                    <div class="container one">
                        <i class="fa fa-at"></i><input type="text" name="usemail" placeholder="enter email" required>
                    </div>
                    <div class="container one">
                        <i class="fa fa-eye-slash"></i><input type="password" name="passwordEnter" placeholder="enter password" required>
                    </div>
                    <p><?php include_once "message.php"; ?></p>
                    <p>forget password? <a href="forgetPassword.php">reset password</a></p>
                    <input class="submit_btn" type="submit" name="submit" value="Sign Up">
                </div>
                <div class="alredyhaveAccount">
                    <p>don't have an account? <a href="signup.php">Sign up</a></p>
                </div>
            </form>
        </div>
    </section>
</body>
</html>