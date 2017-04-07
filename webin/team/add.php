<?php
$deteam = json_decode(file_get_contents("../../content/team/team-de-de.json"));
$enteam = json_decode(file_get_contents("../../content/team/team-en-en.json"));
$demem = new stdClass();
$enmem = new stdClass();
$demem -> name = $_POST['dename'];
$demem -> job = $_POST['dejob'];
$demem -> quote = $_POST['dequote'];
$demem -> quotee = $_POST['dequotee'];
$demem -> text = $_POST['detext'];
$demem -> img = $_POST['deimg'];
$enmem -> name = $_POST['enname'];
$enmem -> job = $_POST['enjob'];
$enmem -> quote = $_POST['enquote'];
$enmem -> quotee = $_POST['enquotee'];
$enmem -> text = $_POST['entext'];
$enmem -> img = $_POST['enimg'];
array_insert($deteam,$demem);
array_insert($enteam,$enmem);
if(file_put_contents("../../content/team/team-de-de.json", json_encode($deteam))> 0 && file_put_contents("../../content/team/team-en-en.json", json_encode($enteam)) > 0) echo 'suc';
else echo 'noc';



function array_insert(&$array,$object){
for($i = sizeof($array);$i > 0; $i-- ){
	$array[$i] = $array[$i -1];
}
$array[0] = $object;
}
?>
