<?php
session_start();
if(!($_SESSION['login'] === True)) die();
$length = 32;
$secure = true;
$_SESSION['achievtoken'] = bin2hex(openssl_random_pseudo_bytes($length, $secure));
$list = json_decode(file_get_contents('../../content/achievments/list.json'));
$tounamentde = json_decode(file_get_contents('../../content/achievments/'.$list[$_GET['index']].'/de-de.json'));
$tounamenten = json_decode(file_get_contents('../../content/achievments/'.$list[$_GET['index']].'/en-en.json'));
$percentages =json_decode(file_get_contents('../../content/achievments/'.$list[$_GET['index']].'/data.json'));
$percentagesnames = json_decode(file_get_contents('../../content/achievments/percentage-list-en-en.json'));
function printpercentages(){
global $percentages, $percentagesnames;
for($i = 0; $i < sizeof($percentagesnames); $i++){
echo '<div>'. $percentagesnames[$i] -> name;
echo '<input type="number" min="0" max="100" value="'.$percentages -> percentage[$i] -> value.'" name="'.$percentagesnames[$i] -> name.'"></div><br>';
}
}
function printtrophies($lang){
global $tounamentde,$tounamenten;
switch($lang){
case "de":
	$active = $tounamentde -> trophies;
	break;
case "en":
	$active = $tounamenten -> trophies;
	break;
default:
	return;
}
echo $active[0] -> name;
for($i = 1; $i < sizeof($active); $i++){
	echo ',';
	echo $active[$i] -> name;
}
}
?>
<!DOCTYPE>
<html>
<body>
<form action="submit.php" method="POST">
<div>
<input name="place" type="number" min="1" value="<?php echo $percentages -> place ?>">
<input name="img" type="text" value="<?php echo $percentages -> img ?>"> 
</div>
<?php printpercentages() ?>
<div>
<input name="detitle" value="<?php echo $tounamentde -> title ?>" type="text">
<input name="dename" value="<?php echo $tounamentde -> name ?>" type="text">
<input name="delocation" value="<?php echo $tounamentde -> location ?>" type="text">
<textarea name="detext"><?php echo $tounamentde -> text ?></textarea>
<input name="decar" value="<?php echo $tounamentde -> car ?>" type="text">
<textarea name="decartext"><?php echo $tounamentde -> cartext ?></textarea>
<div> Put in the trophies seperated by commas <input name="trophies" value="<?php printtrophies('de') ?>" type="text"></div>
</div>
<br>
<div>
<input name="entitle" value="<?php echo $tounamenten -> title ?>" type="text">
<input name="enname" value="<?php echo $tounamenten -> name ?>" type="text">
<input name="enlocation" value="<?php echo $tounamenten -> location ?>" type="text">
<textarea name="entext"><?php echo $tounamenten -> text ?></textarea>
<input name="encar" value="<?php echo $tounamenten -> car ?>" type="text">
<textarea name="encartext"><?php echo $tounamenten -> cartext ?></textarea>
<div> Put in the trophies seperated by commas <input name="trophies" value="<?php printtrophies('en') ?>" type="text"></div>
<input type="submit" name="submit">
<input name="token" type="hidden" value="<?php echo $_SESSION['achievtoken'] ?>">
<input name="index" type="hidden" value="<?php echo $_GET['index'] ?>">
</form>
</body>
</html>
