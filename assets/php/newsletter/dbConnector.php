<?php
require_once('dbconfig.php');

try {
    $pdo = new PDO(DSN, USER, PASS);
    $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$pdo -> exec("SET NAMES utf8");
    $sql = "CREATE TABLE IF NOT EXISTS subscribers (date datetime, email text, hash text, lang int, UNIQUE(email(255))) DEFAULT CHARACTER SET utf8; CREATE TABLE IF NOT EXISTS pendingSubscribers (date datetime, email text, hash text, lang int) DEFAULT CHARACTER SET utf8";
	// lang = 0 : germam; lang = 1 : english; 
    $pdo -> exec($sql);
}
catch(PDOExeption $e) {
    echo 'Connection failed: ' . $e -> getMessage();
}
?>
