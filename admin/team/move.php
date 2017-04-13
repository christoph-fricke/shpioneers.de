<?php
session_start();
if(!($_SESSION['login'] === True) || $_SESSION['teamtoken'] != $_GET['token']) die();
$deteam = json_decode(file_get_contents("../../content/team/team-de-de.json"));
$enteam = json_decode(file_get_contents("../../content/team/team-en-en.json"));
moveElement($deteam,$_GET['index'],$_GET['index'] - $_GET['shift']);
moveElement($enteam,$_GET['index'],$_GET['index'] - $_GET['shift']);
file_put_contents("../../content/team/team-de-de.json",json_encode($deteam));
file_put_contents("../../content/team/team-en-en.json",json_encode($enteam));
function moveElement(&$array, $a, $b) {
	if($a < 0 || $b < 0 || $a >= sizeof($array) || $b >= sizeof($array)) return;    
$out = array_splice($array, $a, 1);
    array_splice($array, $b, 0, $out);
}
?>
