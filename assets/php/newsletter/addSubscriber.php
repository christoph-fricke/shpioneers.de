<?php
require_once('../../../admin/passwordLib.php');
require_once('dbConnector.php');

$hash = $_GET['hash'];
echo "I ama here" . $hash;
try {
    $sqlMove = "INSERT INTO subscribers (email, hash, date) SELECT email, hash, date FROM pendingSubscribers WHERE hash = :hash";
    $prepared = $pdo -> prepare($sqlMove);
    $prepared -> execute(array('hash' => $hash));
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