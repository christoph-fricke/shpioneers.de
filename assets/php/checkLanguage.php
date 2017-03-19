<?php
session_start();
    if (isset($_GET['lang'])) {
        $_SESSION['lang'] = $_GET['lang'];
    }
    else {
        $_SESSION['lang'] = "de-de";
    }
    
switch ($_SESSION['lang']) {
        case "en-en":
            include_once('assets/lang/en-en.php');
            break;
        case "de-de":
            include_once('assets/lang/de-de.php');
            break;
        default:
            include_once('assets/lang/en-en.php');
            break;
}

function setHtmlLang() {
    if ($_SESSION['lang']) {
        echo $_SESSION['lang'];
    } else {
        echo "de-de";
    }
}
?>
