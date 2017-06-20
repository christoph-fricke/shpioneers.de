<?php
session_start();
require_once('../../../admin/passwordLib.php');
//Checks if the script is called with a valid token and if an email adress is provided.
require_once('dbConnector.php');

$hash = $_GET['hash'];
try {
    $sqlMove = "INSERT INTO subscribers (email, hash, date) SELECT email, hash, date FROM pendingSubscribers WHERE hash = \"{$hash}\"";
    $pdo -> exec($sqlMove);
     $sqlGetEmail ="SELECT email FROM pendingSubscribers WHERE hash = \"{$hash}\"";
	$sth = $pdo -> prepare($sqlGetEmail);
	$sth -> execute();
	$email = $sth -> fetch(PDO::FETCH_ASSOC)['email'];
	$sqlDelete = "DELETE FROM pendingSubscribers WHERE email = \"{$email}\"";
	$pdo -> exec($sqlDelete);
    $status = 1;
}
catch(PDOException $e) {
    	echo $e -> getMessage();
	$status = 0;
}

//TODO: Give the user feedback if his email already exists
