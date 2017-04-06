<?php
session_start();
if(!($_SESSION['login'] === True)) die();
$demember = json_decode(file_get_contents('../../content/team/team-de-de.json'))[$_GET['index']];
$enmember = json_decode(file_get_contents('../../content/team/team-en-en.json'))[$_GET['index']];
$length = 32;
$secure = true;
$_SESSION['teamtoken'] = bin2hex(openssl_random_pseudo_bytes($length, $secure));
$oneline = "input";
$multline = "textarea";
$returnval -> de -> name -> value = $demember -> name;
$returnval -> de -> name -> type = $oneline;
$returnval -> de -> job -> value = $demember -> job;
$returnval -> de -> job -> type = $oneline;
$returnval -> de -> quote -> value = $demember -> quote;
$returnval -> de -> quote -> type = $multline;
$returnval -> de -> quotee -> value = $demember -> quotee;
$returnval -> de -> quotee -> type = $oneline;
$returnval -> de -> text -> value = $demember -> text;
$returnval -> de -> text -> type = $multline;
$returnval -> de -> img -> value = $demember -> img;
$returnval -> de -> img -> type = $oneline;
$returnval -> en -> name -> value = $enmember -> name;
$returnval -> en -> name -> type = $oneline;
$returnval -> en -> job -> value = $enmember -> job;
$returnval -> en -> job -> type = $oneline;
$returnval -> en -> quote -> value = $enmember -> quote;
$returnval -> en -> quote -> type = $multline;
$returnval -> en -> quotee -> value = $enmember -> quotee;
$returnval -> en -> quotee -> type = $oneline;
$returnval -> en -> text -> value = $enmember -> text;
$returnval -> en -> text -> type = $multline;
$returnval -> en -> img -> value = $enmember -> img;
$returnval -> en -> img -> type = $oneline;
$returnval -> token = $_SESSION['teamtoken'];
echo json_encode($returnval);
?>

