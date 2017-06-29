<!DOCTYPE html>
<html>
<head>
        <title>
		Confirm your subscription
        </title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <link rel="apple-touch-icon" sizes="180x180" href="/assets/icons/favicons/apple-touch-icon.png">
        <link rel="icon" type="image/png" href="/assets/icons/favicons/favicon-32x32.png" sizes="32x32">
        <link rel="icon" type="image/png" href="/assets/icons/favicons/favicon-16x16.png" sizes="16x16">
        <link rel="manifest" href="/assets/icons/favicons/manifest.json">
        <link rel="mask-icon" href="/assets/icons/favicons/safari-pinned-tab.svg" color="#EA5B10">
        <link rel="shortcut icon" href="/assets/icons/favicons/favicon.ico">
        <meta name="msapplication-config" content="/assets/icons/favicons/browserconfig.xml">

        <meta name="Author" content="Pioneers" />
        <meta name="Description" content="<?php echo DESCRIPTION ?>" />
        <meta name="Keywords" content="<?php echo KEYWORDS ?>" />

        <meta name="theme-color" content="#EA5B10" />
        <meta name="format-detection" content="telephone=no" />


<link rel="stylesheet" href="assets/css/style.css">

<link rel="stylesheet" href="assets/css/normalize.css">
</head>
<body>
<input class="btn-big btn-newsletter-confirm" onclick="confirm();" type="button" value="Confirm subscription"/>
<div class="banner" id="banner">Subscription confirmed</div>
<script>
function confirm(){
	var xhttp = new XMLHttpRequest();	
	xhttp.onreadystatechange = function() {
   		if (this.readyState == 4 && this.status == 200) {
		switch(this.responseText){
			case '0': 
				banner('Internal error <br> If this has happens multiple times send us a report to <a href="mailto:info@shpioneers.de"> info@shpioneers.de </a>.',false);
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
