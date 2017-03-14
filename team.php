<?php
session_start();
if(!isset($_SESSION['lang'])){
$_SESSION['lang'] = "de-de";
}
var_dump(getmembers());
function getmembers()
{
return json_decode(file_get_contents("content/team/team-". $_SESSION['lang'] . ".json"));
}
?>
