<?php
session_start();
require_once('../../../admin/passwordLib.php');
//Checks if the script is called with a valid token and if an email adress is provided.
require_once('dbConnector.php');

$hash = $_GET['hash'];
echo "I ama here";
try {
    $sqlMove = "INSERT INTO subscribers (email, hash, date) SELECT email, hash, date FROM pendingSubscribers WHERE hash = \"{$hash}\"";
    $pdo -> exec($sqlMove);
    // $sqlGetEmail = "SELECT email FROM pendingSubscribers WHERE hash = \"{$hash}\"";
    // $statement = $pdo -> query($sqlGetEmail);
    // $response = $statement -> fetch(PDO::FETCH_ASSOC);
    // echo $response;
    $status = 1;
}
catch(Exception $e) {
    $status = 0;
}

//TODO: Give the user feedback if his email already exists