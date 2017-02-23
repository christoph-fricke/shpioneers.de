<?php
session_start();

if ($_GET['lang']) {
    $_SESSION['lang'] = $_GET['lang'];
}

switch ($_SESSION['lang']) {
    case "en":
        include_once('Pfad_Englisch');
        break;
    case "de":
        include_once('Pfad_Deutsch');
        break;
    default:
        include_once('Pfad_Default');
        break;
}

function setHtmlLang() {
    if ($_SESSION['lang']) {
        echo $_SESSION['lang'];
    } else {
        echo "de";
    }
}
?>