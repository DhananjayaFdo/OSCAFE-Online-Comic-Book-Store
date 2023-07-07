<?php 

@include "db_reference.php";

session_start();

$userID = $_SESSION['admin_id'];

  if(!isset($userID)){
    header('location: login.php');
  }

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   mysqli_query($connect, "DELETE FROM `orders` WHERE order_id = '$delete_id'") or die('query failed');
   header('location:admin_orders.php');
}

if(isset($_POST['update_order'])){

    $paymentStatus = $_POST['update_payment'];
    $roder_ID = $_POST['orderid'];

    $sql2 = "UPDATE `orders` SET `paymnet_status` = '$paymentStatus' WHERE (`order_id` = '$roder_ID');";

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

    <section class="orders">
        <?php 
            $sql = "SELECT * FROM orders;";

            $result = mysqli_query($connect, $sql);

            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
        ?>   
            <div class="box">
                <p> user id : <span><?php echo $row['user_id'] ?></span> </p>
                <p> order id : <span><?php echo $row['order_id'] ?></p>
                <p> placed on : <span><?php echo $row['placed_on'] ?></span> </p>
                <p> name : <span><?php echo $row['name'] ?></span> </p>
                <p> number : <span><?php echo $row['mobile_no'] ?></span> </p>
                <p> email : <span><?php echo $row['email'] ?></span> </p>
                <p> address : <span><?php echo $row['address'] ?></span> </p>
                <p> total products : <span><?php echo $row['total_products'] ?></span> </p>
                <p> total price : <span>$<?php echo $row['total_price'] ?>/-</span> </p>
                <p> payment method : <span><?php echo $row['payment_method'] ?></span> </p>
                <p> payment status : <span><?php echo $row['paymnet_status'] ?></span> </p>
                <form action="" method="post">
                    <input type="hidden" name="orderid" value="<?php echo $row['order_id']; ?>">
                    <select name="update_payment">
                    <option disabled selected>Payment Status</option>
                    <option value="pending">pending</option>
                    <option value="completed">completed</option>
                    </select>
                    <input type="submit" name="update_order" value="update" class="option-btn">
                </form>
                <div class="delete_div">
                    <a href="admin_orders.php?delete=<?php echo $row['order_id']; ?>" class="delete-btn" onclick="return confirm('delete this order?');">delete</a>
                </div>
            </div>

            <?php       
            }
        }else{
        ?>
            <div class="users_unavailable">
                <p>There is no orders available</p>
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