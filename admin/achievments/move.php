<?php
session_start();
if(!($_SESSION['login'] === True) || $_SESSION['achievtoken'] != $_GET['token']) die();
$list = json_decode(file_get_contents('../../content/achievments/list.json'));
moveElement($list,$_GET['index'],$_GET['index'] - $_GET['shift']);
file_put_contents('../../content/achievments/list.json',json_encode($list));
function moveElement(&$array, $a, $b) {
	if($a < 0 || $b < 0 || $a >= sizeof($array) || $b >= sizeof($array)) return;    
$out = array_splice($array, $a, 1);
    array_splice($array, $b, 0, $out);
}
?>
