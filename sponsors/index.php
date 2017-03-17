<?php
session_start();

if (isset($_GET['lang'])) {
    $_SESSION['lang'] = $_GET['lang'];
}
else {
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
function getdata($type){
if(!file_exists("../content/sponsors/". $type ."-". $_SESSION['lang']. ".json")) die();
return json_decode(file_get_contents("../content/sponsors/". $type ."-". $_SESSION['lang']. ".json"));
}
function printsponsors(){
foreach (getdata('partner') as $spons){
printcard($spons);
}}
function printcard($data){
	echo '<div class="card news-card">
            <div class="news-upper" style=" background-image: url(' .$data -> img. ') ?>);">
              <h4>'.$data -> name .'</h4>
            </div>
            <div class="news-lower">
              <div class="news-content">
              '.$data -> text.'
		</div>
              <a class="btn-small maximise" href="news.php?ind=0">
              '. BUTTON_NEWS.'
		</a>
              <a class="btn-small minimise" href="news.php?ind=0">
              '. BUTTON_NEWS_MIN.'</a>
		</div>
            </div>';

}
function setHtmlLang() {
    if ($_SESSION['lang']) {
        echo $_SESSION['lang'];
    } else {
        echo "de-de";
    }
}
?>

  <!DOCTYPE html>
  <html lang="de-de">

  <head>
    <title>
      <?php echo TITLE ?>
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
              <a href="#news" class="navbar-option">
                <?php echo NEWS ?>
              </a>
            </div>
            <div class="sidebar-option">
              <a href="#contest" class="navbar-option">
                <?php echo CONTEST ?>
              </a>
            </div>
            <div class="sidebar-option">
              <a href="#sponsors" class="navbar-option">
                <?php echo SPONSORS ?>
              </a>
            </div>
            <div class="sidebar-option">
              <a href="#sucess" class="navbar-option">
                <?php echo SUCESS ?>
              </a>
            </div>
            <div class="sidebar-option">
              <a href="#team" class="navbar-option">
                <?php echo TEAM ?>
              </a>
            </div>
          </div>
          <div class="grey"></div>
        </div>
        <div class="left">
          <a class="logo" href="#home">
            <img class="logo logo-svg" src="../assets/icons/logo_text.svg" />
          </a>
        </div>
        <div class="right">
          <div class="navbar-option dropdown">
            <i class="mdi mdi-translate"></i>
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
    </nav>

    <nav class="desktop">
      <div class="navbar-content">
        <div class="left">
          <a class="logo" href="#home">
            <img class="logo logo-svg" src="../assets/icons/logo_text.svg" />
          </a>
        </div>
        <div class="left">
          <a class="navbar-option" href="#news">
            <?php echo SPONSOR_HEADER_PARTNER ?>
          </a>
        </div>
        <div class="left">
          <a class="navbar-option" href="#contest">
            <?php echo SPONSOR_HEADER_SPONSORS ?>
          </a>
        </div>
        <div class="left">
          <a class="navbar-option" href="#sponsors">
            <?php echo SPONSOR_HEADER_FINANCE ?>
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
      <a href="#news">
        <div class="fab">
          <i class="mdi mdi-arrow-down mdi-24px"></i>
        </div>
      </a>
    </header>

    <main>
      <section id="partner" class="news">
        <h1><?php echo SPONSOR_HEADER_PARTNER ?></h1>
	<section class="news"id="news">
	<div class="row">

	<?php printsponsors() ?>
       </div>
	</section>
      </section>
    </main>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="../assets/js/functions.js"></script>
  </body>

  </html>
