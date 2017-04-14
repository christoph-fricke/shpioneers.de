<?php
session_start();
if(!($_SESSION['login'] === True)) die();
if($_GET['index'] >= 0){
$demember = json_decode(file_get_contents('../../content/team/team-de-de.json'))[$_GET['index']];
$enmember = json_decode(file_get_contents('../../content/team/team-en-en.json'))[$_GET['index']];
}
else{
$demember = new stdClass();
$demember -> name = "";
$demember -> job = "";
$demember -> quote = "";
$demember -> quotee = "";
$demember -> text = "";
$demember -> img = "";
$enmember = new stdClass();
$enmember -> name = "";
$enmember -> job = "";
$enmember -> quote = "";
$enmember -> quotee = "";
$enmember -> text = "";
$enmember -> img = "";
}
$length = 32;
$secure = true;
$_SESSION['teamtoken'] = bin2hex(openssl_random_pseudo_bytes($length, $secure));
$oneline = "input";
$multline = "textarea";
$returnval = new stdClass();
$returnval  -> de = new stdClass();
$returnval  -> de -> job= new stdClass();
$returnval -> de -> job -> value = $demember -> job;
$returnval -> de -> job -> type = $oneline;
$returnval  -> de -> quote= new stdClass();
$returnval -> de -> quote -> value = $demember -> quote;
$returnval -> de -> quote -> type = $multline;
$returnval  -> de -> quotee= new stdClass();
$returnval -> de -> quotee -> value = $demember -> quotee;
$returnval -> de -> quotee -> type = $oneline;
$returnval  -> de -> text= new stdClass();
$returnval -> de -> text -> value = $demember -> text;
$returnval -> de -> text -> type = $multline;
$returnval  -> de -> img= new stdClass();
$returnval -> en = new stdClass();
$returnval -> en -> job = new stdClass();
$returnval -> en -> job -> value = $enmember -> job;
$returnval -> en -> job -> type = $oneline;
$returnval  -> en -> quote = new stdClass();
$returnval -> en -> quote -> value = $enmember -> quote;
$returnval -> en -> quote -> type = $multline;
$returnval  -> en -> quotee = new stdClass();
$returnval -> en -> quotee -> value = $enmember -> quotee;
$returnval -> en -> quotee -> type = $oneline;
$returnval  -> en -> text = new stdClass();
$returnval -> en -> text -> value = $enmember -> text;
$returnval -> en -> text -> type = $multline;
$returnval -> meta = new stdClass();
$returnval -> meta -> name = new stdClass();
$returnval -> meta -> name -> value = $demember -> name;
$returnval -> meta -> name -> type = $oneline;
$returnval -> meta -> img = new stdClass();
$returnval -> meta -> img -> value = $demember -> img;
$returnval -> meta -> img -> type = $oneline;

$returnval -> token = $_SESSION['teamtoken'];

if($_GET['index'] >= 0){
$returnval -> submit = 'team/submit.php';
}
else{
$returnval -> submit = 'team/add.php';
}
echo json_encode($returnval);
?>

