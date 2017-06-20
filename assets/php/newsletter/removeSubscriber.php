<?php
	include('dbConnector.php');
	$hash = $_GET['hash'];
	try{
	$sqlRemove = "DELETE FROM subscribers WHERE hash = :hash";
	$prepared = $pdo -> prepare($sqlRemove);
	$prepared -> execute(array("hash" => $hash));
	$status = 1;
	}
	catch(Exception $e){
	$status = 0;
	}		
	//TODO feedback to user
?>
