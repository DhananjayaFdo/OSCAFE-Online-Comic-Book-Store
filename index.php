<?php 

@include "db_reference.php"; 
  
session_start();

$userID = $_SESSION['user_id'];

  if(!isset($userID)){
    header('location: login.php');
  }

?>

<?php include "cart_add_reference.php" ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OSCAFE</title>

    <!---------------styles Css---------------------------------------------->

    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/comic_display_container.css">

    <!---------------Icon & Fonts-------------------------------------------->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
    

</head>
<body>
  <?php require_once "header.php"; ?>
     
  <section class="show_banner" style="background-image: url('assets/images/TopBanner/two.jpg');">
    <div class="show_banner_div">
      <h1>OSCAFE</h1>
      <p>World Largest Comic Book Collection</p>
    </div>
  </section>

  <section class="social_Media">
    <a href=""><i class="fa-brands fa-facebook"></i></a>
    <a href=""><i class="fa-brands fa-instagram"></i></a>
    <a href=""><i class="fa-brands fa-discord"></i></a>
    <a href=""><i class="fa-brands fa-twitter"></i></a>
    <a href=""><i class="fa-brands fa-linkedin-in"></i></a>
    <a href=""><i class="fa-brands fa-pinterest-p"></i></a>
    <a href=""><i class="fa-brands fa-tiktok"></i></a>
  </section>

  <section class="sectionTwo" style="background-image: url('assets/images/Middle Banner/marvelCover.jpg')">
        <div>
            <p>The <span>Marvel Cinematic Universe </span> is <br> an American media franchise and shared <br> universe
                centered on a series of <br> superhero films produced by Marvel Studios. <br> The films are based on
                characters that <br> appear in American comic books published by Marvel Comics.</p>
            <a href="comicBook.php"><button class="DiscoverMoreBTN">Discover More</button></a>
        </div>
  </section>

  <section class="comic_display_container">
        <?php 
            $comic_import = "SELECT * FROM `comic` WHERE `franchise` = 'marvel' LIMIT 5;";
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

    <section class="sectionFive" style="background-image: url('assets/images/Middle Banner/DCCover.jpg')">
        <div>
            <p>The <span>DC Extended Universe </span> is <br> an American media franchise and shared universe centered
                on a series of <br> superhero films and television series <br> produced by DC Studios and distributed by
                Warner Bros. Pictures. <br> It is based on characters that appear in <br> American comic books published
                by DC Comics.</p>
                <a href="comicBook.php"><button class="DiscoverMoreBTN">Discover More</button></a>
        </div>
    </section>

    <section class="comic_display_container">
        <?php 
            $comic_import = "SELECT * FROM `comic` WHERE `franchise` = 'dceu' LIMIT 5;";
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

    <?php include_once "footer.php"; ?>
  
    <script type="text/javascript">

        $(".menu-toggle-btn").click(function(){
          $(this).toggleClass("fa-times");
          $(".navigation-menu").toggleClass("active");
        });
      </script>
</body>
</html>