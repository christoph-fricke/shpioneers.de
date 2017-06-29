<?php
session_start();
if (isset($_GET['lang'])) {
    $_SESSION['lang'] = $_GET['lang'];
}
if(!isset($_SESSION['lang'])){
    $_SESSION['lang'] = "de-de";
}
switch ($_SESSION['lang']) {
    case "en-en":
        include_once('../assets/lang/en-en.php');
        break;
    case "de-de":
        include_once('../assets/lang/de-de.php');
        break;
    default:
        include_once('../assets/lang/en-en.php');
        break;
}
include("../assets/php/achievment.php");
define('PATH_TO_ROOT','../');
$tournament = getcontent($_GET['index']);
function setHtmlLang() {
    if ($_SESSION['lang']) {
        echo $_SESSION['lang'];
    } else {
        echo "de-de";
    }
}
function printbars(){
    global $tournament;
    for($i = 0; $i < sizeof($tournament[1]); $i++){
        printbar($i);
    }
}
function printbar($index){
    global $tournament;
    echo '<div class="status-bar">
    <h6>'. $tournament[1][$index] -> name.'</h6>
    <div class="max-length">
    <p class="reached-number">'.$tournament[2] -> percentage[$index] -> value .'%</p>
    <div class="reached-length zero-width" style="width: '.$tournament[2] -> percentage[$index] -> value .'%;">
    </div>
    </div>
    </div>';
    
}
function printsuccesses(){
    global $tournament;
    foreach($tournament[0] -> trophies as $su){
        printsuccess($su);
    }
}
function printsuccess($suc){
    echo '        <div class="achievment-content">
    <div class="trophy achievment-trophy">
    <svg class="icon-big" viewBox="0 0 24 24">
    <path d="M20.2,2H19.5H18C17.1,2 16,3 16,4H8C8,3 6.9,2 6,2H4.5H3.8H2V11C2,12 3,13 4,13H6.2C6.6,15 7.9,16.7 11,17V19.1C8.8,19.3 8,20.4 8,21.7V22H16V21.7C16,20.4 15.2,19.3 13,19.1V17C16.1,16.7 17.4,15 17.8,13H20C21,13 22,12 22,11V2H20.2M4,11V4H6V6V11C5.1,11 4.3,11 4,11M20,11C19.7,11 18.9,11 18,11V6V4H20V11Z"
    />
    </svg>
    </div>
    <h2>'. $suc -> name.'</h2>
    </div>';
}

function setactive($type){
    if($type == $_GET['index']) {
        return 'active';
    }
}
function printnavmob(){
    $file = json_decode(file_get_contents('../content/achievments/list.json'));
    foreach($file as $tour){
        printoptionmob(getcontent(array_search($tour,$file))[0] -> title,array_search($tour,$file));
    }
}
function printoptionmob($name,$index){
    echo '
    <div class="sidebar-option">
    <a href="?lang=de-de&index='.$index.'" class="navbar-option '.setactive($index).'">
    '.$name.'
    </a>
    </div>';
}
function printnavdesk(){
    $file = json_decode(file_get_contents('../content/achievments/list.json'));
    foreach($file as $tour){
        printoptiondesk(getcontent(array_search($tour,$file))[0] -> title,array_search($tour,$file));
    }
}

function printoptiondesk($name,$index){
    echo '
    <div class="left">
    <a class="navbar-option '.setactive($index).'" href="?index='.$index.'">
    '.$name.'
    </a>
    </div>';
}
?>

    <!DOCTYPE html>
    <html hreflang="<?php setHtmlLang() ?>">

    <head>
        <title>
            <?php echo TITLE . ' | ' .$tournament[0] -> title?>
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

        <link rel="stylesheet" href="../assets/css/style.css" />
        <link rel="stylesheet" href="../assets/css/materialdesignicons.min.css" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Roboto:400,700" />
    </head>

    <body>
        <nav class="mobile">
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
                        <?php printnavmob() ?>
                        <hr class="navline">
                        <div class="sidebar-option">
                            <a href="?lang=de-de&index=<?php echo $_GET['index'] ?>" class="navbar-option">
                                <?php echo GERMAN ?>
                            </a>
                        </div>
                        <div class="sidebar-option">
                            <a href="?lang=en-en&index=<?php echo $_GET['index'] ?>" class="navbar-option">
                                <?php echo ENGLISH ?>
                            </a>
                        </div>
                    </div>

                    <div class="grey"></div>
                </div>
                <div class="left">
                    <div class="navbar-option navbar-title">
                        <span><?php echo $tournament[0] -> title ?></span>
                    </div>
                </div>
            </div>
        </nav>

        <nav class="desktop">
            <div class="navbar-content">
                <div class="left">
                    <a class="logo" href="../">
                        <img class="logo logo-svg" src="../assets/icons/logo_text.svg" />
                    </a>
                </div>
                <?php printnavdesk() ?>
                <div class="right">
                    <div class="navbar-option dropdown" href="">
                        <?php echo LANGUAGE ?>
                        <i class="mdi mdi-arrow-down-drop-circle"></i>
                    </div>
                    <div class="dropdown-content">
                        <a href="?lang=de-de&index=<?php echo $_GET['index'] ?>">
                            <?php echo GERMAN ?>
                        </a>
                        <a href="?lang=en-en&index=<?php echo $_GET['index'] ?>">
                            <?php echo ENGLISH ?>
                        </a>
                    </div>
                </div>
                <div id='magic-line' />
        </nav>

        <div class="spacer"></div>
        <section class="contest">
            <main class="inner-contest achievment-box">
                <?php printsuccesses(); ?>
            </main>
        </section>
        <div class="clearfix"></div>

        <main>
            <section class="container">
                <div class="left">
                    <h3>
                        <?php echo HEADER_PERCENTAGES ?>
                    </h3>
                    <?php printbars(); ?>
                </div>
                <div class="right">
                    <h3>
                        <?php echo HEADER_TEXT_ACH ?>
                    </h3>
                    <p>
                        <?php echo $tournament[0] -> text ?>
                    </p>
                </div>
                </div>
            </section>
            <div class="clearfix"></div>

            <h3>
                <?php echo $tournament[0] -> car ?>
            </h3>
            <div class="racer-container">
                <img src="<?php echo $tournament[2] -> img?>" />
                <p>
                    <?php echo $tournament[0] -> cartext ?>
                </p>
            </div>
        </main>

        <footer>
            <main>
                <div class="row">
                    <div class="contact">
                        <h2>
                            <?php echo HEADER_FOOTER_0 ?>
                        </h2>
                        <form id="contact" action="" method="POST">
                            <input class="contactfield" type="text" name="name" placeholder="<?php echo NAME_FORM ?>" required />
                            <input class="contactfield" type="email" name="email" placeholder="<?php echo EMAIL_FORM ?>" required />
                            <textarea name="message" placeholder="<?php echo MESSAGE_FORM ?>"></textarea>
                            <input class="btn-big" type="submit" value="<?php echo BUTTON_FORM ?>" />
                        </form>
                        <div id="emailsent" class="notification">
                            <?php echo EMAIL_SENT_SUC ?>
                        </div>
                        <div id="nemailsent" class="notification">
                            <?php echo EMAIL_SENT_USUC ?>
                        </div>
                    </div>
                    <div class="footer-right">
                        <div class="impressum">
                            <h2>
                                <?php echo HEADER_FOOTER_1 ?>
                            </h2>
                            <h6>
                                <?php echo SUBHEADER_IMPRESSUM_0 ?>
                            </h6>
                            <p>
                                <?php echo TEXT_IMPRESSUM_0 ?>
                            </p>
                            <h6>
                                <?php echo SUBHEADER_IMPRESSUM_1 ?>
                            </h6>
                            <p>
                                <?php echo TEXT_IMPRESSUM_1 ?>
                            </p>
                            <h6>
                                <?php echo SUBHEADER_IMPRESSUM_2 ?>
                            </h6>
                            <p>
                                <?php echo TEXT_IMPRESSUM_2 ?>
                            </p>
                        </div>
                        <div class="social">
                            <a class="btn-big" href="https://www.facebook.com/SHpioneers/" target="_blank">
                                <i class="mdi mdi-facebook-box"></i>
                                <?php echo BUTTON_SOCIAL_0 ?>
                            </a>
                            <a class="btn-big" href="https://twitter.com/SHpioneers/" target="_blank">
                                <i class="mdi mdi-twitter-box"></i>
                                <?php echo BUTTON_SOCIAL_1 ?>
                            </a>
                            <a class="btn-big" href="https://www.instagram.com/shpioneers" target="_blank">
                                <i class="mdi mdi-instagram"></i>
                                <?php echo BUTTON_SOCIAL_2 ?>
                            </a>
                            <!--<a class="btn-big" href="" target="_blank">
<i class="mdi mdi-youtube-play"></i>
<?php echo BUTTON_SOCIAL_3 ?>
</a>-->
                        </div>
                    </div>
                </div>

            </main>
            <p class="copyright">
                <?php echo COPYRIGHT ?>
            </p>
        </footer>
        <div class="clearfix"></div>

        <div class="credits">
            <a class="credits-content" href="http://christoph-fricke.de">
                <svg class="credits-icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 0h24v24H0V0z" fill="none" />
                    <path d="M9.4 16.6L4.8 12l4.6-4.6L8 6l-6 6 6 6 1.4-1.4zm5.2 0l4.6-4.6-4.6-4.6L16 6l6 6-6 6-1.4-1.4z" />
                </svg>
                <span class="credits-span">&nbsp;with&nbsp;</span>
                <svg class="credits-icon credits-icon--speedometer" viewBox="0 0 24 24">
                    <path d="M0 0h24v24H0V0z" fill="none" />
                    <path d="M12,16A3,3 0 0,1 9,13C9,11.88 9.61,10.9 10.5,10.39L20.21,4.77L14.68,14.35C14.18,15.33 13.17,16 12,16M12,3C13.81,3 15.5,3.5 16.97,4.32L14.87,5.53C14,5.19 13,5 12,5A8,8 0 0,0 4,13C4,15.21 4.89,17.21 6.34,18.65H6.35C6.74,19.04 6.74,19.67 6.35,20.06C5.96,20.45 5.32,20.45 4.93,20.07V20.07C3.12,18.26 2,15.76 2,13A10,10 0 0,1 12,3M22,13C22,15.76 20.88,18.26 19.07,20.07V20.07C18.68,20.45 18.05,20.45 17.66,20.06C17.27,19.67 17.27,19.04 17.66,18.65V18.65C19.11,17.2 20,15.21 20,13C20,12 19.81,11 19.46,10.1L20.67,8C21.5,9.5 22,11.18 22,13Z"
                    />
                </svg>
                <span class="credits-span">&nbsp;by&nbsp;</span>
                <span class="credits-span credits-span--bold">Christoph&nbsp;Fricke</span>
            </a>
        </div>

        <!--<div id="info-banner" class="banner">
            <span><?php echo INFO_TEXT ?></span>
            <div class="block">
                <i id="info-close" class="mdi mdi-close"></i>
            </div>
        </div>-->

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="../assets/js/email_responsivnews.js"></script>
        <!--<script src="../assets/js/notification.js"></script>-->
        <script>
            // Animation for statusbar
            var didscroll = true;
            $(document).scroll(function () {
                didscroll = true;
            });
            setInterval(function () {
                if ($('section.container').offset().top - ($(window).height() / 2) < $(window).scrollTop()) {
                    $('.reached-length').removeClass('zero-width');
                    $('.reached-number').addClass('visible');
                }
            }, 50);
        </script>
    </body>

    </html>