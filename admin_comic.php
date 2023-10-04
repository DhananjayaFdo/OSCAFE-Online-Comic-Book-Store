<?php include_once "db_reference.php"; ?>

<?php 
session_start();

$userID = $_SESSION['admin_id'];

  if(!isset($userID)){
    header('location: login.php');
  }

?>

<?php 
    if(isset($_POST['remove_item'])){
        $delete = $_POST['id'];
        $remove = "DELETE FROM comic WHERE comic_id = '$delete';";

        $result2 = mysqli_query($connect, $remove);
        header('location: '.$_SERVER['PHP_SELF']);
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
    <link rel="stylesheet" href="styles/comic_display_container.css">

    <!---------------Icon & Fonts-------------------------------------------->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
</head>
<body>
    <?php require_once "admin_header.php" ?>
    <div class="form_container">
        <form action="admin_comic.php" method="post" class="form"  enctype="multipart/form-data">
            <h1>ADD PRODUCT</h1>
            <input type="text" name="name" placeholder="Enter Comic Name" class="input" required>
            <input type="text" name="price" placeholder="Enter Comic Price" class="input" required>
            <div class="select_div">
                <label for="franchise">Select Franchise</label>
                <select name="franchise_select" id="franchise" required>
                    <option value="marvel">marvel</option>
                    <option value="dceu">dceu</option>
                    <option value="other">other</option>
                </select>
            </div>
            <input type="file" name="images" class="file" required>
            <input type="submit" name="submit" value="Add Product" class="submit">
        </form>

        <?php  
            if(isset($_POST['submit']) && $_FILES['images']){

                //Comic Name A price Data
                $comicName = $_POST['name'];
                $comucPrice = $_POST['price'];
                $comicFranchise = $_POST['franchise_select'];

                //Comic Image File Data
                $imageName = $_FILES['images']['name'];
                $tempName = $_FILES['images']['tmp_name'];
                $fileLocation = "images/". $imageName;

                //uplead user upload image top server
                move_uploaded_file($tempName,$fileLocation);

                $sql = "INSERT INTO comic (name, price, franchise, image) VALUES('$comicName','$comucPrice','$comicFranchise','$imageName');";

                $severConnect =  mysqli_query($connect, $sql);
                header('location: '.$_SERVER['PHP_SELF']);
            }           
        ?>

    </div>

    <section class="comic_display_container">

        <?php 
        $sql1 = "SELECT * FROM oscafe.comic;";

        $result = mysqli_query($connect, $sql1);

        while($row = mysqli_fetch_assoc($result)){ ?>

            <div class="comic_display">
                <img src="images/<?php echo $row['image'] ?>" alt="comic_image">
                <div class="comic_details">
                    <p><?php echo $row['name'] ?></p>
                    <p><?php echo $row['price'] ?></p>
                </div>
                <form action="" method="POST">
                  <div class="comic_btn_link">
                    <div class="comic_btn cart_btn">
                        <input type="submit" name="remove_item" value="remove">
                    </div>
                    <div class="comic_btn fav_btn">
                        <input type="submit" name="change_details" value="edit">
                    </div>
                  </div>
                    <input type="hidden" name="id" value="<?php echo $row['comic_id'] ?>">
                    <input type="hidden" name="name" value="<?php echo $row['name'] ?>">
                    <input type="hidden" name="price" value="<?php echo $row['price'] ?>">
                    <input type="hidden" name="image" value="<?php echo $row['image']?>">
                </form>
            </div>

        
        <?php } ?>
    </section>  

    <script type="text/javascript">

        $(".menu-toggle-btn").click(function(){
          $(this).toggleClass("fa-times");
          $(".navigation-menu").toggleClass("active");
        });
      </script>
</body>
</html>