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

    <!---------------Icon & Fonts-------------------------------------------->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
</head>
<body>
    <?php require_once "header.php"?>

    <div class="backToHome" style="background-image: url('assets/images/TopBanner/one.jpeg');">
        <p><a href="index.php" class="logo">oscafe</a></p>
        <p>A WORLD OF COMICS AWAITS.</p>
        <p style="text-align: center;">YOUR ONE-STOP DESTINATION FOR OVER 30,000 COMICS SPANNING <br> THE ENTIRE COMIC UNIVERSE.</p>
        
    </div>
    <div class="subscriptionDiv">
        <div class="subscriptionHead">
            <p>Choose Your Plan</p>
        </div>
        <div class="subscriptionPlan">
            <div class="silver">
                <section class="Sone">
                    <p>Silver</p>
                </section>
                <section class="Stwo">
                    <label for="">$10 <span>per month</span></label>
                </section>
                <section class="btnSec"> <p>Join Now</p> </section>
            </div>
            <div class="gold">
                <section class="Sone">
                    <p>Gold</p>
                </section>
                <section class="Stwo">
                    <label for="">$80 <span>per year</span></label>
                </section>
                <section class="btnSec"> <p>Join Now</p> </section>
            </div>
            <div class="diamond">
                <section class="Sone">
                    <p>Diamond</p>
                </section>
                <section class="Stwo kit">
                    <label for="">$120 <span>per month</span></label>
                    <p style="color: black;">with Exclsive limited Edition Menbership Kit</p>
                </section>
                <section class="btnSec"> <p>Join Now</p> </section>
            </div>
        </div>
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