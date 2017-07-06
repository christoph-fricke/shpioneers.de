<?php
/*
Only upload this file to the server if you have the permission of the persons to which you will send the emails.
otherwise they might sue you.
also delete this file after executing it, because it could screw up your db if you are not carefull.
also do not input an email adress that already is in the db, because all other commands after that will be ignored
*/
include('dbConnector.php');
require_once('../../../admin/passwordLib.php');
function addSub($email){
	global $pdo;
	$hash = password_hash($email,PASSWORD_DEFAULT);
	$sql = "INSERT INTO subscribers (date, email, hash, lang) VALUES (NOW(),\"{$email}\",\"{$hash}\",0)";
	$pdo -> exec($sql);
}
?>
