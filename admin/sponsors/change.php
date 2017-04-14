<?php
session_start();
//if(!($_SESSION['login'] === True)) die();
$desponsor= json_decode(file_get_contents('../../content/sponsors/'.$_GET['type'].'-de-de.json'))[$_GET['index']];
$ensponsor= json_decode(file_get_contents('../../content/sponsors/'.$_GET['type'].'-en-en.json'))[$_GET['index']];
$length = 32;
$secure = true;
$_SESSION['sponsortoken'] = bin2hex(openssl_random_pseudo_bytes($length, $secure));
?>
<!DOCTYPE>
<html>
<body>
<form action="submit.php" method="POST">
	<input name="name" type="text" value="<?php echo $desponsor-> name ?>">
	<input name="img" type="text" value="<?php echo $desponsor -> img ?>">
	<input name="indexto" type="number" min="0" max="<?php echo sizeof(json_decode(file_get_contents('../../content/sponsors/'.$_GET['type'].'-de-de.json'))) - 1?>" value="<?php echo $_GET['index'] ?>" >
	<input name="email" type="text" value="<?php echo $desponsor -> email ?>">
	<input name="web" type="text" value="<?php echo $desponsor -> web ?>">
	<br>
	<textarea name="detext"><?php echo $desponsor -> text ?></textarea>
	<textarea name="entext"><?php echo $ensponsor -> text ?></textarea>
	<input name="token" type="hidden" value="<?php echo $_SESSION['sponsortoken'] ?>">	
	<input name="type" type="hidden" value="<?php echo $_GET['type'] ?>">	
	<input name="index" type="hidden" value="<?php echo $_GET['index'] ?>">
	<br>
	<input type="submit" name="submit">
</form>
</body>
</html>
