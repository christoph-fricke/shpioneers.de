<?php
session_start();
if(!($_SESSION['login'] === True)||!checktoken()){
	echo 'noc';
 die();
}
$desponsor = json_decode(file_get_contents("../../../content/sponsors/partner-de-de.json"));
$ensponsor = json_decode(file_get_contents("../../../content/sponsors/partner-en-en.json"));
$desponsor[$_POST['index']] -> name = $_POST['metaname'];
$desponsor[$_POST['index']] -> text = $_POST['detext'];
$desponsor[$_POST['index']] -> img = $_POST['metaimg'];
$desponsor[$_POST['index']] -> web = $_POST['metaweb'];
$desponsor[$_POST['index']] -> email = $_POST['metaemail'];
$ensponsor[$_POST['index']] -> name = $_POST['metaname'];
$ensponsor[$_POST['index']] -> text = $_POST['entext'];
$ensponsor[$_POST['index']] -> img = $_POST['metaimg'];
$ensponsor[$_POST['index']] -> web = $_POST['metaweb'];
$ensponsor[$_POST['index']] -> email = $_POST['metaemail'];

file_put_contents("../../../content/sponsors/partner-de-de.json", json_encode($desponsor));
file_put_contents("../../../content/sponsors/partner-en-en.json", json_encode($ensponsor));
echo 'suc';
function checktoken(){
return $_POST['token'] == $_SESSION['sponsortoken'];
}
?>
