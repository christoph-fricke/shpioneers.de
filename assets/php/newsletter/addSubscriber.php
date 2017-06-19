<?php
session_start();
require_once('../../../admin/passwordLib.php');
//Checks if the script is called with a valid token and if an email adress is provided.
require_once('dbConnector.php');

try {
    $prepared -> exec("INSERT INTO subscribers[(email, hash, date)] SELECT email, hash, date FROM pendingSubscribers WHERE hash = {$_GET['hash']}");

    $status = 1;
}
catch(Exception $e) {
    $status = 0;
}
