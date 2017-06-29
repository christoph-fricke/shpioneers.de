<?php
require_once('../../../admin/passwordLib.php');
require_once('dbConnector.php');

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
    
    $status = 1;
}
catch(Exception $e) {
    $status = 0;
}
echo $status;
//TODO: Give the user feedback if his email already exists
