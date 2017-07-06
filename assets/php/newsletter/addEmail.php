<?php
include('dbConnector.php');
addSub('asdf.de');
function addSub($email){
	global $pdo;
	$hash = password_hash($email,PASSWORD_DEFAULT);
	$sql = "INSERT INTO subscribers (date, email, hash, lang) VALUES (NOW(),\"{$email}\",\"{$hash}\",0)";
	$pdo -> exec($sql);
}
?>
