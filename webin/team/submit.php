<?php
session_start();
if(!($_SESSION['login'] === True)||!checktoken()) die();
$deteam = json_decode(file_get_contents("../../content/team/team-de-de.json"));
$enteam = json_decode(file_get_contents("../../content/team/team-en-en.json"));
if($_POST['index']>= 0){
	$deteam[$_POST['index']] -> name = $_POST['name'];
	$deteam[$_POST['index']] -> job = $_POST['dejob'];
	$deteam[$_POST['index']] -> quote  = $_POST['dequote'];
	$deteam[$_POST['index']] -> quotee  = $_POST['quotee'];
	$deteam[$_POST['index']] -> text  = $_POST['detext'];
	$deteam[$_POST['index']] -> img  = $_POST['img'];
	//----------------------------------------------
	$enteam[$_POST['index']] -> name = $_POST['name'];
	$enteam[$_POST['index']] -> job = $_POST['enjob'];
	$enteam[$_POST['index']] -> quote  = $_POST['enquote'];
	$enteam[$_POST['index']] -> quotee  = $_POST['quotee'];
	$enteam[$_POST['index']] -> text  = $_POST['entext'];
	$enteam[$_POST['index']] -> img  = $_POST['img'];
}
else{
	$demem -> name = $_POST['name'];
	$demem -> job = $_POST['dejob'];
	$demem -> quote  = $_POST['dequote'];
	$demem -> quotee  = $_POST['quotee'];
	$demem -> text  = $_POST['detext'];
	$demem -> img  = $_POST['img'];
	//----------------------------------------------
	$enmem -> name = $_POST['name'];
	$enmem -> job = $_POST['enjob'];
	$enmem -> quote  = $_POST['enquote'];
	$enmem -> quotee  = $_POST['quotee'];
	$enmem -> text  = $_POST['entext'];
	$enmem -> img  = $_POST['img'];
	array_insert($deteam,$demem);
	array_insert($enteam,$enmem);
}
if($_POST['index'] != $_POST['indexto'] && $_POST['index'] >= 0){
	moveElement($deteam,$_POST['index'],$_POST['indexto']);
	moveElement($enteam,$_POST['index'],$_POST['indexto']);
}
file_put_contents("../../content/team/team-de-de.json", json_encode($deteam));
file_put_contents("../../content/team/team-en-en.json", json_encode($enteam));
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
