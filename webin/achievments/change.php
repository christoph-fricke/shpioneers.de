<?php
session_start();
if(!($_SESSION['login'] === True)) die();
$length = 32;
$secure = true;
$_SESSION['achievtoken'] = bin2hex(openssl_random_pseudo_bytes($length, $secure));
$list = json_decode(file_get_contents('../../content/achievments/list.json'));
$percentagesnames = json_decode(file_get_contents('../../content/achievments/percentage-list-en-en.json'));
if($_GET['index'] >= 0){
$tounamentde = json_decode(file_get_contents('../../content/achievments/'.$list[$_GET['index']].'/de-de.json'));
$tounamenten = json_decode(file_get_contents('../../content/achievments/'.$list[$_GET['index']].'/en-en.json'));
$percentages =json_decode(file_get_contents('../../content/achievments/'.$list[$_GET['index']].'/data.json'));
}
else{
$tounamentde = new stdClass();
$tounamentde -> title = "";
$tounamentde -> name = "";
$tounamentde -> location = "";
$tounamentde -> text = "";
$tounamentde -> car = "";
$tounamentde -> cartext = "";
$tounamentde -> trophies = array();
$a = new stdClass();
$a -> name = "";
$tounamentde -> trophies[] = $a ;
$tounamenten = $tounamentde;
$percentages = new stdClass();
$percentages -> img = "";
$percentages -> place = "";
$percentages -> percentage = array();
foreach($percentagesnames as $name){
	$include = new stdClass();
	$include -> value = 0;
	($percentages -> percentage)[]   = $include;
}
}
$oneline = "input";
$multline = "textarea";
$returnval = new stdClass();
$returnval -> de = new stdClass();
$returnval -> de -> title = new stdClass();
$returnval -> de -> title -> value = $tounamentde -> title;
$returnval -> de -> title -> type = $oneline;
$returnval -> de -> name = new stdClass();
$returnval -> de -> name -> value = $tounamentde -> name;
$returnval -> de -> name -> type = $oneline;
$returnval -> de -> location = new stdClass();
$returnval -> de -> location -> value = $tounamentde -> location;
$returnval -> de -> location -> type = $oneline;
$returnval -> de -> text = new stdClass();
$returnval -> de -> text -> value = $tounamentde -> text;
$returnval -> de -> text -> type = $multline;
$returnval -> de -> car = new stdClass();
$returnval -> de -> car -> value = $tounamentde -> car;
$returnval -> de -> car -> type = $oneline;
$returnval -> de -> cartext = new stdClass();
$returnval -> de -> cartext -> value = $tounamentde -> cartext;
$returnval -> de -> cartext -> type = $multline;
$returnval -> de -> trophies = new stdClass();
$returnval -> de -> trophies -> value = trophies($tounamentde);
$returnval -> de -> trophies -> type = $oneline;

$returnval -> en = new stdClass();
$returnval -> en -> title = new stdClass();
$returnval -> en -> title -> value = $tounamenten -> title;
$returnval -> en -> title -> type = $oneline;
$returnval -> en -> name = new stdClass();
$returnval -> en -> name -> value = $tounamenten -> name;
$returnval -> en -> name -> type = $oneline;
$returnval -> en -> location = new stdClass();
$returnval -> en -> location -> value = $tounamenten -> location;
$returnval -> en -> location -> type = $oneline;
$returnval -> en -> text = new stdClass();
$returnval -> en -> text -> value = $tounamenten -> text;
$returnval -> en -> text -> type = $multline;
$returnval -> en -> car = new stdClass();
$returnval -> en -> car -> value = $tounamenten -> car;
$returnval -> en -> car -> type = $oneline;
$returnval -> en -> cartext = new stdClass();
$returnval -> en -> cartext -> value = $tounamenten -> cartext;
$returnval -> en -> cartext -> type = $multline;
$returnval -> en -> trophies = new stdClass();
$returnval -> en -> trophies -> value = trophies($tounamenten);
$returnval -> en -> trophies -> type = $oneline;
// i will add the percentages in the english part so the show up at the bottom of the page
// i know it is not the most beautifull solution but it cuts back on the work requiered
$i = 0;
foreach($percentagesnames as $nameob){
$name = $nameob -> name;
$returnval -> en -> $name = new stdClass();
$returnval -> en -> $name -> value = ($percentages -> percentage)[$i] -> value;
$returnval -> en -> $name -> type = "number";
$i++;
}
$returnval -> en -> place = new stdClass();
$returnval -> en -> place -> value = $percentages -> place;
$returnval -> en -> place -> type = $oneline;
$returnval -> en -> img = new stdClass();
$returnval -> en -> img -> value = $percentages -> img;
$returnval -> en -> img -> type = $oneline;
//
$returnval -> token = $_SESSION['achievtoken'];
if($_GET['index'] >= 0){
	$returnval -> submit = 'achievments/submit.php';
}
else{
$returnval -> submit = 'achievments/add.php';
}
echo json_encode($returnval);
function trophies($file){
$list = array();
foreach($file -> trophies as $trophie){
$list[] = $trophie -> name;
}
return implode(',',$list);
}
?>

