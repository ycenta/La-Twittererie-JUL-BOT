<?php 
// connexion BDD

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "lexique";


//connexion Twitter API

	define( 'TWITTER_CONSUMER_KEY', 'TACLÉ_DE_CONSUMER' );
	define( 'TWITTER_CONSUMER_SECRET', 'TACLÉ_DE_CONSUMER_SECRET' );
	define( 'TWITTER_ACCESS_TOKEN', 'TONTOKEN' );
	define( 'TWITTER_ACCESS_TOKEN_SECRET', 'TONTOKEN_secret');



$conn = new mysqli($servername, $username, $password, $dbname);
?>

