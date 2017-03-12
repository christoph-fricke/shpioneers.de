<?php
session_start();
if(!isset($_SESSION['lang'])) $_SESSION['lang'] = "de-de";
var_dump(getdata('finance'));
function getdata($type){
return json_decode(file_get_contents("content/sponsors/". $type ."-". $_SESSION['lang']. ".json"));
}
?>
