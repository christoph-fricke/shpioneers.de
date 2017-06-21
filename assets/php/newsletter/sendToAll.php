<?php
include('dbConnector.php');
define(UNSUBSCRIBEDE1,'<br> Zum abmelden von diesem Newsletter <a href="shpioneers.de/unsubscribe.php?hash=');
define(UNSUBSCRIBEDE2,'">hier</a> klicken.');
define(UNSUBSCRIBEEN1,'<br>To unsubscribe click <a href="shpioneers.de/unsubscribe.php?hash=');
define(UNSUBSCRIBEEN2,'">here</a>.');
// TODO authentication
$sql = "SELECT email,hash,lang FROM subscribers";
try{
$res = $pdo -> query($sql);
foreach($res as $row){
	sendEmailTo($row['email'],$row['hash'],$row['lang']);
}
}
catch(Exception $e){
echo $e -> getMessage();
}
function sendEmailTo($to,$hash,$lang){
switch($lang){
	case 0:
		$lng = "de";
		$unsub = UNSUBSCRIBEDE1 . $hash. UNSUBSCRIBEDE2;
		break;
	case 1:
		$lng = "en";
		$unsub = UNSUBSCRIBEEN1 . $hash. UNSUBSCRIBEEN2;
		break;
	default:
		$lng = "de";
		$unsub = UNSUBSCRIBEDE1 . $hash. UNSUBSCRIBEDE2;
		break;
}
$header = "FROM: info@shpioneers.de\n";
$header .= "Content-Type: text/html; charset= UTF-8\n";
$message = $_POST["message{$lng}"] . $unsub;
mail($to,$_POST["subject{$lng}"],$message,$header);
}
?>
