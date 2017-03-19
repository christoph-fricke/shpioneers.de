<?php
if(!isset($_SESSION['lang']) || !($_SESSION['lang'] == "de-de" || $_SESSION['lang'] == "en-en")){
$_SESSION['lang'] = "de-de";
}
function getcontent($id){
/*
returns an array with the relevant data
0: languagespecific text and special achievments
1: languagespecific names of percentages
2: languageindepent values for percentages
*/
$name = "";
$rvalue = array();
$index = json_decode(file_get_contents(PATH_TO_ROOT . 'content/achievments/list.json'));
if(!isset($index[$id])) $name = $index[0];
else $name = $index[$id];
$rvalue[] = json_decode(file_get_contents(PATH_TO_ROOT . 'content/achievments/'. $name .'/'. $_SESSION['lang'].".json"));
$rvalue[] = json_decode(file_get_contents(PATH_TO_ROOT . 'content/achievments/percentage-list-'. $_SESSION['lang']. ".json"));
$rvalue[] = json_decode(file_get_contents(PATH_TO_ROOT . 'content/achievments/'. $name . "/data.json"));
return $rvalue;
}
?>
