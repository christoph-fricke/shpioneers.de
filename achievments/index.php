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
    <div class="reached-length" style="width: '.$tournament[2] -> percentage[$index] -> value .'%;">
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
?>

  <!DOCTYPE html>
  <html lang="<?php setHtmlLang() ?>">

  <head>
    <title>
      <?php echo TITLE . ' | ' .$tournament[0] -> title?>
    </title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="../assets/icons/favicon.png" />

    <meta name="Author" content="Pioneers" />
    <meta name="Description" content="" />
    <meta name="Keywords" content="" />

    <meta name="theme-color" content="#EA5B10" />
    <meta name="format-detection" content="telephone=no" />

    <link rel="stylesheet" href="../assets/css/style.css" />
    <link rel="stylesheet" href="../assets/css/materialdesignicons.min.css" />
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
              <a href="?lang=de-de" class="navbar-option">
                <?php echo GERMAN ?>
              </a>
            </div>
            <div class="sidebar-option">
              <a href="?lang=en-en" class="navbar-option">
                <?php echo ENGLISH ?>
              </a>
            </div>
          </div>
        </div>
        <div class="grey"></div>
        <div class="left">
          <a class="logo" href="../">
            <img class="logo logo-svg" src="../assets/icons/logo_text.svg" />
          </a>
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
        <div class="right">
          <div class="navbar-option dropdown" href="">
            <?php echo LANGUAGE ?>
              <i class="mdi mdi-arrow-down-drop-circle"></i>
          </div>
          <div class="dropdown-content">
            <a href="?lang=de-de">
              <?php echo GERMAN ?>
            </a>
            <a href="?lang=en-en">
              <?php echo ENGLISH ?>
            </a>
          </div>
        </div>
        <div id='magic-line' />
    </nav>

    <header>
      <section class="logo-header" id="home">

      </section>
      <a href="#achievments">
        <div class="fab">
          <i class="mdi mdi-arrow-down mdi-24px"></i>
        </div>
      </a>
    </header>

    <main id="achievments">
      <h1><?php echo $tournament[0] -> title ?></h1>
    </main>

    <section class="contest">
      <main class="inner-contest achievment-box">
        <?php printsuccesses(); ?>
      </main>
    </section>
    <div class="clearfix"></div>

    <main>
      <section class="container">
        <div class="left">
          <h3><?php echo HEADER_PERCENTAGES ?></h3>
          <?php printbars(); ?>
        </div>
        <div class="right">
          <h3><?php echo HEADER_TEXT_ACH ?></h3>
          <p>
            <?php echo $tournament[0] -> text ?>
          </p>
        </div>
        </div>
      </section>
      <div class="clearfix"></div>

      <h3><?php echo HEADER_CAR ?></h3>
      <div class="racer-container">
        <img src="../assets/img/450x300.png" />
        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no
          sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo
          duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat,
          sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie.</p>
      </div>
    </main>

    <footer>
      <main>
        <div class="row">
          <div class="contact">
            <h2><?php echo HEADER_FOOTER_0 ?></h2>
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
              <h2><?php echo HEADER_FOOTER_1 ?></h2>
              <h6><?php echo SUBHEADER_IMPRESSUM_0 ?></h6>
              <p>
                <?php echo TEXT_IMPRESSUM_0 ?>
              </p>
              <h6><?php echo SUBHEADER_IMPRESSUM_1 ?></h6>
              <p>
                <?php echo TEXT_IMPRESSUM_1 ?>
              </p>
              <h6><?php echo SUBHEADER_IMPRESSUM_2 ?></h6>
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
              <a class="btn-big" href="" target="_blank">
                <i class="mdi mdi-youtube-play"></i>
                <?php echo BUTTON_SOCIAL_3 ?>
              </a>
            </div>
          </div>
        </div>

      </main>
      <p class="copyright">
        <?php echo COPYRIGHT ?>
      </p>
    </footer>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="../assets/js/email_responsivnews.js"></script>
  </body>

  </html>