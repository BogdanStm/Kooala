<?php 
include 'config.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
   
    <script defer src="/your-path-to-fontawesome/js/brands.js"></script>
    <script defer src="/your-path-to-fontawesome/js/solid.js"></script>
    <script defer src="/your-path-to-fontawesome/js/fontawesome.js"></script>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./src/css/main.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/css/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <title>Kooala</title>
    <link rel="shorcut icon" type="image/x-icon" href="./src/img/koala.png">
</head>
<body> 
    <div class="nav">
        <div class="nav__container">
            <div class="nav__container-leftList">
                <ul class="leftList">
                    <li class="leftList-item">
                       <a href="./restaurant-page.php">Restaurante</a> 
                    </li>
                    <li class="leftList-item">
                       <a href="./hotel-page.php">Hoteluri</a> 
                    </li>
                </ul>
            </div>
            <div class="nav__container-rightList">
                <ul class="rightList">
                    <?php 
                        if($logged_in == 1){
                            
                            echo $contNume;?>
                            <li class="rightList-item signUp" >
                                <a href="?logout">Deconectare</a>
                            </li>
                            <li class="rightList-item signUp" >
                                <a href="./user-profile.php" >Contul Meu</a>
                            </li>
                    <?php
                        }
                        else{
                    ?>
                    <li class="rightList-item logIn" >
                       <a href="login.php">Logare</a> 
                    </li>
                    <li class="rightList-item signUp" >
                       <a href="login.php">Inregistrare</a> 
                    </li>
                    <?php 
                        }//end else
                    ?>
                </ul>
            </div>
        </div>

        <div class="nav__homepage">
            <div class="nav__homepage-logo">
                <img class="logo" src="./src/img/koala.png" alt="logo">
            </div>
        </div>
        <form action="">
            <div class="nav__searchBar">
                <label for="search">Cauta</label>
                <input class="nav__searchBar-input" type="text" placeholder="Burger Pizza Sushi Hotel" name="search">
                <label for="search">Locatie</label>
                <input class="nav__searchBar-input" type="text" placeholder="Sector 1, 2, 3" name="search">
                <button type="submit"><i class="fas fa-search"></i></button>
            </div>
        </form>
        <div class="nav__links">
            <div class="nav__links-container">
                <li class="link-restaurant link">
                    <i class="fas fa-utensils"></i> 
                    <span><a href="./restaurant-page.php">Restaurante</a></span>
                </li>
                <li class="link-hotel link">
                    <i class="fas fa-hotel"></i>
                    <span> <a href="./hotel-page.php">Hotel</a> </span>
                </li>
            </div>
        </div>        
    </div>
    
    <div class="sectionHotels">
        <div class="sectionHotels__container">
            <div class="sectionHotels__container-left">
                <div class="sectionHotels-title">
                    Top hoteluri<br/> din Bucuresti
                </div>
                <div class="sectionHotels-desc">
                    Servicii hoteliere - Marile lanturi hoteliere se lupta pentru pastrarea clientilor. In contextul economic dificil cu care se confrunta in ultimul timp industria turistica, marile grupuri hoteliere se dovedesc mai interesate sa-si pastreze actualii clienti decat sa atraga noi oaspeti. Similitudinile dintre diversele programele de fidelizare a clientilor scot la lumina concurenta acerba din industria hoteliera.Servicii hoteliere<br/> 
                </div>
                <a href="./hotel-page.php" class="sectionHotels-button">
                    Click Aici
                </a>
            </div>

            <?php 
                $sql = "SELECT * FROM `hotel`ORDER BY stele DESC LIMIT 3";
                $result = $conn->query($sql);
                if (!$result) {
                    trigger_error('Invalid query: ' . $conn->error);
                }
                $pas = 0;
                if ($result->num_rows > 0) {
                    
                    while($row = $result->fetch_assoc()) { // se parcurg randurile
                    $numeHotel = $row['nume_hotel'];
                    $imagine = $row['imagine'];
                    $stele = $row['stele'];

                    if($pas == 0)
                        echo "<div class=\"sectionHotels__container-middle\">";
                    else if($pas == 1)
                        echo "<div class=\"sectionHotels__container-right\">";
                    $pas++;//Folosesc aceasta variabila pentru a creea o exceptie 
                    //
                ?>
                    
                        <div class="right__box">
                            <div class="right__box-image">
                                <img src="<?php echo $imagine;?>" alt="hotel">
                            </div>
                            <div class="right__box-container">
                                <div class="right__box-title">
                                    <?php echo $numeHotel;?>
                                </div>
                                <div class="right__box-stars">
                                    <?php 
                                        if($stele > 5)$stele = 5;
                                        for($i = 0; $i < $stele;$i++){
                                            echo "<i class=\"fas fa-star\"></i>";
                                        }
                                    ?>
                                    
                                </div>
                                <div class="right__box-hearth">
                                    <i class="fas fa-heart"></i> 8.50
                                </div>
                            </div>
                        </div>
                    
                <?php
                        //verific cand indepinec conditia pentru exceptie
                        if($pas == 1 || $pas == 3)echo "</div>";
                    }//end while
                }//end if
            ?>
        </div>
    </div>

    <div class="sectionRestaurants"></div>
        <div class="sectionRestaurants__container">
            <div class="sectionRestaurants__containerTop">
                <div class="sectionRestaurants-title">
                    Top restaurante <br> din Bucuresti
                </div>
                <div class="sectionRestaurants-desc">
                    Un restaurant este un stabiliment, local public unde se pot consuma pe loc mâncăruri și băuturi, contra cost.<br> De obicei mâncărurile sunt preparate în bucătăria proprie, de către o echipă specializată (bucătar, ajutor de bucătar), în coordonarea și supravegherea unui șef-bucătar. <br> Termenul „restaurant“ a fost creat în secolul al 18-lea în Franța.
                </div>
            </div>
         <div class="sectionRestaurants__container-bot">
             <?php 
                $sql = "SELECT * FROM `restaurant` ORDER BY stele DESC LIMIT 7";
                $result = $conn->query($sql);
                if (!$result) {
                    trigger_error('Invalid query: ' . $conn->error);
                }
                $pas = 0;
                if ($result->num_rows > 0) {

                    while($row = $result->fetch_assoc()) {
                    $imagine = $row['imagine'];
                    $numeRestaurant = $row['nume_restaurant'];
                    $stele = $row['stele'];
                ?>
                <div class="sectionRestaurants__containerBot">
                <div class="bot__box">
                    <div class="bot__box-image" >
                        <img src="<?php echo $imagine?>" alt="" height="50"  height="500" >
                    </div>
                    <div class="bot__box-title">
                        <?php echo $numeRestaurant?>
                    </div>
                    <div class="bot__box-stars">
                        <?php 
                            if($stele > 5)$stele = 5;
                            for($i = 0; $i < $stele;$i++){
                                echo "<i class=\"fas fa-star\"></i>";
                            }
                            for($i = 0; $i < 5-$stele;$i++){
                                echo "<i class=\"far fa-star\"></i>";
                            }
                        ?>
                    </div>
                    <div class="bot__box-hearth">
                        <i class="fas fa-heart"></i> 9.00
                    </div>
                </div>
            </div>
                <?php
                    }//end while
                }//end if
                ?>
        </div>
    </div>
    <footer class="footer">
        <div class="footer__top">
            <div class="footer__top-column">
                <div class="footer-logo">
                    <img src="./src/img/koala.png" alt="kooala" class="logo">
                </div>
            </div>
            <div class="footer__top-column">
                <ul class="list">
                    <li class="link">
                        <a href="./home.html">Acasă</a>
                    </li>
                    <li class="link">
                        <a href="">Hotel</a>
                    </li>
                    <li class="link">
                        <a href="">Restaurant</a>
                    </li>
                </ul>
            </div>
            <div class="footer__top-column">
                <ul class="list">
                    <li class="link">
                        <a href="">Consumatori</a>
                    </li>
                    <li class="link">
                        <a href="./despre.php">Despre</a>
                    </li>
                    <li class="link">
                        <a href="">Securitate</a>
                    </li>
                </ul>
            </div>
            <div class="footer__top-column">
                <ul class="list">
                    <li class="link">
                        <a href="./rgpd.php">Politică de confidențialitate</a>
                    </li>
                    <li class="link">
                        <a href="">Termeni de utilizare</a>
                    </li>
                    <li class="link">
                        <a href="">Politica Cookie</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="footer__bottom">
            <div class="footer__bottom-container">
                <div class="footer__bottom-column">
                    © Kooala
                </div>
                <div class="footer__bottom-column">
                    <div class="email">
                        <a href="mailto:contact@kooala.com">contact@kooala.com</a>
                    </div>
                    <div class="media">
                        <i class="fab fa-facebook"></i>
                        <i class="fab fa-instagram"></i>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>

<!--
    COLORS:
    blue-purple: #3D59D6;
    black-gray: #434554; 
    white-gray-color: #FCFCFD;
    red-color: #ED4452;
    pink-color: #FCECEE;
    baby-blue: #DFEFFD;
    baby-blue-second: #F3F8FD;
-->
