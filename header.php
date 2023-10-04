<?php 

  $user_id = $_SESSION['user_id'];

  include_once "db_reference.php" ;

  $cart_item = "SELECT * FROM  `cart` WHERE `user_id` = '$user_id';";
  $cart_item_result = mysqli_query($connect, $cart_item);

  $count = mysqli_num_rows($cart_item_result);
?>

<header>
  <div class="inner-width">
    <a href="index.php" class="logo"><p> OSCAFE</p></a>
    <i class="menu-toggle-btn fas fa-bars"></i>
    <nav class="navigation-menu">
      <a href="index.php"><i class="fas fa-home home"></i> Home</a>
      <a href="comicBook.php"><i class="fas fa-align-left about"></i>Comics</a>
      <a href="character.php"><i class="fa-solid fa-mask hero"></i></i>Characters</a>
      <a href="cart.php"><i class="fa fa-shopping-cart cart"></i>Cart <b><sup><?php echo $count ?></sup></b></a>
      <a href="search.php"><i class="fa fa-search search"></i></a>
      <a href="user_change.php"><i class="fa-solid fa-user"></i></a>
      <a href="logout.php">Log out</a>
    </nav>
  </div>
</header>