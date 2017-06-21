<?php
include('dbConnector.php');
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
		break;
	case 1:
		$lng = "en";
		break;
	default:
		$lng = "de";
		break;
}
$header = "FROM: info@shpioneers.de\n";
$header .= "Content-Type: text/html; charset= UTF-8\n";
mail($to,$_POST["subject{$lng}"],$_POST["message{$lng}"],$header);
}
?>
