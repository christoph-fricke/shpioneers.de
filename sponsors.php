<?php
session_start();
if(!isset($_SESSION['lang'])) $_SESSION['lang'] = "de-de";
var_dump(getdata($_GET['type']));
function getdata($type){
if(!file_exists("content/sponsors/". $type ."-". $_SESSION['lang']. ".json")) die();
return json_decode(file_get_contents("content/sponsors/". $type ."-". $_SESSION['lang']. ".json"));
}
?>
