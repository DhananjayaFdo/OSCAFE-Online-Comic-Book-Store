<?php 
    
    $quty = 1;

    if(isset($_POST['cart_add'])){
        $name = $_POST['name'];
        $price = $_POST['price'];
        $image = $_POST['image'];
        $userId = $_POST['user_id'];
        $comic_id = $_POST['comic_id'];

        $check = "SELECT * FROM cart WHERE user_id = '$userId' and comic_id = '$comic_id ';";
        $check_result = mysqli_query($connect, $check);

        

        if(mysqli_num_rows($check_result)  < 1){
            $sql2 = "INSERT INTO cart(comic_id, name, price, image, user_id, qty) VALUES ('$comic_id','$name', '$price', '$image', '$userId', '$quty')";
            $result2 = mysqli_query($connect,$sql2)  or die('query failed');
            header('location: '.$_SERVER['PHP_SELF']);
        }else{
            $check_details = mysqli_fetch_assoc($check_result);
            $quty = $check_details['qty'] + 1;
            $addnew = "UPDATE `cart` set `qty` = '$quty' WHERE user_id = '$userId' and comic_id = '$comic_id ';";
            $addnew_result = mysqli_query($connect,$addnew)  or die('query failed');
            header('location: '.$_SERVER['PHP_SELF']);
        }

        
    }
?>