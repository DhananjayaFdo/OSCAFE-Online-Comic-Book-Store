<?php include_once "db_reference.php" ?>

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
    <link rel="stylesheet" href="styles/character.css">
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
    $sql1 = "SELECT * FROM oscafe.heros;";

    $result = mysqli_query($connect, $sql1);

    while($row = mysqli_fetch_assoc($result)){

    ?>

    
    <div class="comic_display">
      <img src="images/Characters/<?php echo $row['image'] ?>" alt="comic_image">
      <div class="comic_details">
          <p><?php echo $row['name'] ?></p>
      </div>
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