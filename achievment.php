<?php
session_start();
if(!isset($_SESSION['lang']) || !($_SESSION['lang'] == "de-de" || $_SESSION['lang'] == "en-en")){
$_SESSION['lang'] = "de-de";
}

$h = getcontent(0);
echo $h[0] -> title;
echo $h[1][0] -> name;
echo $h[2][0] -> value;


function getcontent($id){
/*
returns an array with the relevant data
0: languagespecific text and special achievments
1: languagespecific names of percentages
2: languageindepent values for percentages
*/
$name = "";
$rvalue = array();
switch($id){
case 0: $name = "dm-2016";
default: $name = "dm-2016";
}
$rvalue[] = json_decode(file_get_contents('content/achievments/'. $name .'/'. $_SESSION['lang'].".json"));
$rvalue[] = json_decode(file_get_contents('content/achievments/percentage-list-'. $_SESSION['lang']. ".json"));
$rvalue[] = json_decode(file_get_contents('content/achievments/'. $name . "/data.json"));
return $rvalue;
}
?>
