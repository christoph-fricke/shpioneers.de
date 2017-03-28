<?php
error_reporting(E_ALL); 
session_start();
if(!($_SESSION['login'] === True)||!checktoken()) die();
$pathtonews = "../../content/news/news". $_POST['lang']. "-" .$_POST['lang'].".json";
$newsfile = json_decode(file_get_contents($pathtonews));
if($_POST['index']>= 0){
	$newsfile[$_POST['index']] -> title = $_POST['title'];
	$newsfile[$_POST['index']] -> date = $_POST['date'];
	$newsfile[$_POST['index']] -> subtitle = $_POST['subtitle'];
	$newsfile[$_POST['index']] -> preview = $_POST['preview'];
	$newsfile[$_POST['index']] -> text = $_POST['text'];
	$newsfile[$_POST['index']] -> image = $_POST['image'];
}
else{
	$news -> title = $_POST['title'];
	$news -> date = $_POST['date'];
	$news -> subtitle = $_POST['subtitle'];
	$news -> preview = $_POST['preview'];
	$news -> text = $_POST['text'];
	$news -> image = $_POST['image'];
	array_insert($newsfile,$news);	
	add_other_lang();
}
var_dump($newsfile);
$f = fopen($pathtonews,"w+");
if( fwrite($f,json_encode($newsfile)) ===FALSE) echo 'Fehler_ vermutlich permissions';
fclose($f);
function checktoken(){
//TODO check token
return True;
}
function array_insert(&$array,$object){
for($i = sizeof($array);$i > 0; $i-- ){
	$array[$i] = $array[$i -1];
}
$array[0] = $object;
}
?>
