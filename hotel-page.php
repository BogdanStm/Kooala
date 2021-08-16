<?php
include 'config.php';
$nrFiltre = 0;//Creez o varabila care tine evidenta cate filtre am active
if(isset($_GET["sector"])){
    $sector = $_GET["sector"];
    if($sector > 0)$nrFiltre++;
}
else $sector = 0;

if(isset($_GET["stele"])){
    $stele = $_GET["stele"];
    if($stele > 0)$nrFiltre++;
}
else $stele = 0;
if(isset($_GET["wifi"])){
    $wifi = $_GET["wifi"];
    if($wifi > 0)$nrFiltre++;
}
else $wifi = 0;

if(isset($_GET["patMatrimonial"])){
    $patMatrimonial = $_GET["patMatrimonial"];
    if($patMatrimonial > 0)$nrFiltre++;
}
else $patMatrimonial = 0;

if(isset($_GET["pranz"])){
    $pranz = $_GET["pranz"];
    if($pranz > 0)$nrFiltre++;
}
else $pranz = 0;

if(isset($_GET["camere"])){
    $camere = $_GET["camere"];
    if($camere > 0)$nrFiltre++;
}
else $camere = 0;

//echo "Am $nrFiltre filtre active";




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel</title>
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
                
                    <li class="list-item active">
                        <a href="./hotel-page.php">Hotel</a>
                    </li>
                    <li class="list-item">
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
                    <form id="filterForm"action="hotel-page.php" method="GET">
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
                        <select id="stele" name="stele" form="filterForm" class="filter-button">
                            <option value="0">Stele</option>
                            <option value="1" <?php if($stele == 1)echo "selected=\"selected\"";?>>1</option>
                            <option value="2" <?php if($stele == 2)echo "selected=\"selected\"";?>>2</option>
                            <option value="3" <?php if($stele == 3)echo "selected=\"selected\"";?>>3</option>
                            <option value="4" <?php if($stele == 4)echo "selected=\"selected\"";?>>4</option>
                            <option value="5" <?php if($stele == 5)echo "selected=\"selected\"";?>>5</option>
                        </select>
                        <input type="checkbox" id="wifi" name="wifi" value="1"  <?php if($wifi == 1)echo "checked";?>>
                        <label class="container" for="wifi" style="font-size: 15px;"><i class="fas fa-wifi"></i>Wi-Fi</label>
                        <input type="checkbox" id="patMatrimonial" name="patMatrimonial" value="1"  <?php if($patMatrimonial == 1)echo "checked";?>>
                        <label for="patMatrimonial" style="font-size: 15px;"><i class="fas fa-bed"></i>Pat Matrimonial</label>
                        <input type="checkbox" id="pranz" name="pranz" value="1" <?php if($pranz == 1)echo "checked";?>>
                        <label for="pranz" style="font-size: 15px;"><i class="fas fa-bacon"></i>Pranz</label>
                        <select id="camere" name="camere" form="filterForm" class="filter-button">
                            <option value="0">Camere</option>
                            <option value="1" <?php if($camere == 1)echo "selected=\"selected\"";?>>1</option>
                            <option value="2" <?php if($camere == 2)echo "selected=\"selected\"";?>>2</option>
                            <option value="3" <?php if($camere == 3)echo "selected=\"selected\"";?>>3</option>
                            <option value="4" <?php if($camere == 4)echo "selected=\"selected\"";?>>4</option>
                            <option value="5" <?php if($camere == 5)echo "selected=\"selected\"";?>>5</option>
                        </select>
                        <button class="button" type="submit"><i class="fas fa-search"></i></button>
                    </form>
                </div>
            </div>
            <!-- FILTERS END -->
            <div class="section__container-hero hero">
                    <?php 
					//Aici incep ca pregatesc textul pentru interogarea SQL
                        $text1 = "SELECT * FROM hotel ";//Incep simplu
                        if($nrFiltre > 0){//Pentru fiecare filtru adaug la textul pentru interogare
                            $text1 = $text1 . " WHERE ";
                            $filtreAplicate = 0;//Folosesc aceasta variabila pentru a tine evidenta cate filtre au fost aplicate in timpul pregatirii textului
                            if($sector > 0){
                                if($filtreAplicate > 0)$text1 = $text1 . " AND ";//Adaug elementele de legatura
                                $text1 = $text1 . " sector = " . $sector;
                                $filtreAplicate++; //Marchez ca am aplicat un filtru
                            }
                            if($stele > 0){
                                if($filtreAplicate > 0)$text1 = $text1 . " AND ";
                                $text1 = $text1 . " stele = " . $stele;
                                $filtreAplicate++;
                            }
                            if($wifi > 0){
                                if($filtreAplicate > 0)$text1 = $text1 . " AND ";
                                $text1 = $text1 . " wifi = " . $wifi;
                                $filtreAplicate++;
                            }
                            if($patMatrimonial > 0){
                                if($filtreAplicate > 0)$text1 = $text1 . " AND ";
                                $text1 = $text1 . " patMatrimonial = " . $patMatrimonial;
                                $filtreAplicate++;
                            }
                            if($pranz > 0){
                                if($filtreAplicate > 0)$text1 = $text1 . " AND ";
                                $text1 = $text1 . " pranz = " . $pranz;
                                $filtreAplicate++;
                            }
                            if($camere > 0){
                                if($filtreAplicate > 0)$text1 = $text1 . " AND ";
                                $text1 = $text1 . " camere = " . $camere;
                                $filtreAplicate++;
                            }
                        }
                        //echo "!REZULTATE: $text1";
                        $sql = $text1;//Salvez textul final in $sql pentru a rula interogarea
                        $result = $conn->query($sql);//Obtin rezultatul interogarii
						$total = mysqli_num_rows($result);//In $total salvez numarul de rezultate din $result  
						//______________|Pagini Start|
						// How many items to list per page
						$limit = 4;//Numarul de hotelul pe o pagina

						// How many pages will there be
						$pages = ceil($total / $limit);//Calculez cate pagini am nevoie

						// What page are we currently on?
						$page = min($pages, filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT, array(
							'options' => array(
								'default'   => 1,
								'min_range' => 1,
							),
						)));//Aici determin la ce pagina trebuie sa fiu

						// Calculate the offset for the query
						$offset = ($page - 1)  * $limit;//Calculez cate rezultate trebuie sa omit, in functie de pagina curenta
                        if($offset < 0)$offset = 0;
						$text1 = $text1 . "  ORDER BY id LIMIT $limit OFFSET $offset";//Aici adaug la interogarea de mai sus si ce rezultate vreau sa omita(pentru pagina)
						/*
						//array pentru API-ul de la mapa
						
						$array = array(
							1 => array(
								"x" => 249,
								"y" => 444
							)
						);
						var_dump($array);
						echo "<br>Rezultat:x" . $array[1]["x"];
						//$array[]["x"] = 997;
						$array[] = array("x" => 997.77, "y" => 777); 
						echo "<br>Rezultat:x" . $array[2]["x"];
						echo "<br>Rezultat:y" . $array[2]["y"];
						*/
						//echo "<br>". $text1;
						
						// Find out how many items are in the table
						$sql = $text1;//Actualizez $sql  
						$result = mysqli_query($conn, $sql);//Rule interogarea noua
						

						// Some information to display to the user
						$start = $offset + 1;
						$end = min(($offset + $limit), $total);

						// The "back" link
						//$prevlink = ($page > 1) ? '<a href="?page=1" title="First page">&laquo;</a> <a href="?page=' . ($page - 1) . '" title="Previous page">&lsaquo;</a>' : '<span class="disabled">&laquo;</span> <span class="disabled">&lsaquo;</span>';
						$textFiltre = "";
						if($nrFiltre > 0){
							if($sector > 0){
								$textFiltre = $textFiltre . "&sector=" . $sector;
							}
							if($stele > 0){
								$textFiltre = $textFiltre . "&stele=" . $stele;
							}
							if($wifi > 0){
								$textFiltre = $textFiltre . "&wifi=" . $wifi;
							}
							if($patMatrimonial > 0){
								$textFiltre = $textFiltre . "&patMatrimonial=" . $patMatrimonial;
							}
							if($pranz > 0){
								$textFiltre = $textFiltre . "&pranz=" . $pranz;
							}
							if($camere > 0){
								$textFiltre = $textFiltre . "&camere=" . $camere;
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



						// The "forward" link
						//$nextlink = ($page < $pages) ? '<a href="?page=' . ($page + 1) . '" title="Next page">&rsaquo;</a> <a href="?page=' . $pages . '" title="Last page">&raquo;</a>' : '<span class="disabled">&rsaquo;</span> <span class="disabled">&raquo;</span>';

						if($page < $pages){
							$nextlink1 = ' <a href="?page=' . ($page + 1) . $textFiltre . '" title="Pagina urmatoare" "> &raquo; </a> ';
							$nextlink2 = '<a href="?page=' . $pages . $textFiltre . '" title="Ultima pagina">  &raquo; </a>';
							$nextlink = $nextlink1 . $nextlink2;
						}
						else {
							$nextlink = '<span class="disabled">&rsaquo;</span> <span class="disabled"> &raquo; </span>';
						}





						// Display the paging information
						echo '<div id="paging"><h1 style="font-size:1.8rem;">', $prevlink, ' Pagina ', $page, ' din ', $pages, ' , ' , $start, '-', $end, ' din ', $total, ' rezultate ', $nextlink, ' </h1></div>';
						
						//echo "TOTAL:$text1";
						//$coordonate = array();//vreau sa folosesc acest array pentru a salva coordonatele din baza de date 
						// si se le folosesc in API pentru a puna un marker fiecarui hotel
                        if (!$result) {//verific daca am primit eroare de la interogare
                            trigger_error('Invalid query: ' . $conn->error);
                        }
                        if ($result->num_rows > 0) {//Verific numarul de randuri ca sa stiu daca am cel putin un rezultat
                            while($row = $result->fetch_assoc()) {//Daca da atunci folosesc acest while pentru a parcurge fiecare rand
                                $hotelID = $row['id'];//Aici extrag valorile din baza de date si le salvez in alte variabile 
                                $pretHotel = $row['pret'];//Faca asta pentru ca imi este mai usor sa folosesc o variabila $pretHotel decat $row['pret'];
                                $numeHotel = $row['nume_hotel'];
                                $cat_id = $row['categorie_id'];
                                $adresaHotel = $row['adresa_hotel'];
                                $camere = $row['camere'];
                                $imagine = $row['imagine'];
								//$coordonate[] = array("x" => $row['longitudine'],"y" => $row['latitudine'],"nume" => $row['nume_hotel']);
								
                            ?>
                            <div class="hero__container hero">
                                <div class="hero-img">
                                    <img src="<?php echo $imagine;?>" alt="hotel" class="box-img">
                                </div>
                            <div class="hero__box">
                                
                                    <div class="hero__box-content content">
                                        <div class="content-column">
										<!-- Aici incep sa afisez valorile din baza de date -->
                                            <div class="box-name"><?php echo $numeHotel;?> </div>
                                            <div class="box-info"><?php echo $adresaHotel;?> </div>
                                        </div>
                                        <div class="content-column">
                                            <div class="box-price"><?php echo $pretHotel;?> lei</div>
                                            <div class="box-info">Pe noapte</div>
                                        </div>
                                    </div>
                                    <div class="hero__box-info info">
                                        <div class="info-column">
                                            <div class="box-info"><?php echo $camere;?>  Camere</div>
                                        </div>
                                    <div class="info-column">
                                            <div class="box-button">
                                                <a href="product-hotel.php?id=<?php echo $hotelID;?>">Acceseaza</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                            }//end while
                        }else echo "<h1> Nu am gasit un asemenea hotel </h1>";//end if
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
  
 
<?php //Aici incerc sa creez un JSON care sa fie folosit in script-ul de la mapa.
	$testText = '"type": "FeatureCollection","features": [';
	for($i = 0; $i < 2;$i++){
		$testText = $testText . '{"type": "Feature","geometry": {"type": "Point",';
		//$testText = $testText . '"coordinates": ['. $coordonate[$i]["x"] .', '. $coordonate[$i]["y"] .']},';
		
		//$testText = $testText . '"properties": {"title": "Hotel","description": "'. $coordonate[$i]["nume"] .'"},';
	}
	$testText = $testText . ']};';
	//$test2 = 
?>
  <script>

mapboxgl.accessToken = 'pk.eyJ1IjoicmF6dmFucGV0cnUiLCJhIjoiY2tvZHd4aGs2MDZtMTJ1cXBveTA1ODVmcyJ9.rC_jUT8sjS7znLjRB4d7Cw';

var geojson = {
'type': 'FeatureCollection',
'features': [
{
'type': 'Feature',
'geometry': {
'type': 'Point',
'coordinates': [26.0911365, 44.4408844]
},
'properties': {
'title': 'Hotel',
'description': 'Athenee Palace Hilton'
}
},

{
'type': 'Feature',
'geometry': {
'type': 'Point',
'coordinates': [26.0782074, 44.4293016]
},
'properties': {
'title': 'Hotel',
'description': 'Parliament'
}
},

{
'type': 'Feature',
'geometry': {
'type': 'Point',
'coordinates': [26.1064858, 44.4779864]
},
'properties': {
'title': 'Hotel',
'description': 'Courtyard by Marriott'
}
},

{
'type': 'Feature',
'geometry': {
'type': 'Point',
'coordinates': [26.0523589, 44.4438005]
},
'properties': {
'title': 'Hotel',
'description': 'Ambiance '
}
}
]
};

var map = new mapboxgl.Map({
container: 'map',
style: 'mapbox://styles/mapbox/light-v10',
center: [26.1025191, 44.4355053],
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