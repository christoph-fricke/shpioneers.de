<?php
session_start();
if(!($_SESSION['login'] === True)||!checktoken()){
	echo 'noc';
 die();
}
$list = json_decode(file_get_contents('../../content/achievments/list.json'));
exec('mkdir ../../content/achievments/'. sizeof($list));
array_insert($list,sizeof($list));
file_put_contents('../../content/achievments/list.json',json_encode($list));
$_POST['index'] = 0;
$percentagesnames = json_decode(file_get_contents('../../content/achievments/percentage-list-en-en.json'));
$newAchievde = new stdClass();
$newAchievde -> title = $_POST['detitle'];
$newAchievde -> name = $_POST['dename'];
$newAchievde -> location = $_POST['delocation'];
$newAchievde -> text = $_POST['detext'];
$newAchievde -> car = $_POST['decar'];
$newAchievde -> cartext = $_POST['decartext'];
$array = array();
foreach(explode(',',$_POST['detrophies']) as $trophie){
$newElement = new stdClass();
$newElement -> name = $trophie;
$array[] = $newElement;
}
$newAchievde -> trophies = $array;

$newAchieven = new stdClass();
$newAchieven -> title = $_POST['entitle'];
$newAchieven -> name = $_POST['enname'];
$newAchieven -> location = $_POST['enlocation'];
$newAchieven -> text = $_POST['entext'];
$newAchieven -> car = $_POST['encar'];
$newAchieven -> cartext = $_POST['encartext'];
$array = array();
foreach(explode(',',$_POST['entrophies']) as $trophie){
$newElement = new stdClass();
$newElement -> name = $trophie;
$array[] = $newElement;
}
$newAchieven -> trophies = $array;
$newdata = new stdClass();
$newdata -> place = $_POST['metaplace'];
$newdata -> img = $_POST['metaimg'];
$newdata -> teamimg = $_POST['metateamimg'];
$i = 0;
$percent = array();
foreach($percentagesnames as $nameob){
$name = $nameob -> name;
$newElement = new stdClass();
$newElement -> value= $_POST['meta'. str_replace(" ", "_" ,$name)];
$percent[] = $newElement;
}
$newdata -> percentage = $percent;
file_put_contents('../../content/achievments/'.$list[$_POST['index']].'/data.json',json_encode( $newdata));
file_put_contents('../../content/achievments/'.$list[$_POST['index']].'/de-de.json',json_encode( $newAchievde));
file_put_contents('../../content/achievments/'.$list[$_POST['index']].'/en-en.json',json_encode( $newAchieven));
echo 'suc';
function checktoken(){
return $_POST['token'] == $_SESSION['achievtoken'];
}function array_insert(&$array,$object){
for($i = sizeof($array);$i > 0; $i-- ){
	$array[$i] = $array[$i -1];
}
$array[0] = $object;
}
?>
