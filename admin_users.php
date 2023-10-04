<?php 

@include "db_reference.php";

session_start();

$userID = $_SESSION['admin_id'];

  if(!isset($userID)){
    header('location: login.php');
  }

?>

<!-- user type change -->

<?php
    if(isset($_POST['change_user'])){
        $userType = $_POST['user_type'];
        $user_id = $_POST['user_id'];

        $sql2 = "UPDATE `users` SET `type` = '$userType' WHERE (`id` = '$user_id');";

        $result2 = mysqli_query($connect, $sql2);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="styles/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>

</head>
<body>
    
    <?php require_once "admin_header.php" ?>

    <section class="users">

    <?php  

        $sql = "SELECT * FROM users;";

        $result = mysqli_query($connect, $sql);

        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
    ?>

        <div>
            <p>User ID: <span><?php echo $row['id'] ?></span></p>
            <p>User Email: <span><?php echo $row['email'] ?></span></p>
            <p>User Name: <span><?php echo $row['name'] ?></span></p>
            <p>Join Date: <span><?php echo $row['join_date'] ?></span></p>
            <p>User Type: <span><?php echo $row['type'] ?></span></p>
            <form action="" method="post">
                <input type="hidden" name="user_id" value="<?php echo $row['id']  ?>">
                <select name="user_type" id="">
                    <option disabled selected></option>
                    <option value="user">user</option>
                    <option value="admin">admin</option>
                </select>
                <input type="submit" name="change_user" value="Change">
            </form>
        </div>


    <?php       
            }
        }else{
        ?>
            <div class="users_unavailable">
                <p>There is no users available</p>
            </div>
        <?php
        }
    ?>
    </section>

    <script type="text/javascript">
        $(".menu-toggle-btn").click(function(){
          $(this).toggleClass("fa-times");
          $(".navigation-menu").toggleClass("active");
        });
    </script>
</body>
</html>