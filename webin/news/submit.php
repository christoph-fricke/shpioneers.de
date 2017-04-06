<?php
error_reporting(E_ALL); 
session_start();
if(!($_SESSION['login'] === True)||!checktoken()) die();
$denewsfile = json_decode(file_get_contents("../../content/news/newsde-de.json"));
$ennewsfile = json_decode(file_get_contents("../../content/news/newsen-en.json"));
if($_POST['index']>= 0){
	$denewsfile[$_POST['index']] -> title = $_POST['detitle'];
	$denewsfile[$_POST['index']] -> date = $_POST['date'];
	$denewsfile[$_POST['index']] -> subtitle  = $_POST['desubtitle'];
	$denewsfile[$_POST['index']] -> preview  = $_POST['depreview'];
	$denewsfile[$_POST['index']] -> image   = $_POST['image'];
	$denewsfile[$_POST['index']] -> text   = $_POST['detext'];
	$ennewsfile[$_POST['index']] -> title = $_POST['entitle'];
	$ennewsfile[$_POST['index']] -> date = $_POST['date'];
	$ennewsfile[$_POST['index']] -> subtitle  = $_POST['ensubtitle'];
	$ennewsfile[$_POST['index']] -> preview  = $_POST['enpreview'];
	$ennewsfile[$_POST['index']] -> image   = $_POST['image'];
	$ennewsfile[$_POST['index']] -> text   = $_POST['entext'];
}
else{
	$denews -> title = $_POST['detitle'];
	$denews -> date = $_POST['date'];
	$denews -> subtitle  = $_POST['desubtitle'];
	$denews -> preview  = $_POST['depreview'];
	$denews -> image   = $_POST['image'];
	$denews -> text   = $_POST['detext'];
	$ennews -> title = $_POST['entitle'];
	$ennews -> date = $_POST['date'];
	$ennews -> subtitle  = $_POST['ensubtitle'];
	$ennews -> preview  = $_POST['enpreview'];
	$ennews -> image   = $_POST['image'];
	$ennews -> text   = $_POST['entext'];
	array_insert($denewsfile,$denews);
	array_insert($ennewsfile,$ennews);
		
}
if($_POST['index'] != $_POST['indexto'] && $_POST['index'] >= 0){
	moveElement($denewsfile,$_POST['index'],$_POST['indexto']);	
	moveElement($ennewsfile,$_POST['index'],$_POST['indexto']);	
}
file_put_contents("../../content/news/newsde-de.json",json_encode($denewsfile));
file_put_contents("../../content/news/newsen-en.json",json_encode($ennewsfile));
function checktoken(){
return $_POST['token'] == $_SESSION['newstoken'];
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
