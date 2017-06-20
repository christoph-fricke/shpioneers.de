<?php
require_once('../../../admin/passwordLib.php');
require_once('dbConnector.php');

$hash = $_GET['hash'];
$email = "";

try {
    $sqlMove = "INSERT INTO subscribers (email, hash, date, lang) SELECT email, hash, date, lang FROM pendingSubscribers WHERE hash = :hash";
    $prepared = $pdo -> prepare($sqlMove);
    $prepared -> execute(array('hash' => $hash));

    //Gets the email of the 
    $sqlGetEmail = "SELECT email FROM pendingSubscribers WHERE hash = :hash";
    $prepared = $pdo -> prepare($sqlGetEmail);
    $prepared -> execute(array('hash' => $hash));
    $email = $prepared -> fetch(PDO::FETCH_ASSOC)['email'];

    //Deletes all pending email addresses which are equal with the one in the database
    $sqlDelete = "DELETE FROM pendingSubscribers WHERE email = :email";
 	$prepared = $pdo -> prepare($sqlDelete);
    $prepared -> execute(array('email' => $email));
    
    $status = 1;
}
catch(Exception $e) {
    $status = 0;
}

//TODO: Give the user feedback if his email already exists
