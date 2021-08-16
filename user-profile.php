<?php 
include 'config.php';
?>





<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cont</title>
    <link rel="shorcut icon" type="image/x-icon" href="./src/img/koala.png">
	<link rel="stylesheet" href="./src/css/user-profile.css">
	<link rel="stylesheet" href="./src/css/main.css">
</head>
<body>

<!-- NAV -->
<nav class="nav">
        <div class="nav__container">
            <div class="nav__container-logo">
                <img src="src/img/koala.png" alt="logo" class="nav-logo">
                <div class="nav-text"> <a href="./home.php">Kooala</a> </div>
            </div>
            <div class="nav__container-links">
                <ul class="list">
                    <li class="list-item">
                        <a href="./hotel-page.php">Hotel</a>
                    </li>
                    <li class="list-item">
                        <a href="./restaurant-page.php">Restaurant</a>
                    </li>
                </ul>
            </div>
            <div class="nav__container-account">
                    <?php 
                        if($logged_in == 1){
                           echo "<a style=\"font-size: 15px;\">$contNume</a>";?>
                            <a href="?logout" class="login-btn">Deconectare</a>
							
                    <?php
                        }
                        else{
                    ?>
                        <a href="./home.php" class="login-btn">Acasa</a>
                    <?php 
                        }//end else
                    ?>
            </div>
        </div>

        <div class="nav__toggle">
        <div class="nav__toggle-lines">
            <span class="line line-1"></span>
            <span class="line line-2"></span>
        </div>
    </div>
    </nav>
<?php 
    $email = $_SESSION['email'];
?>
<div class="container">
  <div class="avatar-flip">
            
    <img src="<?php echo $contImagine;?>" alt="">
    <img src="<?php echo $contImagine;?>" alt="">
  </div>
  <form action="/action_page.php">
    <label for="img">Select image:</label>
    <input type="file" id="img" name="img" accept="image/*">
  <input type="submit">
</form>
  <h2><?php echo $contNume;?></h2>
  <h4><?php echo $email;?></h4>
  <div class="container-viewH">
   <?php
    echo "<h1>Hoteluri accesate recente:</h1>";
    
    $sql = "SELECT * FROM `hotel` WHERE id = '$lHotelViewed'";  // interogarea
	$result = mysqli_query($conn, $sql);  // executarea interogarii
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);  // extragerea datelor 
    $numeH = $row['nume_hotel'];
    echo "<p>$numeH</p>";


    $sql = "SELECT * FROM `hotel` WHERE id = '$lHotelViewed2'";  
	$result = mysqli_query($conn, $sql);  
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
    $numeH = $row['nume_hotel'];
    echo " <p>$numeH</p> ";


    $sql = "SELECT * FROM `hotel` WHERE id = '$lHotelViewed3'";  
	$result = mysqli_query($conn, $sql);  
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
    $numeH = $row['nume_hotel'];
    echo "  <p>$numeH</p>";
    
    echo "<br>"; echo "<h1>Restaurante accesate recente:</h1>";

    $sql = "SELECT * FROM `restaurant` WHERE id = '$lRestaurantViewed'";  
	$result = mysqli_query($conn, $sql);  
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
    $numeR = $row['nume_restaurant'];
    echo "  <p>$numeR</p> ";

    $sql = "SELECT * FROM `restaurant` WHERE id = '$lRestaurantViewed2'";  
	$result = mysqli_query($conn, $sql);  
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
    $numeR = $row['nume_restaurant'];
    echo "  <p>$numeR</p> ";


    $sql = "SELECT * FROM `restaurant` WHERE id = '$lRestaurantViewed3'";  
	$result = mysqli_query($conn, $sql);  
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
    $numeR = $row['nume_restaurant'];
    echo "  <p>$numeR</p>";


   ?>
  
</div>
</body>
</html>

