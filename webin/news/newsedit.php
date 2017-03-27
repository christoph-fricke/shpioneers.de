<?php
session_start();

if(!($_SESSION['login'] === True)) die();
$newsde = json_decode(file_get_contents('../../content/news/newsde-de.json'));
$newsen = json_decode(file_get_contents('../../content/news/newsen-en.json'));

?>
<!DOCTYPE>
<html>
<body>
<form action="submit.php" method="POST">
	<input name="title" type="text" value="<?php echo $newsde[$_GET['index']] -> title?>"></input>	
	<input name="date" type="text" value="<?php echo $newsde[$_GET['index']] -> date?>"></input>	
	<input name="subtitle" type="text" value="<?php echo $newsde[$_GET['index']] -> subtitle?>"></input>	
	<input name="preview" type="text" value="<?php echo $newsde[$_GET['index']] -> preview?>"></input>	
	<input name="image" type="text" value="<?php echo $newsde[$_GET['index']] -> image ?>"></input>	
	<textarea name="text"  value=""><?php echo $newsde[$_GET['index']] -> text?></textarea>	
	<input type="hidden" value="de" name="lang"/>	
	<input type="hidden" name="index" value="<?php echo $_GET['index'] ?>"/>
	<input type="submit" name="submit"/>
	<!-- TODO token -->
</form>
<br>
<form action="submit.php" method="POST">
	<input name="title" type="text" value="<?php echo $newsen[$_GET['index']] -> title?>"></input>	
	<input name="date" type="text" value="<?php echo $newsen[$_GET['index']] -> date?>"></input>	
	<input name="subtitle" type="text" value="<?php echo $newsen[$_GET['index']] -> subtitle?>"></input>	
	<input name="preview" type="text" value="<?php echo $newsen[$_GET['index']] -> preview?>"></input>	
	<input name="image" type="text" value="<?php echo $newsen[$_GET['index']] -> image?>"></input>	
	<textarea name="text"  value=""><?php echo $newsen[$_GET['index']] -> text?></textarea>	
	<input type="hidden" value="en" name="lang"/>	
	<input type="hidden" name="index"value="<?php echo $_GET['index'] ?>"/>
	<input type="submit" name="submit"/>
	<!-- TODO token -->
</form>
</body>
</html>
