<?php include_once "db_reference.php" ?>

<?php include "cart_add_reference.php" ?>

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
    <title>OSCAFE</title>
    <!---------------styles Css---------------------------------------------->

    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/comic_display_container.css">

    <!---------------Icon & Fonts-------------------------------------------->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
</head>
<body>
    <?php require_once "header.php"?>

    <section class="comic_display_container">
        <?php 
            $comic_import = "SELECT * FROM `comic`;";
            $comic_import_result = mysqli_query($connect, $comic_import);

            while($comic_details = mysqli_fetch_assoc($comic_import_result)){ ?>

            <div class="comic_display">
                <img src="images/<?php echo $comic_details['image'] ?>" alt="comic_image">
                <div class="comic_details">
                    <p><?php echo $comic_details['name'] ?></p>
                    <p><?php echo $comic_details['price'] ?></p>
                </div>
                <form action="" method="POST">
                  <div class="comic_btn_link">
                    <div class="comic_btn cart_btn">
                        <i class="fa-solid fa-cart-shopping"></i>
                        <input type="submit" name="cart_add" value="add cart">
                    </div>
                    <div class="comic_btn fav_btn">
                        <i class="fa-solid fa-heart" ></i>
                        <input type="submit" name="add_fav" value="add fav">
                    </div>
                  </div>
                  <input type="hidden" name="name" value="<?php echo $comic_details['name'] ?>">
                  <input type="hidden" name="price" value="<?php echo $comic_details['price'] ?>">
                  <input type="hidden" name="image" value="<?php echo $comic_details['image']?>">
                  <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'] ?>">
                  <input type="hidden" name="comic_id" value="<?php echo $comic_details['comic_id'] ?>">
                </form>
            </div>

        <?php } ?>
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