<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="assets/css/normalize.css">
</head>
<body>
<input class="btn-big" onclick="confirm();" type="button" value="End subscription"/>
<script>
function confirm(){
	var xhttp = new XMLHttpRequest();	
	xhttp.onreadystatechange = function() {
   		if (this.readyState == 4 && this.status == 200) {
			alert('Test');
    		}
  	};
  	xhttp.open("GET", "assets/php/newsletter/removeSubscriber.php?hash=<?php echo $_GET['hash'] ?>", true);
  	xhttp.send();
}
</script>
</body>
</html>
