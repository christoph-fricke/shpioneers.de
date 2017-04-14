<?php
session_start();
if(!($_SESSION['login'] === True)||!checktoken()){
	echo 'noc';
 die();
}
$list = json_decode(file_get_contents('../../content/achievments/list.json'));
$percentagesnames = json_decode(file_get_contents('../../content/achievments/percentage-list-en-en.json'));
$tounamentde = json_decode(file_get_contents('../../content/achievments/'.$list[$_POST['index']].'/de-de.json'));
$tounamenten = json_decode(file_get_contents('../../content/achievments/'.$list[$_POST['index']].'/en-en.json'));
$percentages =json_decode(file_get_contents('../../content/achievments/'.$list[$_POST['index']].'/data.json'));
$tounamentde -> title = $_POST['detitle'];
$tounamentde -> name = $_POST['dename'];
$tounamentde -> location = $_POST['delocation'];
$tounamentde -> text = $_POST['detext'];
$tounamentde -> car = $_POST['decar'];
$tounamentde -> cartext = $_POST['decartext'];
$array = array();
foreach(explode(',',$_POST['detrophies']) as $trophie){
$newElement = new stdClass();
$newElement -> name = $trophie;
$array[] = $newElement;
}
$tounamentde -> trophies = $array;

$tounamenten -> title = $_POST['entitle'];
$tounamenten -> name = $_POST['enname'];
$tounamenten -> location = $_POST['enlocation'];
$tounamenten -> text = $_POST['entext'];
$tounamenten -> car = $_POST['encar'];
$tounamenten -> cartext = $_POST['encartext'];
$array = array();
foreach(explode(',',$_POST['entrophies']) as $trophie){
$newElement = new stdClass();
$newElement -> name = $trophie;
$array[] = $newElement;
}
$tounamenten -> trophies = $array;
$percentages -> place = $_POST['metaplace']; 
$percentages -> img = $_POST['metaimg'];
$i = 0;
$percent = array();
foreach($percentagesnames as $nameob){
$name = $nameob -> name;
$newElement = new stdClass();
$newElement -> value= $_POST['meta'. str_replace(" ", "_" ,$name)];
$percent[] = $newElement;
}
$percentages -> percentage = $percent;
file_put_contents('../../content/achievments/'.$list[$_POST['index']].'/data.json',json_encode( $percentages));
file_put_contents('../../content/achievments/'.$list[$_POST['index']].'/de-de.json',json_encode( $tounamentde));
file_put_contents('../../content/achievments/'.$list[$_POST['index']].'/en-en.json',json_encode( $tounamenten));
echo 'suc';
function checktoken(){
return $_POST['token'] == $_SESSION['achievtoken'];
}
?>
