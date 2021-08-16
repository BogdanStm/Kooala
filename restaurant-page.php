<?php
include 'config.php';
// initializeaze varolire pentru fiecare filtru in parte
$nrFiltre = 0;
if(isset($_GET["sector"])){  
    
    $sector = $_GET["sector"];
    if($sector > 0)$nrFiltre++;
}
else $sector = 0;

if(isset($_GET["rating"])){
    $rating = $_GET["rating"];
    if($rating > 0)$nrFiltre++;
}
else $rating = 0;

if(isset($_GET["pizza"])){
    $pizza = $_GET["pizza"];
    if($pizza > 0)$nrFiltre++;
}
else $pizza = 0;

if(isset($_GET["burger"])){
    $burger = $_GET["burger"];
    if($burger > 0)$nrFiltre++;
}
else $burger = 0;

if(isset($_GET["sushi"])){
    $sushi = $_GET["sushi"];
    if($sushi > 0)$nrFiltre++;
}
else $sushi = 0;

if(isset($_GET["desert"])){
    $desert = $_GET["desert"];
    if($desert > 0)$nrFiltre++;
}
else $desert = 0;

if(isset($_GET["delivery"])){
    $delivery = $_GET["delivery"];
    if($delivery > 0)$nrFiltre++;
}
else $delivery = 0;

//echo "Am $nrFiltre filtre active";




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant</title>
    <link rel="shorcut icon" type="image/x-icon" href="./src/img/koala.png">
    <link rel="stylesheet" href="src/css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400;700&display=swap" rel="stylesheet">
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.js' defer></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.2.0/mapbox-gl.css' rel='stylesheet' />
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
                <img src="./src/img/koala.png" alt="logo" class="nav-logo">
                <div class="nav-text"><a href="./home.php">Kooala</a></div>
            </div>
            <div class="nav__container-links">
                <ul class="list">
                
                    <li class="list-item">
                        <a href="./hotel-page.php">Hotel</a>
                    </li>
                    <li class="list-item active">
                        <a href="./restaurant-page.php">Restaurant</a>
                    </li>
                   
                </ul>
            </div>
            <div class="nav__container-account">
                     <?php 
						//Verific daca $logged_in este  = 1 atunci înseamna ca utilizatorul este conectat
                        if($logged_in == 1){
							//Afisez numele lui si un buton pentru deconectare
                           echo "<a style=\"font-size: 15px;\">$contNume</a>";?>
                            <a href="?logout" class="login-btn">Deconectare</a>
                    <?php
                        }
                        else{//Alfel ii pun la dispozitie un link pentru conectare
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
    <!-- SECTION -->
    <section class="section">
        <div class="section__container">
            <!-- FILTERS -->
            <div class="section__container-filters">
                <div class="filters__container filter">
                    <form id="filterForm"action="restaurant-page.php" method="GET">
                        <select id="sector" name="sector" form="filterForm" class="filter-button">
                            <option value="0">Sector</option>
                            <!-- Aici folosesc acest if pentru a seta valoarea corecta a unui filtru -->
                            <option value="1" <?php if($sector == 1)echo "selected=\"selected\"";?>>1</option>
                            <option value="2" <?php if($sector == 2)echo "selected=\"selected\"";?>>2</option>
                            <option value="3" <?php if($sector == 3)echo "selected=\"selected\"";?>>3</option>
                            <option value="4" <?php if($sector == 4)echo "selected=\"selected\"";?>>4</option>
                            <option value="5" <?php if($sector == 5)echo "selected=\"selected\"";?>>5</option>
                            <option value="6" <?php if($sector == 6)echo "selected=\"selected\"";?>>6</option>
                        </select>
                        <select id="rating" name="rating" form="filterForm" class="filter-button">
                            <option value="0">Recenzii</option>
                            <option value="1" <?php if($rating == 1)echo "selected=\"selected\"";?>>1</option>
                            <option value="2" <?php if($rating == 2)echo "selected=\"selected\"";?>>2</option>
                            <option value="3" <?php if($rating == 3)echo "selected=\"selected\"";?>>3</option>
                            <option value="4" <?php if($rating == 4)echo "selected=\"selected\"";?>>4</option>
                            <option value="5" <?php if($rating == 5)echo "selected=\"selected\"";?>>5</option>
                        </select>
                        <input type="checkbox" id="pizza" name="pizza" value="1" <?php if($pizza == 1)echo "checked";?>>
                        <label class="container" for="pizza" style="font-size: 15px;"><i class="fas fa-pizza-slice"></i>Pizza</label>
                        <input type="checkbox" id="burger" name="burger" value="1" <?php if($burger == 1)echo "checked";?>>
                        <label for="burger" style="font-size: 15px;"><i class="fas fa-hamburger"></i>Burger</label>
                        <input type="checkbox" id="sushi" name="sushi" value="1" <?php if($sushi == 1)echo "checked";?>>
                        <label for="sushi" style="font-size: 15px;"><i class="fas fa-bacon"></i>Sushi</label>
                        <input type="checkbox" id="desert" name="desert" value="1" <?php if($desert == 1)echo "checked";?>>
                        <label for="desert" style="font-size: 15px;"><i class="fas fa-ice-cream"></i>Desert</label>
                        <input type="checkbox" id="delivery" name="delivery" value="1" <?php if($delivery == 1)echo "checked";?>>
                        <label for="delivery" style="font-size: 15px;"><i class="fas fa-car"></i>Delivery</label>
                        <button class="button" type="submit"><i class="fas fa-search"></i></button>
                    </form>
                </div>
            </div>
            <!-- FILTERS END -->
            <div class="section__container-hero hero">
                    <?php 
					//Aici incep ca pregatesc textul pentru interogarea SQL
                        $text1 = "SELECT * FROM restaurant "; // selectarea tuturor restaurantelor 
                        if($nrFiltre > 0){  // tinerea evidentei a filtrelor active
                            $text1 = $text1 . " WHERE ";  // daca exita un fltru activ se adauga cuvantul cheie WHERE
                            $filtreAplicate = 0;  // retine numarul de filtre in constructia interogarii
                            if($sector > 0){  // se adauga filtru pentru sector doar daca se bifeaza casuta
                                if($filtreAplicate > 0)$text1 = $text1 . " AND ";  //daca s-a aplicat un filtru atunci adauga cuvandul cheie AND
                                $text1 = $text1 . " sector = " . $sector;  // se adauga cuvantul cheie sector si valuarea acestuia
                                $filtreAplicate++; // marchez ca am aplicat un filtru 
                            }
                            if($rating > 0){
                                if($filtreAplicate > 0)$text1 = $text1 . " AND ";
                                $text1 = $text1 . " rating = " . $rating;
                                $filtreAplicate++;
                            }

                            if($pizza > 0){
                                if($filtreAplicate > 0)$text1 = $text1 . " AND ";
                                $text1 = $text1 . " pizza = " . $pizza;
                                $filtreAplicate++;
                            }

                            if($burger > 0){
                                if($filtreAplicate > 0)$text1 = $text1 . " AND ";
                                $text1 = $text1 . " burger = " . $burger;
                                $filtreAplicate++;
                            }

                            if($sushi > 0){
                                if($filtreAplicate > 0)$text1 = $text1 . " AND ";
                                $text1 = $text1 . " sushi = " . $sushi;
                                $filtreAplicate++;
                            }

                            if($desert > 0){
                                if($filtreAplicate > 0)$text1 = $text1 . " AND ";
                                $text1 = $text1 . " desert = " . $desert;
                                $filtreAplicate++;
                            }

                            if($delivery > 0){
                                if($filtreAplicate > 0)$text1 = $text1 . " AND ";
                                $text1 = $text1 . " delivery = " . $delivery;
                                $filtreAplicate++;
                            }
                        }
                        //echo "!REZULTATE: $text1";
                        $sql = $text1;//Salvez textul final in $sql pentru a rula interogarea
                        $result = $conn->query($sql);//Obtin rezultatul interogarii
						$total = mysqli_num_rows($result);//In $total salvez numarul de rezultate din $result  



						//______________|Pagini Start|
						
						$limit = 4;//Numarul de hotelul pe o pagina
						$pages = ceil($total / $limit);//Calculez cate pagini am nevoie
						$page = min($pages, filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT, array(  
							'options' => array(
								'default'   => 1,
								'min_range' => 1,
							),
						)));//Aici determin la ce pagina trebuie sa fiu
						$offset = ($page - 1)  * $limit;//Calculez cate rezultate trebuie sa omit, in functie de pagina curenta
                        if($offset < 0)$offset = 0;
						$text1 = $text1 . "  ORDER BY id LIMIT $limit OFFSET $offset";//Aici adaug la interogarea de mai sus si ce rezultate vreau sa omita(pentru pagina)
						$sql = $text1;//Actualizez $sql  
						$result = mysqli_query($conn, $sql);//Rule interogarea noua
						

						// se caculeaza prima pagina de start si ultima
						$start = $offset + 1;  //
						$end = min(($offset + $limit), $total);

						
						$textFiltre = "";  //pregateste link-ul ca sa retina curect filtrele active
						if($nrFiltre > 0){
							if($sector > 0){
								$textFiltre = $textFiltre . "&sector=" . $sector;
							}
							if($rating > 0){
								$textFiltre = $textFiltre . "&rating=" . $rating;
							}
							if($pizza > 0){
								$textFiltre = $textFiltre . "&pizza=" . $pizza;
							}
							if($burger > 0){
								$textFiltre = $textFiltre . "&burger=" . $burger;
							}
							if($sushi > 0){
								$textFiltre = $textFiltre . "&sushi=" . $sushi;
							}
							if($desert > 0){
								$textFiltre = $textFiltre . "&desert=" . $desert;
							}
                            if($delivery > 0){
                                $textFiltre = $textFiltre . "&delivery=" . $delivery;
                            }
						}
						if($page > 1){
							$prevlink1	= '<a href="?page=1'. $textFiltre .'" title="Prima pagina">&laquo;</a>';
							
							$prevlink2	= '<a href="?page=' . ($page - 1) . $textFiltre .'" title="Pagina anterioara">&laquo;</a>';
							
							$prevlink = $prevlink1 . $prevlink2;
						}
						else {
							$prevlink = '<span class="disabled">&laquo;</span> <span class="disabled">&laquo;</span>';
						}



						if($page < $pages){
							$nextlink1 = ' <a href="?page=' . ($page + 1) . $textFiltre . '" title="Pagina urmatoare" "> &raquo; </a> ';
							$nextlink2 = '<a href="?page=' . $pages . $textFiltre . '" title="Ultima pagina">  &raquo; </a>';
							$nextlink = $nextlink1 . $nextlink2;
						}
						else {
							$nextlink = '<span class="disabled">&rsaquo;</span> <span class="disabled"> &raquo; </span>';
						}

						// textul afisat
						echo '<div id="paging"><h1 style="font-size:1.8rem;">', $prevlink, ' Pagina ', $page, ' din ', $pages, ' , ' , $start, '-', $end, ' din ', $total, ' rezultate ', $nextlink, ' </h1></div>';
						
                        if (!$result) {//verific daca am primit eroare de la interogare
                            trigger_error('Invalid query: ' . $conn->error);
                        }
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                $restaurantID = $row['id'];
                                $numeRestraurant = $row['nume_restaurant'];
                                $cat_id = $row['categorie_id'];
                                $adresaRestaurant = $row['adresa_restaurant'];
                                $catering = $row['catering'];
                                $descriere = $row['descriere'];
                                $sector = $row['sector'];
                                $rating = $row['rating'];
                                $pizza = $row['pizza'];
                                $imagine = $row['imagine'];
                            ?>
                            <div class="hero__container hero">
                                <div class="hero-img">
                                    <img src="<?php echo $imagine;?>" alt="restaurant" class="box-img">
                                </div>
                                <div class="hero__box">
                                    <div class="hero__box-content content">
                                        <div class="content-column">
                                            <div class="box-name"><?php echo $numeRestraurant;?> </div>
                                            <div class="box-info"><?php echo $adresaRestaurant;?> </div>
                                        </div>
                                    </div>
                                    <div class="content-column">
                                        <div class="box-price"></div>
                                        <div class="box-info"></div>
                                    </div>
                                    <div class="hero__box-info info">
                                        <div class="info-column">
                                            <div class="box-info"></div>
                                        </div>
                                        <div class="info-column">
                                        <div class="box-button">
                                            <a href="product-restaurant.php?id=<?php echo $restaurantID;?>">Acceseaza</a>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            
                        <?php
                            }//end while
                        }else echo "<h1> Nu am gasit un asemenea Restaurant </h1>";//end if
                     ?>
                

                
                <!-- BANNER ADS -->
                <div class="hero__ads">
                    <div class="ads"></div>
                </div>
            </div>
        </div><!-- /container -->
        <div class="section__map" id="map">
            &nbsp;
        </div>
    </section>

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
                        <a href="./home.php">Acasă</a>
                    </li>
                    <li class="link">
                        <a href="./hotel-page.html">Hotel</a>
                    </li>
                    <li class="link">
                        <a href="./restaurant-page.php">Restaurant</a>
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

    <style>
.button {
  display: inline-block;
  padding: 10px 20px;
  font-size: 12px;
  cursor: pointer;
  text-align: center;
  text-decoration: none;
  outline: none;
  color: #fff;
  background-color: #3D59D6;
  border: none;
  border-radius: 15px;
  box-shadow: 0 9px #999;
}

.button:hover {background-color: #3D59D6}

.button:active {
  background-color: #3D59D6;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}

body {
margin: 0;
padding: 0;
}
#map {
top: 0;
bottom: 0;
width: 50%;
}
.marker {
background-image: url('./src/img/mark.png');
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
 'coordinates': [26.06213448465732, 44.48135653336092]
 },
 'properties': {
 'title': 'Restaurant',
 'description': 'Spaniol'
 }
 },

 {
 'type': 'Feature',
 'geometry': {
 'type': 'Point',
 'coordinates': [26.1130468, 44.4275793]
 },
 'properties': {
 'title': 'Restaurant',
 'description': 'Noeme - former GUXT'
}
},

{
 'type': 'Feature',
 'geometry': {
 'type': 'Point',
 'coordinates': [26.102649, 44.4394199]
 },
 'properties': {
 'title': 'Restaurant',
 'description': 'Imperial Turkish Cuisine & Steakhouse'
}
},

{
 'type': 'Feature',
 'geometry': {
 'type': 'Point',
 'coordinates': [26.1024227, 44.4780187]
 },
 'properties': {
 'title': 'Restaurant',
 'description': 'Nor Sky Casual'
}
}
]
};

var map = new mapboxgl.Map({
container: 'map',
style: 'mapbox://styles/mapbox/light-v10',
center: [26.100666290339458, 44.43314299845954],
zoom: 12,

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