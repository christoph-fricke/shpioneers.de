<?php
function checkuser($name,$pass){
	// TODO check Password and Username
	return True;
}
session_start();
if(checkuser($_POST['username'],$_POST['password'])){
	$_SESSION['login'] = True;

}
else{
	die();
}

?>
