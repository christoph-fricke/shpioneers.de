<?php
session_start();
if(!($_SESSION['login'] === True)) die();
$demember = json_decode(file_get_contents('../../content/team/team-de-de.json'))[$_GET['index']];
$enmember = json_decode(file_get_contents('../../content/team/team-en-en.json'))[$_GET['index']];
$length = 32;
$secure = true;
$_SESSION['teamtoken'] = bin2hex(openssl_random_pseudo_bytes($length, $secure));
?>

