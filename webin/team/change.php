<?php
session_start();
if(!($_SESSION['login'] === True)) die();
$demember = json_decode(file_get_contents('../../content/team/team-de-de.json'))[$_GET['index']];
$enmember = json_decode(file_get_contents('../../content/team/team-en-en.json'))[$_GET['index']];
?>
<!DOCTYPE>
<html>
<body>
<form action="submit.php" method="POST">
	<input name="name" type="text" value="<?php echo $demember -> name ?>">
	<input name="img" type="text" value="<?php echo $demember -> img ?>">
	<input name="quotee" type="text" value="<?php echo $demember -> quotee?>">
	<input name="indexto" type="number" min="0" max="<?php echo sizeof(json_decode(file_get_contents('../../content/team/team-de-de.json'))) - 1?>" value="<?php echo $_GET['index'] ?>" >
	<br>
	<input name="dejob" type="text" value="<?php echo $demember -> job?>">
	<input name="dequote" type="text" value="<?php echo $demember -> quote?>">
	<textarea name="detext" > <?php echo $demember -> text ?></textarea>	
	<br>
	<input name="enjob" type="text" value="<?php echo $enmember -> job?>">
	<input name="enquote" type="text" value="<?php echo $enmember -> quote?>">
	<textarea name="entext" > <?php echo $enmember -> text ?></textarea>
	<input name="token" type="hidden">	
	<input name="index" type="hidden" value="<?php echo $_GET['index'] ?>">
	<br>
	<input type="submit" name="submit">
</form>
</body>
</html>
