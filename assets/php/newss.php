<?php
// i am right now just resposible for setting constants
// someone else can use them to create the user interface and the layout for this page
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
//session_start();
if(!isset($_SESSION['lang'])) $_SESSION['lang'] = 'de-de'; //external links may not have visited before
if($_SESSION['lang'] == "de-de") $String = file_get_contents('../../content/news/newsde-de.json');
else $String = file_get_contents('../../content/news/newsen-en.json');
    $json = json_decode($String)[intval($_GET['ind'])];
define('TITLE',$json -> title);
define('TEXT', $json -> text);
define('DATES',date("D, j.M.y",intval($json -> {'date'})));
define('IMG',$json -> image);
//echo TITLE.'\n';
//echo TEXT.'\n';
//echo DATES.'\n';
//echo IMG.'\n';

?>