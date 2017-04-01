<?php
session_start();
if(!($_SESSION['login'] === True))die();

$length = 32;
$secure = true;
$_SESSION['sponsortoken']= bin2hex(openssl_random_pseudo_bytes($length, $secure));
function printsponsors(){
$sponsors = json_decode(file_get_contents("../../content/sponsors/". $_GET['type'] ."-de-de.json"));
$i = 0;
foreach($sponsors as $sponsor){
	echo '<a href="submit.php?type='.$_GET['type'].'&index='.$i.'">'.$sponsor -> name.'</a>&nbsp<a href="remove.php?type='.$_GET['type'].'&index='.$i++.'&token='.$_SESSION['sponsortoken'].'">Remove</a><br>';
}
}
?>

<!DOCTYPE>
<html>
<body>
<a href="submit.php?type=<?php echo $_GET['type'] ?>&index=-1">Add Sponsor</a><br>
<?php printsponsors() ?>
</body>
</html>
