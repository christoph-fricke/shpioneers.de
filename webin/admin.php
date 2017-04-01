<?php 
	include('login.php');
	session_start();
	if($_SESSION['login'] === True){}
	else {
		die();
	}
?>
<!DOCTYPE>
<html>
<body>
	
	<a href="news/">News</a>
</body>
</html>
