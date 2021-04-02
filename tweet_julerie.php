<?php require 'dbini.php';

require_once('TwitterAPIExchange.php');

// Réalisé avec amour par @ycenta :^)

// liste de toutes les voyelles et accents
$lettreliste = array("é","a","i","o","u","y","è","e","à","ù","ü","î","ï","É","A","I","O","U","Y","È","E","À","Ù","Ü","Î","Ï");
$article = " la ";
?>

<?php


$req = "SELECT last_id FROM last_one";
$resultat = $conn->query($req);
while($valeurs = $resultat->fetch_assoc()) {
	 $last_id =$valeurs["last_id"];
	
}
// rajoute là ou l' selon le mot 
$sql = "SELECT Mots FROM liste_mots where id_mot =".$last_id;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
		$mot = substr($row["Mots"],0,1);
		$mot_firstletter = utf8_encode($mot);
		
		foreach ($lettreliste as $key => $letter) {
			if($mot_firstletter == $letter){
				$article = " l'";	
				break;
			}else{
				$article = " la ";	
			}
			
		}
				$settings = array(
				'oauth_access_token' => TWITTER_ACCESS_TOKEN, 
				'oauth_access_token_secret' => TWITTER_ACCESS_TOKEN_SECRET, 
				'consumer_key' => TWITTER_CONSUMER_KEY, 
				'consumer_secret' => TWITTER_CONSUMER_SECRET
			);
		$url = 'https://api.twitter.com/1.1/statuses/update.json';
		$requestMethod = 'POST';

		$postfields = array(
			'status' => "Wesh".$article.utf8_encode($row["Mots"])."erie", 
		);
		$twitter = new TwitterAPIExchange($settings);
		echo $twitter->buildOauth($url, $requestMethod)
			->setPostfields($postfields)
			->performRequest( true, array( CURLOPT_SSL_VERIFYHOST => 0, CURLOPT_SSL_VERIFYPEER => 0 ) );
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}			
		//echo "Wesh".$article.utf8_encode($row["Mots"])."erie<br>";
	}
}	
//update le numero du dernier mot posté sur twitter pour envoyer un à un chaque mot
$incremente_lastid = intval($last_id)+1;
$update_lastID = "UPDATE `last_one` SET `last_id`=".$incremente_lastid." WHERE 1";
$answs = $conn->query($update_lastID);

			
  
$conn->close();

// Source code https://github.com/ycenta


?>