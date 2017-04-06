<?php 
	include('login.php');
	// session_start(); this is not needed since the session already started in login.php. It only throws an error!
	if($_SESSION['login'] === True){}
	else {
		die();
	}
?>
<!DOCTYPE>
<html>

    <head>
        <title>Pioneers | Webinterface</title>
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
        <meta name="Description" content="" />
        <meta name="Keywords" content="" />

        <meta name="theme-color" content="#EA5B10" />
        <meta name="format-detection" content="telephone=no" />

        <link rel="stylesheet" href="../assets/css/webinterface/admin.css" />
        <link rel="stylesheet" href="../assets/css/materialdesignicons.min.css" />

        <script type="text/javascript">
            //It only functions in the head... I am not completly sure why but it does.
            function iframeLoaded() {
                var iFrameID = document.getElementById('iframe');
                if (iFrameID) {
                    iFrameID.style.height = "";
                    iFrameID.style.height = iFrameID.contentWindow.document.body.scrollHeight + "px";
                }
            }
        </script>
    </head>

    <body>
        <a href="achievments/" target="list">Achievments</a>
        <a href="news/" target="list">News</a>
        <a href="sponsors/" target="list">Sponsors</a>
        <a href="team/" target="list">Team</a>
        <div class="container">
            <iframe id="iframe" class="frame" name="list" src="placeholder.html" scrolling="no" onload="iframeLoaded()">
            </iframe>
            <hr class="line--fullLength">
            <form class="input-container--admin" action="" method="POST">
                <input type="text" class="input-item--admin" />
                <input type="text" class="input-item--admin" />
                <textarea class="input-item--admin input-item--textarea"></textarea>
                <input type="submit" class="input-item--admin input-item--submit" value="Add / Save" />
            </form>
        </div>
    </body>

</html>