<?php
/* For this file to work the newsletter has to be a pdf document in the same directory as this file
The two versions have to be named "Newsletterde.pdf" and "Newsletteren.pdf"
This file will not work if php is used in safe mode, because the shell function used to convert the pdf files to base64 is not accesible
in save mode.
*/
session_start();

if(!($_SESSION['login'] === True)||!checktoken()){
	echo 'noc';
 die();
}
include('dbConnector.php');
define(MESSAGEDE,'<html>Den Newsletter finden sie als pdf-Dokument im Anhang.');
define(MESSAGEEN,'<html>You can find the Newsletter as an attachment.');
define(UNSUBSCRIBEDE1,'<br> Zum abmelden von diesem Newsletter <a href="http://shpioneers.de/unsubscribe.php?hash=');
define(UNSUBSCRIBEDE2,'">hier</a> klicken.</html>');
define(UNSUBSCRIBEEN1,'<br>To unsubscribe click <a href="http://shpioneers.de/unsubscribe.php?hash=');
define(UNSUBSCRIBEEN2,'">here</a>.</html>');
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
$header = "FROM: info@shpioneers.de\n";
$header .= "MIME-Version: 1.0\n";
$header .= "Content-Type: multipart/mixed; boundary=fuckyouall\n";
$message = "\n If you cant see this message properly your email client does not support multipartmessages";
$message .= "\n--fuckyouall\nContent-Type: text/html;charset=UTF-8\n\n";
switch($lang){
	case 0:
		$lng = "de";
		$unsub = UNSUBSCRIBEDE1 . $hash. UNSUBSCRIBEDE2;
		$message .= MESSAGEDE;
		break;
	case 1:
		$lng = "en";
		$unsub = UNSUBSCRIBEEN1 . $hash. UNSUBSCRIBEEN2;
		$message .= MESSAGEEN;
		break;
	default:
		$lng = "de";
		$unsub = UNSUBSCRIBEDE1 . $hash. UNSUBSCRIBEDE2;
		$message .= MESSAGEDE;
		break;
}
$message .= $unsub;
$message .= "\n--fuckyouall\nContent-Type: application/pdf; name=\"Pioneers_Newsletter.pdf\"\n";
$message .= "Content-Disposition: attachment; filename=\"Pioneers_Newsletter.pdf\"\n";
$message .= "Content-Transfer-Encoding: base64\n\n"; // two newlines to begin message
$message .= shell_exec("base64 Newsletter{$lng}.pdf");
$message .= "--fuckyouall--";

mail($to,$_POST["subject{$lng}"],$message,$header);
}function checktoken(){
return $_POST['token'] == $_SESSION['token'];
}
?>
