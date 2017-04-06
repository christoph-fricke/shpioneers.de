<?php
session_start();
if(!($_SESSION['login'] === True) || !($_GET['token'] == $_SESSION['newstoken'])) die();
$_SESSION['newstoken'] = "";
$denewsfile = json_decode(file_get_contents("../../content/news/newsde-de.json"));
$ennewsfile = json_decode(file_get_contents("../../content/news/newsen-en.json"));
array_splice($denewsfile,$_GET['index'],1);
array_splice($ennewsfile,$_GET['index'],1);
file_put_contents("../../content/news/newsde-de.json",json_encode($denewsfile));
file_put_contents("../../content/news/newsen-en.json",json_encode($ennewsfile));
?>
