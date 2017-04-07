<?php
session_start();
if(!($_SESSION['login'] === True)||!checktoken()){
	echo 'noc';
 die();
}
$deteam = json_decode(file_get_contents("../../content/team/team-de-de.json"));
$enteam = json_decode(file_get_contents("../../content/team/team-en-en.json"));
$deteam[$_POST['index']] -> name = $_POST['dename'];
$deteam[$_POST['index']] -> job = $_POST['dejob'];
$deteam[$_POST['index']] -> quote = $_POST['dequote'];
$deteam[$_POST['index']] -> quotee = $_POST['dequotee'];
$deteam[$_POST['index']] -> text = $_POST['detext'];
$deteam[$_POST['index']] -> img = $_POST['deimg'];
$enteam[$_POST['index']] -> name = $_POST['enname'];
$enteam[$_POST['index']] -> job = $_POST['enjob'];
$enteam[$_POST['index']] -> quote = $_POST['enquote'];
$enteam[$_POST['index']] -> quotee = $_POST['enquotee'];
$enteam[$_POST['index']] -> text = $_POST['entext'];
$enteam[$_POST['index']] -> img = $_POST['enimg'];

file_put_contents("../../content/team/team-de-de.json", json_encode($deteam));
file_put_contents("../../content/team/team-en-en.json", json_encode($enteam));
echo 'suc';
function checktoken(){
return $_POST['token'] == $_SESSION['teamtoken'];
}
function array_insert(&$array,$object){
for($i = sizeof($array);$i > 0; $i-- ){
	$array[$i] = $array[$i -1];
}
$array[0] = $object;
}
function moveElement(&$array, $a, $b) {
    $out = array_splice($array, $a, 1);
    array_splice($array, $b, 0, $out);
}
?>
