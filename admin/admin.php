<?php 
	session_start(); 
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
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Roboto:400,700" />

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

        <nav class="mobile mobile-admin">
            <div class="navbar-content">
                <div class="left">
                    <div class="navbar-option hamburger">
                        <i class="mdi mdi-menu"></i>
                    </div>
                    <div class="sidebar dropdown-content">
                        <div class="sidebar-option">
                            <div class="logo-container">
                                <a class="logo" href="../">
                                    <img class="logo logo-svg" src="../assets/icons/logo_text.svg" />
                                </a>
                            </div>
                        </div>
                        <div class="sidebar-option">
                            <a href="achievments/" onclick="clearform();" target="list" class="navbar-option">
                                Achievments
                            </a>
                        </div>
                        <div class="sidebar-option">
                            <a href="news/" onclick="clearform();" target="list" class="navbar-option">
                                News
                            </a>
                        </div>
                        <div class="sidebar-option">
                            <a href="sponsors/partner" onclick="clearform();" target="list" class="navbar-option">
                                Partner
                            </a>
                        </div>
                        <div class="sidebar-option">
                            <a href="sponsors/service" onclick="clearform();" target="list" class="navbar-option">
                                Service
                            </a>
                        </div>
                        <div class="sidebar-option">
                            <a href="sponsors/finance" onclick="clearform();" target="list" class="navbar-option">
                                Finance
                            </a>
                        </div>
                        <div class="sidebar-option">
                            <a href="team/" onclick="clearform();" target="list" class="navbar-option">
                                Team
                            </a>
                        </div>
                        <div class="sidebar-option">
                            <a href="newsletter.php" onclick="clearform();" target="list" class="navbar-option">
                                Newsletter
                            </a>
                        </div>
                    </div>
                    <div class="grey"></div>
                </div>
            </div>
        </nav>

        <nav class="desktop desktop-admin">
            <div class="navbar-content">
                <div class="left">
                    <a class="logo" href="../">
                        <img class="logo logo-svg" src="../assets/icons/logo_text.svg" />
                    </a>
                </div>
                <div class="left">
                    <a class="navbar-option" href="achievments/" onclick="clearform();" target="list">
                        Achievments
                    </a>
                </div>
                <div class="left">
                    <a class="navbar-option" href="news/" onclick="clearform();" target="list">
                        News
                    </a>
                </div>
                <div class="left">
                        <a href="sponsors/partner" onclick="clearform();" target="list" class="navbar-option">
                                Partner
                        </a>
                </div>
                <div class="left">
                        <a href="sponsors/service" onclick="clearform();" target="list" class="navbar-option">
                                Service
                        </a>
                </div>
                <div class="left">
                        <a href="sponsors/finance" onclick="clearform();" target="list" class="navbar-option">
                                Finance
                        </a>
                </div>
                <div class="left">
                    <a class="navbar-option" href="team/" onclick="clearform();" target="list">
                        Team
                    </a>
                </div>
                <div class="left">
                    <a class="navbar-option" href="newsletter.php" onclick="clearform();" target="list">
                        Newsletter
                    </a>
                </div>
            </div>
            <div id='magic-line' />
        </nav>
        
        <div class="spacer"></div>
        <div class="container">
            <iframe id="iframe" class="frame" name="list" src="placeholder.html" scrolling="no" onload="iframeLoaded()">
            </iframe>
            <hr class="line--fullLength">
            <form id="form" class="input-container--admin" action="" method="POST">
            </form>
            <div class="submit-success success">Success</div>
            <div class="submit-success failure">Failure</div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="../assets/js/admin.js"></script>
    </body>

</html>
