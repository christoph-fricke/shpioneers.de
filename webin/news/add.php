<?php
$allnewsde = json_decode(file_get_contents('../../content/news/newsde-de.json'));
$allnewsen = json_decode(file_get_contents('../../content/news/newsen-en.json'));
$newsde = new stdClass();
$newsde -> title = $_POST['detitle'];
$newsde -> image = $_POST['metaimage'];
$newsde -> date = $_POST['dedate'];
$newsde -> preview = $_POST['depreview'];
$newsde -> subtitle = $_POST['desubtitle'];
$newsde -> text = $_POST['detext'];
$newsen = new stdClass();
$newsen -> title = $_POST['entitle'];
$newsen -> image = $_POST['metaimage'];
$newsen -> date = $_POST['endate'];
$newsen -> preview = $_POST['enpreview'];
$newsen -> subtitle = $_POST['ensubtitle'];
$newsen -> text = $_POST['entext'];
array_insert($allnewsde,$newsde);
array_insert($allnewsen,$newsen);
if(file_put_contents('../../content/news/newsde-de.json', json_encode($allnewsde))> 0 && file_put_contents('../../content/news/newsen-en.json', json_encode($allnewsen)) > 0) echo 'suc';
else echo 'noc';



function array_insert(&$array,$object){
for($i = sizeof($array);$i > 0; $i-- ){
	$array[$i] = $array[$i -1];
}
$array[0] = $object;
}
?>
