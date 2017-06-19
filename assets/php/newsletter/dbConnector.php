<?php
require_once('dbconfig.php');

try {
    $pdo = new PDO(DSN, USER, PASS);
    $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "CREATE TABLE IF NOT EXISTS subscribers (date datetime, email text, hash text, UNIQUE(email(255))); CREATE TABLE IF NOT EXISTS pendingSubscribers (date datetime, email text, hash text, UNIQUE(email(255)))";
    $pdo -> exec($sql);
}
catch(PDOExeption $e) {
    echo 'Connection failed: ' . $e -> getMessage();
}
?>
