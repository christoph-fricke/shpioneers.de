<?php
session_start();

if(!($_SESSION['login'] === True)) die();
$newsde = json_decode(file_get_contents('../../content/news/newsde-de.json'));
$newsen = json_decode(file_get_contents('../../content/news/newsen-en.json'));

$length = 32;
$secure = true;
$_SESSION['newstoken']= bin2hex(openssl_random_pseudo_bytes($length, $secure));
?>
<!DOCTYPE>
<html>
<body>
<form action="submit.php" method="POST">

	<input name="image" type="text" value="<?php echo $newsde[$_GET['index']] -> image ?>"></input>	
	<input name="date" type="text" value="<?php echo $newsde[$_GET['index']] -> date?>"></input>	
<br>
	<input name="detitle" type="text" value="<?php echo $newsde[$_GET['index']] -> title?>"></input>	
	<input name="desubtitle" type="text" value="<?php echo $newsde[$_GET['index']] -> subtitle?>"></input>	
	<input name="depreview" type="text" value="<?php echo $newsde[$_GET['index']] -> preview?>"></input>	
	<textarea name="detext"  value=""><?php echo $newsde[$_GET['index']] -> text?></textarea>	
	<!-- TODO token -->
<br>
	<input name="entitle" type="text" value="<?php echo $newsen[$_GET['index']] -> title?>"></input>	
	<input name="ensubtitle" type="text" value="<?php echo $newsen[$_GET['index']] -> subtitle?>"></input>	
	<input name="enpreview" type="text" value="<?php echo $newsen[$_GET['index']] -> preview?>"></input>	
	<textarea name="entext"  value=""><?php echo $newsen[$_GET['index']] -> text?></textarea>	
	<input type="hidden" name="index"value="<?php echo $_GET['index'] ?>"/>
	<input type="hidden" name="token" value="<?php echo $_SESSION['newstoken'] ?>"/>
<br>
	<input name="indexto" min="0" max="<?php echo sizeof($newsde) -1 ?>" type="number" value="<?php echo $_GET['index'] ?>">
<br> 
	<input type="submit" name="submit"/>

</form>
</body>
</html>
