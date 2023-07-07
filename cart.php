<?php include_once "db_reference.php" ?>

<?php 
session_start();

$userID = $_SESSION['user_id'];

  if(!isset($userID)){
    header('location: login.php');
  }

?>

<?php 
    if(isset($_POST['remove'])){
        $delete = $_POST['id'];
        $remove = "DELETE FROM cart WHERE id = '$delete';";

        $result2 = mysqli_query($connect, $remove);
        header('location: '.$_SERVER['PHP_SELF']);
    }
?>

<?php 
  if(isset($_POST['increase'])){
    $comicid = $_POST['comicid'];
    $userid = $_POST['userid'];

    $check = "SELECT * FROM cart WHERE user_id = '$userid' and comic_id = '$comicid ';";
    $check_result = mysqli_query($connect, $check);
    $check_details = mysqli_fetch_assoc($check_result);

    $quty = $check_details['qty'] + 1;

    $addnew = "UPDATE `cart` set `qty` = '$quty' WHERE user_id = '$userid' and comic_id = '$comicid ';";
    $addnew_result = mysqli_query($connect,$addnew)  or die('query failed');
    header('location: '.$_SERVER['PHP_SELF']);
  }
?>

<?php 
  if(isset($_POST['dicrese'])){
    $comicid = $_POST['comicid'];
    $userid = $_POST['userid'];

    $check = "SELECT * FROM cart WHERE user_id = '$userid' and comic_id = '$comicid ';";
    $check_result = mysqli_query($connect, $check);
    $check_details = mysqli_fetch_assoc($check_result);
    
    $quty = $check_details['qty'] - 1;

    if($check_details['qty'] > 1){
      $addnew = "UPDATE `cart` set `qty` = '$quty' WHERE user_id = '$userid' and comic_id = '$comicid ';";
      $addnew_result = mysqli_query($connect,$addnew)  or die('query failed');
      header('location: '.$_SERVER['PHP_SELF']);
    }else{
      $removeItem = "DELETE FROM cart WHERE user_id = '$userid' and comic_id = '$comicid ';";
      $removeItem_result = mysqli_query($connect, $removeItem);
      header('location: '.$_SERVER['PHP_SELF']);
    }
    
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OSCAFE</title>
    <!---------------styles Css---------------------------------------------->

    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/comic_display_container.css">
    <link rel="stylesheet" href="styles/cart.css">

    <!---------------Icon & Fonts-------------------------------------------->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
</head>
<body>
    <?php require_once "header.php"?>
  <div class="cart_page"> 
    <section class="cart_item_sectio">
        <?php 
          $sql1 = "SELECT * FROM oscafe.cart WHERE user_id = '$userID';";

          $result = mysqli_query($connect, $sql1);


          if(mysqli_num_rows($result) > 0)

          while($row = mysqli_fetch_assoc($result)){

        ?>
          <div class="comic_display">
                <img src="images/<?php echo $row['image'] ?>" alt="comic_image">
                <div class="comic_details">
                    <p><?php echo $row['name'] ?></p>
                    <p><?php echo $row['price'] ?></p>
                </div>
                <form action="" method="POST">
                  <div class="comic_remove_btn_con">
                    <div class='item_imcrease'>
                      <input type="submit" name="increase" value='+' class='cal'>
                      <p><?php echo $row['qty'];?></p>
                      <input type="submit" name='dicrese' value='-' class='cal'>
                    </div>
                    <input type="submit" name="remove" value="remove" class="comic_remove_btn">
                  </div>
                <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                <input type="hidden" name='comicid' value='<?php echo $row['comic_id']?>'>
                <input type="hidden" name='userid' value='<?php echo $row['user_id'] ?>'>
                </form>
            </div>

          <?php }
        
         ?>
    </section>  

    <?php
      $countSQLQuery = "SELECT * FROM cart WHERE user_id = '$userID';";

      $countSQLResult = mysqli_query($connect, $countSQLQuery);

      $total_item = 0;
      $totalPrice = 0;

      while($rowElement = mysqli_fetch_assoc($countSQLResult)){
        $total_item = $total_item + $rowElement['qty'];
        $totalPrice = $totalPrice + ($rowElement['price'] * $rowElement['qty']);
      }

      function discounPrice($totalPrice){
        return round($totalPrice * 98 / 100);
      }
    ?>

    <section class="cart_total_display">
          <form class="cart_collection">
            <div class="cart_collection_div car_one">
              <div class="left">cart Items Count: </div>
              <div class="right"><?php echo $total_item ?></div>
            </div>
            <div class="cart_collection_div car_two">
              <div class="left">Total Price:</div> 
              <div class="right">Rs: <?php echo $totalPrice ?>.00</div>
            </div>
            <div class="cart_collection_div car_three">
              <div class="left">Discount: </div>
              <div class="right"> 2%</div>
            </div>
            <div class="cart_collection_div car_four">
              <div class="left">sub total:</div>
              <div class="right">Rs: <?php echo discounPrice($totalPrice) ?>.00</div>
            </div>
            <div class="checkOut_btn">
              <a href="checkOut.php">Check Out</a>
            </div>
                      </form>  
    </section>
  </div>

  <?php include_once "footer.php" ?>

  <script type="text/javascript">

        $(".menu-toggle-btn").click(function(){
          $(this).toggleClass("fa-times");
          $(".navigation-menu").toggleClass("active");
        });
      </script>

</body>
</html>