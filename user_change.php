<?php include_once "db_reference.php" ?>

<?php 
session_start();

$userID = $_SESSION['user_id'];

  if(!isset($userID)){
    header('location: login.php');
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user change</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>

    <link rel="stylesheet" href="styles/user_change.css">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/header.css">

</head>
<body>
    <?php require_once "header.php"?>

    <section class='body'>
        <section class='user_details_con'>
            <div class='user_details'>
                <?php 
                    $user = "SELECT * FROM users WHERE id = '$userID';";
                    $user_result = mysqli_query($connect, $user);
                    $userDetails = mysqli_fetch_assoc($user_result);
                ?>

                <p><?php echo $userDetails['name']; ?></p>
                <p><?php echo $userDetails['email']; ?></p>
            </div>

            <?php 
                if(isset($_POST['change'])){

                    $old_pass = $_POST['old_password'];
                    $new_pass = $_POST['new_pass'];
                    $new_pass_con = $_POST['new_pass_con'];

                    $userpass = "SELECT * FROM users WHERE id = '$userID';";
                    $userpass_result = mysqli_query($connect, $userpass);
                    $user_details_check = mysqli_fetch_assoc($userpass_result);                 

                    if($old_pass == $user_details_check['PASSWORD']){
                        if($new_pass == $new_pass_con){
                            $changePass = "UPDATE `users` set `PASSWORD` = '$new_pass' WHERE `id` = '$userID';";
                            $changePass_result = mysqli_query($connect, $changePass);
                            $message[] = 'password changed!!';
                        }else{
                            $message[] = 'New Password is not matched!!';
                            
                        }
                    }else{
                        $message[] = 'Old Password Not Corrext!!';
                        
                    }
                }
            ?>

            <form class='user_passchange' method='post'>
                <h3>Reset You Passowrd</h3>
                <input type="password" name='old_password' placeholder='enter current password' class='oldpass' required>
                <div class='newpass'>
                    <input type="password" name='new_pass' placeholder='enter new password' required>
                    <input type="password" name='new_pass_con' placeholder='Confirm password' required>
                </div>
                <p><?php include_once "message.php"; ?></p>
                <input type="submit" class='submit_btn' name='change' value='change password'>
            </form>
        </section>
    </section>

    <?php include_once "footer.php" ?>

    <script type="text/javascript">
        $(".menu-toggle-btn").click(function(){
          $(this).toggleClass("fa-times");
          $(".navigation-menu").toggleClass("active");
        });
    </script>
</body>
</html>