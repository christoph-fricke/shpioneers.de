<?php
session_start();
if(!($_SESSION['login'] === True)||$_POST['token'] != $_SESSION['sponsortoken']){
	echo 'noc';
 die();
}
$desponsors = json_decode(file_get_contents("../../../content/sponsors/service-de-de.json"));
$ensponsors = json_decode(file_get_contents("../../../content/sponsors/service-en-en.json"));
$desponsor = new stdClass();
$desponsor -> name = $_POST['metaname'];
$desponsor -> img = $_POST['metaimg'];
$desponsor -> text = $_POST['detext'];
$desponsor -> web = $_POST['metaweb'];
$desponsor -> email = $_POST['metaemail'];
$ensponsor = new stdClass();
$ensponsor -> name = $_POST['metaname'];
$ensponsor -> img = $_POST['metaimg'];
$ensponsor -> text = $_POST['entext'];
$ensponsor -> web = $_POST['metaweb'];
$ensponsor -> email = $_POST['metaemail'];
array_insert($desponsors,$desponsor);
array_insert($ensponsors,$ensponsor);
if(file_put_contents("../../../content/sponsors/service-de-de.json", json_encode($desponsors))> 0 && file_put_contents("../../../content/sponsors/service-en-en.json", json_encode($ensponsors)) > 0) echo 'suc';
else echo 'noc';



function array_insert(&$array,$object){
for($i = sizeof($array);$i > 0; $i-- ){
	$array[$i] = $array[$i -1];
}
$array[0] = $object;
}
?>
