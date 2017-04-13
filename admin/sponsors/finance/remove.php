<?php
session_start();
if(!($_SESSION['login'] === True) || $_SESSION['sponsortoken'] != $_GET['token']) die();
$desponsors = json_decode(file_get_contents("../../../content/sponsors/finance-de-de.json"));
$ensponsors = json_decode(file_get_contents("../../../content/sponsors/finance-en-en.json"));
array_splice($desponsors,$_GET['index'],1);
array_splice($ensponsors,$_GET['index'],1);
file_put_contents("../../../content/sponsors/finance-de-de.json",json_encode($desponsors));
file_put_contents("../../../content/sponsors/finance-en-en.json",json_encode($ensponsors));
?>
