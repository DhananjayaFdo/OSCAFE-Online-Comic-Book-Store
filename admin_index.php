<?php 
@include "db_reference.php";

session_start();

$userID = $_SESSION['admin_id'];

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
    <title>Document</title>

    <!---------------styles Css---------------------------------------------->
    <link rel="stylesheet" href="styles/admin.css">

    <!---------------Icon & Fonts-------------------------------------------->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
</head>
<body>
    <?php require_once "admin_header.php" ?>

    <!--Total Orders-------------------------------------------------->

    <section class="dashboard">
      <div>
        <?php 
          $sql1 = "SELECT * FROM `orders`;";
          $result1 = mysqli_query($connect, $sql1);
          $total_orders = mysqli_num_rows($result1);
        ?>
        <p class="p1"> <?php echo $total_orders; ?></p>
        <p class="p2">Total Orders</p>
      </div>

      <!---Total Income------------------------------------------------>

      <div>
        <?php 
          $total_income = 0;
          $sql2 = "SELECT * FROM `orders` WHERE `paymnet_status` = 'completed';";
          $result2 = mysqli_query($connect, $sql2);

          while($row = mysqli_fetch_assoc($result2)){
            $total_income += $row['total_price'];
          }
        ?>
        <p class="p1"> <?php echo $total_income; ?></p>
        <p class="p2">Total Income</p>
      </div>

      <!---Pending Income-------------------------------------------->

      <div>
        <?php 
          $pending_income = 0;
          $sql3 = "SELECT * FROM `orders` WHERE `paymnet_status` = 'pending';";
          $result3 = mysqli_query($connect, $sql3);

          while($row3 = mysqli_fetch_assoc($result3)){
            $pending_income += $row3['total_price'];
          }
        ?>
        <p class="p1"> <?php echo $pending_income; ?></p>
        <p class="p2">Pending Income</p>
      </div>

      <!---Total Product------------------------------------------------->

      <div>
        <?php 
          $sql4 = "SELECT * FROM `comic`;";
          $result4 = mysqli_query($connect, $sql4);
          $row4 = mysqli_num_rows($result4);
        ?>
        <p class="p1"> <?php echo $row4; ?></p>
        <p class="p2">Total Products</p>
      </div>

      <!---Total Users---------------------------------------------------->

      <div>
        <?php 
          $sql5 = "SELECT * FROM `users`;";
          $result5 = mysqli_query($connect, $sql5);
          $row5 = mysqli_num_rows($result5);
        ?>
        <p class="p1"> <?php echo $row5; ?></p>
        <p class="p2">Total Products</p>
      </div>

      <!---Total Admins-------------------------------------------------->

      <div>
        <?php 
          $sql6 = "SELECT * FROM `users` WHERE `type` = 'admin';";
          $result6 = mysqli_query($connect, $sql6);
          $row6 = mysqli_num_rows($result6);
        ?>
        <p class="p1"> <?php echo $row6; ?></p>
        <p class="p2">Total Admins</p>
      </div>

      <!--Total Users------------------------------------------------------>

      <div>
        <?php 
          $sql7 = "SELECT * FROM `users` WHERE `type` = 'user';";
          $result7 = mysqli_query($connect, $sql7);
          $row7 = mysqli_num_rows($result7);
        ?>
        <p class="p1"> <?php echo $row7; ?></p>
        <p class="p2">Total Users</p>
      </div>

    </section> 

    <script type="text/javascript">

        $(".menu-toggle-btn").click(function(){
          $(this).toggleClass("fa-times");
          $(".navigation-menu").toggleClass("active");
        });
      </script>
</body>
</html>