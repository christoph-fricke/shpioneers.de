<?php
session_start();
if(!($_SESSION['login'] === True)) die();
$length = 32;
$secure = true;
$_SESSION['achievtoken'] = bin2hex(openssl_random_pseudo_bytes($length, $secure));
function printachiev(){
	$list = json_decode(file_get_contents('../../content/achievments/list.json'));	
	$i = 0;
	foreach($list as $tour){
		$tourname = json_decode(file_get_contents('../../content/achievments/'.$tour.'/en-en.json'));
		echo '<a href="change.php?index='.$i.'">'.$tourname -> title.'</a>&nbsp<a href="remove.php?index='.$i++.'&token='.$_SESSION['achievtoken'].'">Remove</a><br>';
	}
}
?>
<!DOCTYPE>
<html>
<body>
<a href="change.php?index=-1">Add Achievement</a><br>
<?php printachiev() ?>
</body>
</html>
