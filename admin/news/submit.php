<?php
session_start();
if(!($_SESSION['login'] === True)||!checktoken()) die();
$denewsfile = json_decode(file_get_contents("../../content/news/newsde-de.json"));
$ennewsfile = json_decode(file_get_contents("../../content/news/newsen-en.json"));
$denewsfile[$_POST['index']] -> title = $_POST['detitle'];
$denewsfile[$_POST['index']] -> date = $_POST['metadate'];
$denewsfile[$_POST['index']] -> subtitle  = $_POST['desubtitle'];
$denewsfile[$_POST['index']] -> preview  = $_POST['depreview'];
$denewsfile[$_POST['index']] -> image   = $_POST['metaimage'];
$denewsfile[$_POST['index']] -> text   = $_POST['detext'];
$ennewsfile[$_POST['index']] -> title = $_POST['entitle'];
$ennewsfile[$_POST['index']] -> date = $_POST['metadate'];
$ennewsfile[$_POST['index']] -> subtitle  = $_POST['ensubtitle'];
$ennewsfile[$_POST['index']] -> preview  = $_POST['enpreview'];
$ennewsfile[$_POST['index']] -> image   = $_POST['metaimage'];
$ennewsfile[$_POST['index']] -> text   = $_POST['entext'];
file_put_contents("../../content/news/newsde-de.json",json_encode($denewsfile));
file_put_contents("../../content/news/newsen-en.json",json_encode($ennewsfile));
echo 'suc';
function checktoken(){
return $_POST['token'] == $_SESSION['newstoken'];
}
?>
