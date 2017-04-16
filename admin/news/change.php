<?php
session_start();

if(!($_SESSION['login'] === True)) die();
if($_GET['index'] >= 0){
$newsde = json_decode(file_get_contents('../../content/news/newsde-de.json'))[$_GET['index']];
$newsen = json_decode(file_get_contents('../../content/news/newsen-en.json'))[$_GET['index']];
}
else{
$newsde = new stdClass();
$newsde -> title = "";
$newsde -> image = "";
$newsde -> date = "";
$newsde -> preview = "";
$newsde -> subtitle = "";
$newsde -> text = "";
$newsen = new stdClass();
$newsen -> title = "";
$newsen -> image = "";
$newsen -> date = "";
$newsen -> preview = "";
$newsen -> subtitle = "";
$newsen -> text = "";
}
$length = 32;
$secure = true;
$_SESSION['newstoken']= bin2hex(openssl_random_pseudo_bytes($length, $secure));
$oneline = "input";
$multline = "textarea";
$returnval = new stdClass();
$returnval -> de = new stdClass();
$returnval -> de -> title = new stdClass();
$returnval -> de -> title -> value = $newsde -> title;
$returnval -> de -> title -> type = $oneline;
$returnval -> de -> preview = new stdClass();
$returnval -> de -> preview -> value = $newsde -> preview;
$returnval -> de -> preview -> type = $multline;
$returnval -> de -> subtitle = new stdClass();
$returnval -> de -> subtitle -> value = $newsde -> subtitle;
$returnval -> de -> subtitle -> type = $multline;
$returnval -> de -> text = new stdClass();
$returnval -> de -> text -> value = $newsde -> text;
$returnval -> de -> text -> type = $multline;
$returnval -> en = new stdClass();
$returnval -> en -> title = new stdClass();
$returnval -> en -> title -> value = $newsen -> title;
$returnval -> en -> title -> type = $oneline;
$returnval -> en -> preview = new stdClass();
$returnval -> en -> preview -> value = $newsen -> preview;
$returnval -> en -> preview -> type = $multline;
$returnval -> en -> subtitle = new stdClass();
$returnval -> en -> subtitle -> value = $newsen -> subtitle;
$returnval -> en -> subtitle -> type = $multline;
$returnval -> en -> text = new stdClass();
$returnval -> en -> text -> value = $newsen -> text;
$returnval -> en -> text -> type = $multline;
$returnval -> meta = new stdClass();
$returnval -> meta -> image = new stdClass();
$returnval -> meta -> image -> value = $newsen -> image;
$returnval -> meta -> image -> type = $oneline;
$returnval -> meta -> date = new stdClass();
$returnval -> meta -> date -> value = $newsen -> date;
$returnval -> meta -> date -> type = $oneline;


$returnval -> token = $_SESSION['newstoken'];
if($_GET['index'] >= 0){
$returnval -> submit = 'news/submit.php';
}
else{
$returnval -> submit = 'news/add.php';
}
echo json_encode($returnval);
?>
