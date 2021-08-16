<?php
session_start();
include 'SQL.php';
$logged_in = 0;
if(isset($_SESSION['email']) && isset($_SESSION['password'])){
	$email = $_SESSION['email'];
	$parolaCont = $_SESSION['password'];
	$udata = "SELECT * FROM clienti WHERE email = '$email' AND password = '$parolaCont'";
	$result = $conn->query($udata);
	if (!$result) {
		trigger_error('Invalid query: ' . $conn->error);
	}
	if ($result->num_rows > 0) {
		//echo "<br>am gasit";
		while($row = $result->fetch_assoc()) {
			if(isset($row['id'])){
				$logged_in = 1;
				$contId = $row['id'];
				$contNume = $row['username'];
				$contImagine = $row['imagine'];
				$lHotelViewed = $row['lHotelViewed'];
				$lHotelViewed2 = $row['lHotelViewed2'];
				$lHotelViewed3 = $row['lHotelViewed3'];
				$lRestaurantViewed = $row['lRestaurantViewed'];
				$lRestaurantViewed2 = $row['lRestaurantViewed2'];
				$lRestaurantViewed3 = $row['lRestaurantViewed3'];
				//echo "1)config: user_name:$user_name<br>";
				if(isset($_GET['logout'])){
					unset($_SESSION['username']);
					unset($_SESSION['password']);
					$logged_in = 0;
					//header('location: index.php');
				}
			}//else echo "<br> AM dat gres";
		}
	}//else echo "<br>nu am gasit cont";
}//else echo "nu merege config";
if(!isset($_SESSION['login']))
{
	// Setez preventiv ca toti vizitatorii sa fie neconectati
	$_SESSION['login'] = 0;
} 

// CE FACE FUNCTIA ASTA !!!!!!
function redirect($url, $statusCode = 303)
{
   header('Location: ' . $url, true, $statusCode);
   die();
}
//echo "2)config: user_name:$user_name<br>";
?>