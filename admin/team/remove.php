<?php
session_start();
if(!($_SESSION['login'] === True) || $_SESSION['teamtoken'] != $_GET['token']) die();
$deteam = json_decode(file_get_contents("../../content/team/team-de-de.json"));
$enteam = json_decode(file_get_contents("../../content/team/team-en-en.json"));
array_splice($deteam,$_GET['index'],1);
array_splice($enteam,$_GET['index'],1);
file_put_contents("../../content/team/team-de-de.json",json_encode($deteam));
file_put_contents("../../content/team/team-en-en.json",json_encode($enteam));
?>
