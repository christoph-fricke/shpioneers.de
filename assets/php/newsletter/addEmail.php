<?php
include('dbConnector.php');
require_once('../../../admin/passwordLib.php');
function addSub($email){
	global $pdo;
	$hash = password_hash($email,PASSWORD_DEFAULT);
	$sql = "INSERT INTO subscribers (date, email, hash, lang) VALUES (NOW(),\"{$email}\",\"{$hash}\",0)";
	$pdo -> exec($sql);
}
?>
