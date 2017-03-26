<?php
session_start();
if(!($_SESSION['login'] === True)) die();
$newsde = json_decode(file_get_contents('../../content/news/newsde-de.json'));
$newsen = json_decode(file_get_contents('../../content/news/newsen-en.json'));

?>
<!DOCTYPE>
<html>
<body>

</body>
</html>
