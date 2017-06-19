<?php
require_once('dbconfig.php');

try {
    $pdo = new PDO(DSN, USER, PASS);
    $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "CREATE TABLE IF NOT EXISTS subscribers (id integer PRIMARY KEY AUTOINCREMENT, email TEXT, hash TEXT)";
    $pdo -> exec($sql);
} catch(PDOExeption $e) {
    echo "Connection failed: " . $e -> getMessage();
}
?>