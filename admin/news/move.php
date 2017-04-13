<?php
session_start();
if(!($_SESSION['login'] === True) || $_SESSION['newstoken'] != $_GET['token']) die();
$denewsfile = json_decode(file_get_contents("../../content/news/newsde-de.json"));
$ennewsfile = json_decode(file_get_contents("../../content/news/newsen-en.json"));
moveElement($denewsfile,$_GET['index'],$_GET['index'] - $_GET['shift']);
moveElement($ennewsfile,$_GET['index'],$_GET['index'] - $_GET['shift']);
file_put_contents("../../content/news/newsde-de.json",json_encode($denewsfile));
file_put_contents("../../content/news/newsen-en.json",json_encode($ennewsfile));
function moveElement(&$array, $a, $b) {
	if($a < 0 || $b < 0 || $a >= sizeof($array) || $b >= sizeof($array)) return;    
$out = array_splice($array, $a, 1);
    array_splice($array, $b, 0, $out);
}
?>
