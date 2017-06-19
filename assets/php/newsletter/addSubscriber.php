<?php
session_start();
require_once('../../../admin/passwordLib.php');
//Checks if the script is called with a valid token and if an email adress is provided.
require_once('dbConnector.php');

$hash = $_GET['hash'];

try {
    $sqlMove = "INSERT INTO subscribers (email, hash, date) SELECT email, hash, date FROM pendingSubscribers WHERE hash = \"{$hash}\"";
    $pdo -> exec($sqlMove);
    $sqlDelete = "DELETE FROM pendingSubscribers WHERE hash = \"{$hash}\"";
    $pdo -> exec($sqlDelete);
    // echo $sqlMove;
    // echo $sqlDelete;
    $status = 1;
}
catch(Exception $e) {
    $status = 0;
}
