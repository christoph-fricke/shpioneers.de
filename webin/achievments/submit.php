<?php
session_start();
if(!($_SESSION['login'] === True) || !checktoken()) die();
$list = json_decode(file_get_contents('../../content/achievments/list.json'));
$tounamentde = json_decode(file_get_contents('../../content/achievments/'.$list[$_POST['index']].'/de-de.json'));
$tounamenten = json_decode(file_get_contents('../../content/achievments/'.$list[$_POST['index']].'/en-en.json'));
$percentages =json_decode(file_get_contents('../../content/achievments/'.$list[$_POST['index']].'/data.json'));
$percentagesnames = json_decode(file_get_contents('../../content/achievments/percentage-list-en-en.json'));
for($i = 0; $i < sizeof($percentagesnames) ; $i++){
$percentages -> percentage[$i] -> value = $_POST[$percentagesnames[$i] -> name];
}
$percentages -> img = $_POST['img'];
$percentages -> place = $_POST['place'];
$tounamentde -> name =  $_POST['dename'];
$tounamentde -> title =  $_POST['detitle'];
$tounamentde -> location =  $_POST['delocation'];
$tounamentde -> text =  $_POST['detext'];
$tounamentde -> car = $_POST['decar'];
$tounamentde -> cartext = $_POST['decartext'];


$tounamenten -> name =  $_POST['enname'];
$tounamenten -> title =  $_POST['entitle'];
$tounamenten -> location =  $_POST['enlocation'];
$tounamenten -> text =  $_POST['entext'];
$tounamenten -> car = $_POST['encar'];
$tounamenten -> cartext = $_POST['encartext'];
file_put_contents('../../content/achievments/'.$list[$_POST['index']].'/de-de.json',json_encode($tounamentde))
file_put_contents('../../content/achievments/'.$list[$_POST['index']].'/en-en.json',json_encode($tounamenten))
file_put_contents('../../content/achievments/'.$list[$_POST['index']].'/data.json',json_encode($percentages))
function checktoken(){
return $_POST['token'] == $_SESSION['achievtoken'];
}
?>
