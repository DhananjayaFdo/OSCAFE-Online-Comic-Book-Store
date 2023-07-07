<?php 

@include "db_reference.php"; 
  
session_start();

$userID = $_SESSION['user_id'];

  if(!isset($userID)){
    header('location: login.php');
  }

?>

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

      if(isset($_POST['submit'])){

        $user_name = mysqli_real_escape_string($connect, $_POST['user_name']);
        $mobile_no = mysqli_real_escape_string($connect, $_POST['mobile_no']);
        $user_email = mysqli_real_escape_string($connect,  $_POST['user_email']);
        $paymentMethod = mysqli_real_escape_string($connect, $_POST['paymentMethod']);
        $address =  mysqli_real_escape_string($connect, 'Street no. ' .$_POST['address01']. ", " .$_POST['address02']. ", " .$_POST['city']. ", " .$_POST['state']. ", "  .$_POST['country']);
        $post_code = mysqli_real_escape_string($connect,  $_POST['post_code']);
        $payment_status = mysqli_real_escape_string($connect,  $_POST['payment_status']);
        $placeOn = date('d-M-Y');

        $cart_products[] = '';

        $sql2 = "SELECT * FROM cart WHERE user_id = '$userID';";

        $resultSQL = mysqli_query($connect, $sql2);

        if(mysqli_num_rows($resultSQL) > 0){
            while($product = mysqli_fetch_assoc($resultSQL)){
                $cart_products[] =  $product['name']. ' , ( '.$product['qty'] .' )'; 
            }   
        }
        
        $total_products = implode(', ',$cart_products);

        $DeleteSQL = "DELETE FROM cart WHERE user_id = '$userID';";

        if($totalPrice == 0){     
            $message[] = 'cart has no item';
        }else{
            $result = mysqli_query($connect,"INSERT INTO orders (user_id, name, mobile_no, email, payment_method, address, post_code, total_products, total_price, placed_on, paymnet_status) VALUES ('$userID', '$user_name', '$mobile_no', '$user_email', '$paymentMethod', '$address', '$post_code', '$total_products','$totalPrice', '$placeOn' ,'$payment_status');");

            $result2 = mysqli_query($connect, $DeleteSQL);
            $message[] = 'order placed successfully!';
        }
      }

    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

</head>
<body>
    <?php require_once "header.php" ?>

     <?php 
        if(isset($message)){
            foreach($message as $message){
               echo '
               <div class="message">
                  <span>'.$message. ' <i class="fas fa-times" onclick="this.parentElement.remove();"></i></span>
                  
               </div>
               ';
            }
         }
     ?>

    <section class="cart_details">
        <div class="each cart_price"> Total Price: Rs. <?php echo $totalPrice ?>.00</div>
        <div class="each item_count"> Total Items: <?php echo $total_item ?></div>
    </section>
    <section class="order_place_section">
        <form action="" method="POST">
            <h1>Place Your Order</h1>
            <div class="place_order_div">
                <div class="checkout_container">
                    <span>Your Name:</span>
                    <input type="text" name="user_name" placeholder="Enter Your Name: " required>
                </div>
                <div class="checkout_container">
                    <span>Mobile Number:</span>
                    <input type="text" name="mobile_no" placeholder="Enter Your Mobile No: " required>
                </div>
                <div class="checkout_container">
                    <span>Your Email:</span>
                    <input type="email" name="user_email" placeholder="Enter Your Email: " required>
                </div>
                <div class="checkout_container">
                    <span>Payment Method:</span>
                    <select name="paymentMethod" id="" class="input">
                        <option value="cod">Cash On Delivery</option>
                        <option value="card">Card</option>
                        <option value="bCoin">Bit Coin</option>
                        <option value="payPal">PayPal</option>
                    </select>
                </div>
                <div class="checkout_container">
                    <span>Address line 01:</span>
                    <input type="text" name="address01" placeholder="e.g. flat no. " required>
                </div>
                <div class="checkout_container">
                    <span>Address line 02:</span>
                    <input type="text" name="address02" placeholder="e.g. street name " required>
                </div>
                <div class="checkout_container">
                    <span>City:</span>
                    <input type="text" name="city" placeholder="e.g. Moratuwa" required>
                </div>
                <div class="checkout_container" required>
                    <span>State:</span>
                    <input type="text" name="state" placeholder="e.g. Colombo " required>
                </div>
                <div class="checkout_container">
                    <span>Country:</span>
                    <input type="text" name="country" placeholder="e.g. Sri Lanka " required>
                </div>
                <div class="checkout_container">
                    <span>Postal code:</span>
                    <input type="text" name="post_code" placeholder="e.g. 00100 " required >
                </div>
                <input type="hidden" name="payment_status" value="pending">
                <div class="order_now">
                    <input type="submit" name="submit" class="submit-btn" required>
                </div>
            </div>
        </form>
    </section>
    <?php include_once "footer.php" ?>  
</body>
</html>