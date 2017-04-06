<?php
session_start();
if(!($_SESSION['login'] === True)) die();
function printmembers(){
	$length = 32;
	$secure = true;
	$_SESSION['teamtoken'] = bin2hex(openssl_random_pseudo_bytes($length, $secure));
	$team = json_decode(file_get_contents("../../content/team/team-en-en.json"));
	$i = 0;
	foreach($team as $mem){
		echo'<a href="change.php?index='.$i.'">'.$mem -> name .'</a>&nbsp<a href="remove.php?index='.$i++.'&token='.$_SESSION['teamtoken'].'">Remove</a><br>';
	}
}
?>
<!DOCTYPE>
<html>
<body>
<a href="change.php?index=-1">Add member</a>
<br>
<?php printmembers() ?>
<p>Proident tempor laboris pariatur dolore amet enim. Laboris anim cupidatat elit nisi velit nulla tempor officia ea consequat nulla minim in. Commodo pariatur sit aliqua do. Officia ut aute proident nostrud nostrud anim adipisicing ullamco veniam tempor. Nulla amet laboris fugiat occaecat velit reprehenderit exercitation mollit.</p>
</body>
</html>
