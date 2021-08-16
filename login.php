<?php
    include 'config.php';
    //Logare
    if(isset( $_POST["lemail"]) && isset( $_POST["lpassword"])){   // $_POST- verific daca datele din tabelul completat esunt completate
        $email = $_POST["lemail"];
        $password = $_POST["lpassword"];
        $sql = "SELECT * FROM clienti WHERE email = '$email' AND password = '$password'";   // se cauta un client care are emailul si parola potrivita
        $result = $conn->query($sql); // se executa intergoarea
        if (!$result) {
            trigger_error('Invalid query: ' . $conn->error);
        }
        if ($result->num_rows > 0) {  // daca exista cel putin un rezultat
            echo "<br>am gasit";
            while($row = $result->fetch_assoc()) {  // cat timp sa citeasca login email parola in SESSION
                echo "<br> Nume: $row[email]";
                $_SESSION['login'] = 1;
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                header('location: home.php');
            }
        }else echo "<br>nu am gasit cont";
    }
    $error = 0;
    $mesaj = 0;
    if(isset($_GET['mesaj'])){
        $mesaj=$_GET['mesaj'];
    }
    //Inregistrare
    if(isset($_POST['iemail']) && isset($_POST['ipassword']) && isset($_POST['iname']))
	{
		$email = $_POST['iemail'];
		$sql = "SELECT * FROM clienti WHERE email = '$email'";  // verifica daca emailul introdus este deja folosit
		$result = $conn->query($sql);
		if (!$result) {
			trigger_error('Invalid query: ' . $conn->error);
		}
		if ($result->num_rows == 0) {  // daca =0 inseamna ca se poate crea cont
			//Encryption:
			$parola = $_POST['ipassword'];
            $nume = $_POST['iname'];
            $data = 
            "INSERT INTO clienti (`username`,`password`,`email`) 
            VALUES (\"$nume\",\"$parola\",\"$email\")
            ";
            if (mysqli_query($conn, $data)) {
                echo "Record updated successfully";
            } else {
                echo "Error updating record: " . mysqli_error($conn);
            }
            header("location: login.php?mesaj=1");
		}
		else $error = 2;//echo "deja este un cont cu acesta adresa de email";
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/css/login2.css">
    <link rel="stylesheet" href="src/css/main.css">
    <title>Logare</title>
    <link rel="shorcut icon" type="image/x-icon" href="./src/img/koala.png">
</head>
<body>
    <nav class="nav">
        <div class="nav__container">
            <div class="nav__container-logo">
                <img src="./src/img/koala.png" alt="logo" class="nav-logo">
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
                <a href="./login.php" class="login-btn">Logare</a>
            </div>
        </div>

        <div class="nav__toggle">
        <div class="nav__toggle-lines">
            <span class="line line-1"></span>
            <span class="line line-2"></span>
        </div>
    </div>
    </nav>
    <div class="container">
        <div class="card">
            <div class="inner-box" id="card" >
                <div class="<?php if($error == 2)
                        echo "card-back";
                        else echo "card-front";?>">
                    <h2>Logare</h2> 
                    <?php 
                        if($mesaj==1)echo "<h2>Contul a fost inregistrat cu succes!</h2>";
                    ?>
                    <form action="login.php" method="POST">
                        <input id="lemail" name="lemail" type="email" class="input-box" placeholder="Adresa Email" required >
                        <input id="lpassword" name="lpassword" type="password" class="input-box" placeholder="Parola" required >
                        <a id="btn-login"><button type="submit" class="submit-btn" >Acceseaza</button></a>
                        <!-- <input type="checkbox"><span>Tine-ma minte</span> -->
                    </form>
                    <button type="button" class="btn" onclick="openRegister()">Sunt nou aici</button>
                    <a href="">Am uitat parola</a>
                </div>
                <div class="<?php if($error == 0)
                        echo "card-back";
                        else echo "card-front";?>">
                    <h2>Inregistrare</h2>
                    <?php if($error == 2)echo "<h3>Adresa $_POST[iemail] este deja folosita.</h3>";?>
                    <form action="login.php" method="POST">
                        <input id="iname" name="iname" type="text" class="input-box" placeholder="Nume" required >
                        <input id="iemail" name="iemail" type="email" class="input-box" placeholder="Adresa Email" required >
                        <input id="ipassword" name="ipassword" type="password" class="input-box" placeholder="Parola" required >
                        <button type="submit" class="submit-btn" >Acceseaza</button>
                        <input id="checkbox" type="checkbox" required><span>Acord pentru preluarea datelor personale</span> 
                    </form>
                    <button type="button" class="btn" onclick="openLogin()">Am deja un cont</button>
                </div>
            </div>
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
                        <a href="./hotel-page.php">Hotel</a>
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

    <script>

        var card = document.getElementById("card");

        function openRegister(){
            card.style.transform = "rotateY(-180deg)";
            document.getElementById("btn-login").style.display = "none";
        }

        function openLogin(){
            card.style.transform = "rotateY(0deg)";
            document.getElementById("btn-login").style.display = "block";
        }
    </script>
</body>
</html>