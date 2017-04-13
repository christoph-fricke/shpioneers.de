<?php
session_start();
if(!($_SESSION['login'] === True) || $_SESSION['sponsortoken'] != $_GET['token']) die();
$desponsors = json_decode(file_get_contents("../../../content/sponsors/service-de-de.json"));
$ensponsors = json_decode(file_get_contents("../../../content/sponsors/service-en-en.json"));
moveElement($desponsors,$_GET['index'],$_GET['index'] - $_GET['shift']);
moveElement($ensponsors,$_GET['index'],$_GET['index'] - $_GET['shift']);
file_put_contents("../../../content/sponsors/service-de-de.json",json_encode($desponsors));
file_put_contents("../../../content/sponsors/service-en-en.json",json_encode($ensponsors));
function moveElement(&$array, $a, $b) {
	if($a < 0 || $b < 0 || $a >= sizeof($array) || $b >= sizeof($array)) return;    
$out = array_splice($array, $a, 1);
    array_splice($array, $b, 0, $out);
}
?>
