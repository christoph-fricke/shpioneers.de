<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="assets/css/normalize.css">
</head>
<body>
<input class="btn-big" onclick="confirm();" type="button" value="Confirm subscription"/>
<div class="banner" id="banner">Subscription confirmed</div>
<script>
function confirm(){
	var xhttp = new XMLHttpRequest();	
	xhttp.onreadystatechange = function() {
   		if (this.readyState == 4 && this.status == 200) {
		switch(this.responseText){
			case '0': 
				banner('Internal error. <br> If this has happend multiple times send us a report to <a href="mailto:info@shpioneers.de"> info@shpioneers.de </a>.',false);
				break;
			case '1':
				banner('Subscription confirmed',true);
				break;
			case '2':
				banner('Email adress not registered or already confirmed',false);
		}
  	}};
  	xhttp.open("GET", "assets/php/newsletter/addSubscriber.php?hash=<?php echo $_GET['hash'] ?>", true);
  	xhttp.send();
}
function banner(text,positive){
	document.getElementById('banner').innerHTML = text;
	document.getElementById('banner').className += ' active';
	if(!positive) document.getElementById('banner').className += ' negative';
		setTimeout(function (){document.getElementById('banner').className = 'banner';},5000);
				}
    	

</script>
</body>
</html>
