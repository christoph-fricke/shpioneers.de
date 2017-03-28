<?php 
	session_start();
	if(!($_SESSION['login'] === True)) die();
function printnews(){
	$news = json_decode(file_get_contents('../../content/news/newsen-en.json'));
	$i = 0;
	foreach($news as $new){
	echo '<a href="newsedit.php?index='.$i.'">'.$new -> title .'</a>&nbsp;<a href="removenews.php?index='.$i++.'">Remove</a><br>';
	}
}

?>
<!DOCTYPE>
<html>
<body>
<p> Select the news-entry which thou desire to change </p>
<a href="newsedit.php?index=-1">Add News</a>
<br>
<?php printnews() ?>
</body>
</html>
