<?php
function checkuser($name,$pass){
	$userbase = json_decode(file_get_contents('users.json'));
	foreach($userbase as $user){
		if($name == $user -> login && password_verify($pass,$user -> pass)) return True;
	}
	return False;
}
session_start();
if(checkuser($_POST['user'],$_POST['password'])){
	$_SESSION['login'] = True;

}
else{
	die();
}

?>
