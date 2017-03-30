<?php
session_start();
if(!($_SESSION['login'] === True)) die();
function printmembers(){
	$team = json_decode(file_get_contents("../../content/team/team-en-en.json"));
	$i = 0;
	foreach($team as $mem){
		echo '<a href="change.php?index='.$i.'">'.$mem -> name .'</a>&nbsp<a href="remove.php?index='.$i++.'">Remove</a><br>';
	}
}
?>
<!DOCTYPE>
<html>
<body>
<a href="change.php?index=-1">Add member</a>
<br>
<?php printmembers() ?>
</body>
</html>
