<?php
error_reporting(E_ALL); 
session_start();
if(!($_SESSION['login'] === True)||checktoken()) die();
$pathtonews = "../../content/news/news". $_POST['lang']. "-" .$_POST['lang'].".json";
$newsfile = json_decode(file_get_contents($pathtonews));
$newsfile[$_POST['index']] -> title = $_POST['title'];
$newsfile[$_POST['index']] -> date = $_POST['date'];
$newsfile[$_POST['index']] -> subtitle = $_POST['subtitle'];
$newsfile[$_POST['index']] -> preview = $_POST['preview'];
$newsfile[$_POST['index']] -> text = $_POST['text'];
$newsfile[$_POST['index']] -> image = $_POST['image'];
$f = fopen($pathtonews,"w+");
if( fwrite($f,json_encode($newsfile)) ===FALSE) echo 'Fehler_ vermutlich permissions';
fclose($f);
function checktoken(){
//TODO check token
return True;
}
?>
