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
    <title>Pagina Restaurant</title>
    <link rel="shorcut icon" type="image/x-icon" href="./src/img/koala.png">
    <link rel="shorcut icon" type="image/x-icon" href="./src/img/koala.png">
    <link rel="stylesheet" href="./src/css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400;700&display=swap" rel="stylesheet">
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.css' rel='stylesheet' />
    <link
    href="https://fonts.googleapis.com/css?family=Open+Sans"
    rel="stylesheet"
    />
    <script src="https://api.tiles.mapbox.com/mapbox-gl-js/v2.3.0/mapbox-gl.js"></script>
    <link
    href="https://api.tiles.mapbox.com/mapbox-gl-js/v2.3.0/mapbox-gl.css"
    rel="stylesheet"
    />
</head>
<body>
    <!-- NAV -->
    <nav class="nav">
        <div class="nav__container">
            <div class="nav__container-logo">
                <img src="src/img/koala.png" alt="logo" class="nav-logo">
                <div class="nav-text"><a href="./home.php">Kooala</a></div>
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
                            if($lRestaurantViewed != $prod_id && $lRestaurantViewed != $prod_id && $lRestaurantViewed != $prod_id){   // memorearea ultimilor restaurante accesate
                                $lRestaurantViewed3 = $lRestaurantViewed2;
                                $lRestaurantViewed2 = $lRestaurantViewed;
                                $lRestaurantViewed = $prod_id;
                                $data = "UPDATE clienti SET lRestaurantViewed = '$lRestaurantViewed',lRestaurantViewed2 = '$lRestaurantViewed2',lRestaurantViewed3 = '$lRestaurantViewed3'  WHERE id = '$contId';";
                                if (mysqli_query($conn, $data)) {  // actualizează adresa clienti 
                                    //echo "Record updated successfully";
                                } else {
                                    //echo "Error updating record: " . mysqli_error($conn);
                                }
                            }
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

        <div class="nav__toggle">
        <div class="nav__toggle-lines">
            <span class="line line-1"></span>
            <span class="line line-2"></span>
        </div>
    </div>
    </nav>
    <!-- Product info -->
    <div class="product">
        <div class="product__container">
            <?php 
                $sql = "select * from restaurant where id = $prod_id;";  
                $result = mysqli_query($conn, $sql);  
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
                $count = mysqli_num_rows($result);  
                $ID = $row['id'];
                $nume = $row['nume_restaurant'];
                $cat_id = $row['categorie_id'];
                $adresa = $row['adresa_restaurant'];
                $imagine = $row['imagine'];
                $descriere = $row['descriere'];
                $rating = $row['rating'];
                $pizza = $row['pizza'];
                $burger = $row['burger'];
                $desert = $row['desert'];
                $sushi = $row['sushi'];
                $delivery = $row['delivery'];
                $galerieID = $row['galerieID'];



                $sqlGalerie = "select * from galerierestaurant where id = $galerieID;";  
                $resultGalerie = mysqli_query($conn, $sqlGalerie);  
                $row = mysqli_fetch_array($resultGalerie, MYSQLI_ASSOC);
                $img1 = $row['img'];
                $img2 = $row['img2'];
                $img3 = $row['img3'];  
            ?>
            <div class="product__container-img">
                <img src="<?php echo $img1;?>" alt="<?php echo "Adresa:$img1";?>" class="product-img">
                
                <div class="img__gallery">
                    <img src="<?php echo $img2;?>" alt="hotel" class="product-img">
                    <img src="<?php echo $img3;?>" alt="hotel" class="product-img">
                </div>
            </div>
            <div class="product__container-data data">
                <div class="data__about">
                    <div class="data__about-review">
                        <div class="review-hotel">Restaurant</div>
                        <div class="review-stars review">
                            <?php 
                                for($i = 0; $i < $rating;$i++){
                                    echo "<i class=\"fas fa-star\"></i>";
                                }
                            ?>
                        </div>
                    </div>
                    <div class="data__about-name"><?php echo $nume;?></div>
                    <div class="data__about-address"><?php echo $adresa;?></div>
                </div>
                <div class="data__info">
                    <div class="data__info-desc">
                        <div class="desc-name">Descriere</div>
                        <div class="desc-content"><?php echo $descriere;?></div>
                    </div>
                </div>
                <div class="data__features">
                    <div class="data__features-name">
                        Filtre culinare
                    </div>
                    <div class="features">
                        <?php if($pizza == 1) {?>
                        <div class="features-icons">
                            <div class="icon"><i class="fas fa-pizza-slice"></i></div>
                            <div class="icon-name">Pizza</div>
                        </div>
                        <?php }//end if -pizza

                        if($burger == 1){
                        ?>
                        <div class="features-icons">
                            <div class="icon"><i class="fas fa-hamburger"></i></div>
                            <div class="icon-name">Burger</div>
                        </div>
                        <?php }//end if burger

                         if($sushi == 1){
                            ?>
                            <div class="features-icons">
                                <div class="icon"><i class="fas fa-bacon"></i></div>
                                <div class="icon-name">Sushi</div>
                            </div>
                            <?php }//end if sushi

                        if($desert == 1){
                        ?>
                        <div class="features-icons">
                            <div class="icon"><i class="fas fa-ice-cream"></i></div>
                            <div class="icon-name">Desert</div>
                        </div>
                        <?php }//end if desert

                        if($delivery == 1){
                        ?>
                        <div class="features-icons">
                            <div class="icon"><i class="fas fa-car"></i></div>
                            <div class="icon-name">Livrare la domiciliu</div>
                        </div>
                        <?php } //end if delivey ?>
                        
                    
                    </div>
                    </div>
                <div class="data__map" id="map">
                </div>
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
                        <a href="">Despre</a>
                    </li>
                    <li class="link">
                        <a href="">Securitate</a>
                    </li>
                </ul>
            </div>
            <div class="footer__top-column">
                <ul class="list">
                    <li class="link">
                        <a href="">Politică de confidențialitate</a>
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

  <style>
     body {
margin: 0;
padding: 0;
}
#map {
top: 0;
bottom: 0;
width: 100%;
}
.marker {
background-image: url('./src/img/mapbox-icon.png');
background-size: cover;
width: 50px;
height: 50px;
border-radius: 50%;
cursor: pointer;
}
.mapboxgl-popup {
max-width: 200px;
}
.mapboxgl-popup-content {
text-align: center;
font-family: 'Open Sans', sans-serif;
}
  </style>

  <script>
 mapboxgl.accessToken = 'pk.eyJ1IjoicmF6dmFucGV0cnUiLCJhIjoiY2tvZHd4aGs2MDZtMTJ1cXBveTA1ODVmcyJ9.rC_jUT8sjS7znLjRB4d7Cw';
 
 var geojson = {
 'type': 'FeatureCollection',
 'features': [
    {
 'type': 'Feature',
 'geometry': {
 'type': 'Point',
 'coordinates': [26.102649, 44.4394199]
 },
 'properties': {
 'title': 'Restaurant',
 'description': 'Restaurant'
}
}

 
]
};

var map = new mapboxgl.Map({
container: 'map',
style: 'mapbox://styles/mapbox/light-v10',
center: [26.100666290339458, 44.43314299845954],
zoom: 10,

});

// add markers to map
geojson.features.forEach(function (marker) {
// create a HTML element for each feature
var el = document.createElement('div');
el.className = 'marker';

// make a marker for each feature and add it to the map
new mapboxgl.Marker(el)
.setLngLat(marker.geometry.coordinates)
.setPopup(
new mapboxgl.Popup({ offset: 25 }) // add popups
.setHTML(
'<h3>' +
marker.properties.title +
'</h3><p>' +
marker.properties.description +
'</p>'
)
)
.addTo(map);
});
  </script>
</body>
</html>