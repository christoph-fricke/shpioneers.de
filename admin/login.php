<?php
function checkuser($name,$pass){
	$userbase = json_decode(file_get_contents('users.json'));
	foreach($userbase as $user){
		if($name == $user -> login && password_verify($pass,$user -> pass)) return True;
	} 
// The stuff above works but for debugging it is quite nice to not have to login in every so often
	return false;
}
session_start();
if(checkuser($_POST['user'],$_POST['password'])){
	$_SESSION['login'] = True;
	echo 'suc';

}
else{
	echo 'noc';
	die();
}

?>
