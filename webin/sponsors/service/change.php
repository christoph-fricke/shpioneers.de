<?php
session_start();
if(!($_SESSION['login'] === True)) die();
if($_GET['index'] >= 0){
$desponsor = json_decode(file_get_contents('../../../content/sponsors/service-de-de.json'))[$_GET['index']];
$ensponsor = json_decode(file_get_contents('../../../content/sponsors/service-en-en.json'))[$_GET['index']];
}
else{
$desponsor = new stdClass();
$desponsor -> name = "";
$desponsor -> img = "";
$desponsor -> text = "";
$desponsor -> email = "";
$desponsor -> web = ""; 
$ensponsor = new stdClass();
$ensponsor -> name = "";
$ensponsor -> img = "";
$ensponsor -> text = "";
$ensponsor -> email = "";
$ensponsor -> web = ""; 
}
$length = 32;
$secure = true;
$_SESSION['sponsortoken'] = bin2hex(openssl_random_pseudo_bytes($length, $secure));
$oneline = "input";
$multline = "textarea";
$returnval = new stdClass();
$returnval  -> de = new stdClass();
$returnval -> de -> text = new stdClass();
$returnval -> de -> text -> value = $desponsor -> text;
$returnval -> de -> text -> type = $multline;

$returnval  -> en = new stdClass();
$returnval -> en -> text = new stdClass();
$returnval -> en -> text -> value = $ensponsor -> text;
$returnval -> en -> text -> type = $multline;

$returnval -> meta = new stdClass();
$returnval -> meta -> name = new stdClass();
$returnval -> meta -> name -> value = $ensponsor -> name;
$returnval -> meta -> name -> type = $oneline;
$returnval -> meta -> img = new stdClass();
$returnval -> meta -> img -> value = $ensponsor -> img;
$returnval -> meta -> img -> type = $oneline;
$returnval -> meta -> web = new stdClass();
$returnval -> meta -> web -> value = $ensponsor -> web;
$returnval -> meta -> web -> type = $oneline;
$returnval -> meta -> email = new stdClass();
$returnval -> meta -> email -> value = $ensponsor -> email;
$returnval -> meta -> email -> type = $oneline;

$returnval -> token = $_SESSION['sponsortoken'];

if($_GET['index'] >= 0){
$returnval -> submit = 'sponsors/service/submit.php';
}
else{
$returnval -> submit = 'sponsors/service/add.php';
}
echo json_encode($returnval);
?>

