<?php 
include 'config.php';
if(isset($_GET["id"]))
    $prod_id = $_GET["id"];
else $prod_id = 0;//Aici trebuie o eroare
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Despre </title>
    <link rel="shorcut icon" type="image/x-icon" href="./src/img/koala.png">
    <link rel="stylesheet" href="src/css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400;700&display=swap" rel="stylesheet">
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.js' defer></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.2.0/mapbox-gl.css' rel='stylesheet' />
    <script src="./src/js/mapbox.js" defer></script>
    <link rel="stylesheet" href="./src/css/despre.css">
</head>
<body>
    <!-- NAV -->         
    <nav class="nav">
        <div class="nav__container">
            <div class="nav__container-logo">
                <img src="./src/img/koala.png" alt="logo" class="nav-logo">
                <div class="nav-text"><a href="./home.php">Kooala</a></div>
            </div>
            <div class="nav__container-links">
                <ul class="list">
                
                    <li class="list-item">
                        <a href="./hotel-page.php">Hotel</a>
                    </li>
                    <li class="list-item active">
                        <a href="./despre.php">Despre</a>
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
                        <a href="./login.php" class="login-btn">Logare</a>
                    <?php 
                        }//end else
                    ?>
                
            </div>
        </div>

        <div class="about-section">
            <div class="inner-container">
                <h1>Despre Kooala</h1>
                <p class="text">
                    Kooala este un site predestinat tuturor oamenilor, in special celor care nu cunosc prea bine capitala Romaniei. <br> Utilizatorii isi pot alege restaurantul sau hotelul dorit dupa criteriile dorite de acestia. <br> Identificarea acestora se poate face usor prin Mapa implementata direct in site.
                </p>
                <div class="skills">
                    <span>Hotel</span>
                    <span>Restaurant</span>
                    <span>Catering</span>
                </div>
            </div>
        </div>


         <!-- FOOTER -->
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
                        <a href="/despre.php">Despre</a>
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