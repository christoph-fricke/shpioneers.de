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
	<input name="detitle" type="text" value="<?php echo $newsde[$_GET['index']] -> title?>"></input>	
	<input name="dedate" type="text" value="<?php echo $newsde[$_GET['index']] -> date?>"></input>	
	<input name="desubtitle" type="text" value="<?php echo $newsde[$_GET['index']] -> subtitle?>"></input>	
	<input name="depreview" type="text" value="<?php echo $newsde[$_GET['index']] -> preview?>"></input>	
	<input name="deimage" type="text" value="<?php echo $newsde[$_GET['index']] -> image ?>"></input>	
	<textarea name="detext"  value=""><?php echo $newsde[$_GET['index']] -> text?></textarea>	
	<!-- TODO token -->
<br>
	<input name="entitle" type="text" value="<?php echo $newsen[$_GET['index']] -> title?>"></input>	
	<input name="endate" type="text" value="<?php echo $newsen[$_GET['index']] -> date?>"></input>	
	<input name="ensubtitle" type="text" value="<?php echo $newsen[$_GET['index']] -> subtitle?>"></input>	
	<input name="enpreview" type="text" value="<?php echo $newsen[$_GET['index']] -> preview?>"></input>	
	<input name="enimage" type="text" value="<?php echo $newsen[$_GET['index']] -> image?>"></input>	
	<textarea name="entext"  value=""><?php echo $newsen[$_GET['index']] -> text?></textarea>	
	<input type="hidden" name="index"value="<?php echo $_GET['index'] ?>"/>
	<!-- TODO token -->
<br>
	<input name="indexto" min="0" max="<?php echo sizeof($newsde) -1 ?>" type="number" value="<?php echo $_GET['index'] ?>">
<br> 
	<input type="submit" name="submit"/>

</form>
</body>
</html>
