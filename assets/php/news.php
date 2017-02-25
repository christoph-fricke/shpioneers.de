<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
// this was debugging although the php doesnt show syntx errors
    session_start();
    if(!isset($_SESSION['lang'])){
        $_SESSION['lang'] = "de-de";
    }
    if($_SESSION['lang'] == "de-de"){
        $String = file_get_contents('localhost/content/news/newsde-de.json');
    }
    else{
        $String = file_get_contents('localhost/content/news/newsen-en.json');
    }
    // choosing the language specific news data
    $news = json_decode($String)  ;
// usage of the json file 
// $json[index] -> property
?>
