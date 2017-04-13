<?php
session_start();
//if(!($_SESSION['login'] === True)||!checktoken()) die();

$desponsor= json_decode(file_get_contents('../../content/sponsors/'.$_POST['type'].'-de-de.json'));
$ensponsor= json_decode(file_get_contents('../../content/sponsors/'.$_POST['type'].'-en-en.json'));
if($_POST['index']>=0){
	$desponsor[$_POST['index']] -> name = $_POST['name'];
	$desponsor[$_POST['index']] -> img = $_POST['img'];
	$desponsor[$_POST['index']] -> email = $_POST['email'];
	$desponsor[$_POST['index']] -> web = $_POST['web'];
	$desponsor[$_POST['index']] -> text = $_POST['detext'];
	
	$ensponsor[$_POST['index']] -> name = $_POST['name'];
	$ensponsor[$_POST['index']] -> img = $_POST['img'];
	$ensponsor[$_POST['index']] -> email = $_POST['email'];
	$ensponsor[$_POST['index']] -> web = $_POST['web'];
	$ensponsor[$_POST['index']] -> text = $_POST['entext'];
	
}
else{
	$denew -> name = $_POST['name'];
	$denew -> img = $_POST['img'];
	$denew -> email = $_POST['email'];
	$denew -> web = $_POST['web'];
	$denew -> text = $_POST['detext'];
	
	$ennew -> name = $_POST['name'];
	$ennew -> img = $_POST['img'];
	$ennew -> email = $_POST['email'];
	$ennew -> web = $_POST['web'];
	$ennew -> text = $_POST['entext'];
	array_insert($desponsor,$denew);
	array_insert($ensponsor,$ennew);
}
if($_POST['index'] != $_POST['indexto'] && $_POST['index'] >= 0){
	moveElement($desponsor, $_POST['index'], $_POST['indexto']);	
	moveElement($ensponsor, $_POST['index'], $_POST['indexto']);	
}
var_dump($ensponsor);
file_put_contents('../../content/sponsors/'.$_POST['type'].'-de-de.json',json_encode($desponsor));
file_put_contents('../../content/sponsors/'.$_POST['type'].'-en-en.json',json_encode($ensponsor));
function moveElement(&$array, $a, $b) {
    $out = array_splice($array, $a, 1);
    array_splice($array, $b, 0, $out);
}
function array_insert(&$array,$object){
for($i = sizeof($array);$i > 0; $i-- ){
	$array[$i] = $array[$i -1];
}
$array[0] = $object;
}
function checktoken(){
return $_POST['token'] == $_SESSION['sponsortoken'];
}
?>
