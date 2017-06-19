<?php
session_start();
require_once('../../../admin/passwordLib.php');
//Checks if the script is called with a valid token and if an email adress is provided.
require_once('dbConnector.php');

try {
    $sql = "INSERT INTO subscribers (email, hash, date) SELECT email, hash, date FROM pendingSubscribers WHERE hash = \"{$_GET['hash']}\"";
    $pdo -> exec($sql);
    $status = 1;
}
catch(Exception $e) {
    $status = 0;
}
