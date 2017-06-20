<?php
require_once('../../../admin/passwordLib.php');
require_once('dbConnector.php');

$hash = $_GET['hash'];
$email = "";

try {
    $sqlMove = "INSERT INTO subscribers (email, hash, date, lang) SELECT email, hash, date, lang FROM pendingSubscribers WHERE hash = :hash";
    $prepared = $pdo -> prepare($sqlMove);
    $prepared -> execute(array('hash' => $hash));

	//Delete all the other entries in the db for the relevant email
    $sqlDelete = "DELETE FROM pendingSubscribers WHERE email = (SELECT email FROM subscribers WHERE hash = :hash)";
 	$prepared = $pdo -> prepare($sqlDelete);
    $prepared -> execute(array('hash' => $hash));
    
    $status = 1;
}
catch(Exception $e) {
    $status = 0;
}

//TODO: Give the user feedback if his email already exists
