<?php
require_once('../../../admin/passwordLib.php');
require_once('dbConnector.php');
define(SUB_EN,"Welcome to our newsletter");
define(SUB_DE,"Willkommen beim Pioneers-Newsletter");

$hash = $_GET['hash'];

try {
	// find out if the hash exist
	$sqlHash = "SELECT COUNT(email) FROM pendingSubscribers WHERE hash = :hash";
	$prepared = $pdo -> prepare($sqlHash);
	$prepared -> execute(array('hash' => $hash));
	$result = $prepared -> fetchAll();
	if($result[0][0] == 0) die('2');
	$sqlMove = "INSERT INTO subscribers (email, hash, date, lang) SELECT email, hash, date, lang FROM pendingSubscribers WHERE hash = :hash";
	$prepared = $pdo -> prepare($sqlMove);
	$prepared -> execute(array('hash' => $hash));
	//Delete all the other entries in the db for the relevant email
	$sqlDelete = "DELETE FROM pendingSubscribers WHERE email = (SELECT email FROM subscribers WHERE hash = :hash)";
	$prepared = $pdo -> prepare($sqlDelete);
	$prepared -> execute(array('hash' => $hash));
	// send welcome message
	$sqlWelcome = "SELECT email,lang FROM subscribers WHERE hash= :hash";
	$prepared = $pdo -> prepare($sqlWelcome);
	$prepared -> execute(array('hash' => $hash));
	$result = $preparedd -> fetchAll();
	$email = $result[0]['email'];
	$lang = $result[0]['lang'];
	$header = "FROM: <info@shpioneers.de>\n";
	$header .= "Content-Type:text/html;charset=UTF-8";
	switch($lang){
		case 0:
			$subject = SUB_EN;
			$message = file_get_contents('welcome_en.html');
			include('lang/en.php'):
			break;
		case 1:
			$subject = SUB_DE;
			$message = file_get_contents('welcome_de.html');
			include('lang/de.php'):
			break;
		default:
			$subject = SUB_EN;
			$message = file_get_contents('welcome_en.html');
			include('lang/en.php'):
			break;
	}
	$message .= '<br> To unsubscribe from this newsletter click <a href="http://www.shpioneers.de/unsubscribe.php?hash='
	$message .= $hash . '">here</a>.';
	mail($email,$subject,$message,$header);
	$status = 1;
}
catch(Exception $e) {
	$status = 0;
}
echo $status;
