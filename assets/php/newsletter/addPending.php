<?php
session_start();
require_once('../../../admin/passwordLib.php');
//Checks if the script is called with a valid token and if an email adress is provided.
if ((!isset($_SESSION['token']) || $_SESSION['token'] != $_POST['token']) && !isset($_POST['email'])) {
	die('No token and/or email is provided.');
}

require_once('dbConnector.php');

$email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
$hash =	password_hash($email,PASSWORD_DEFAULT); 
if($_POST['lang'] == 'de'){
	$lang = 0;
}
else $lang = 1;
try {
	// checking wether email is already subscribed TODO is this legal?
	$sqlCheck = "SELECT email FROM subscribers WHERE email = :email";
	$prepared = $pdo -> prepare($sqlCheck);
	$prepared -> execute(array('email' => $email));
	if(sizeof($prepared -> fetchAll()) > 0) $status = 2;
	else{
		$sql = "INSERT INTO pendingSubscribers ( email, hash, date, lang) VALUES (:email, :hash, NOW(), :lang)";
		$prepared = $pdo -> prepare($sql);
		$prepared -> execute(array('email' => $email, 'hash' => $hash, 'lang' => $lang)); 

		$status = 1;
		include('sendConfirmation.php');
	}
}
catch(Exception $e) {
	$status = 0;
}

//Return feedback to the client
echo $status . ';' . newToken();

function newToken() {
	$length = 32;
	$secure = true;

	$newToken = bin2hex(openssl_random_pseudo_bytes($length, $secure));
	$_SESSION['token'] = $newToken;
	return $newToken;
}
?>
