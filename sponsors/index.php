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
function getdata($type){
    if(!file_exists("../content/sponsors/". $type ."-". $_SESSION['lang']. ".json")) die();
    return json_decode(file_get_contents("../content/sponsors/". $type ."-". $_SESSION['lang']. ".json"));
}
function printsponsors(){
    foreach (getdata($_GET['type']) as $spons){
        printcard($spons);
    }}
    function printcard($data){
        echo '<div class="card news-card">
        <div class="news-upper" style=" background-image: url(' .$data -> img. ');">
        </div>
        <div class="news-lower">
        <h4>'.$data -> name .'</h4>
        <div class="sponsor-web"><i class="mdi mdi-earth mdi-24px inline-icon"></i><a class="sponsors-text" href="http://'.$data -> web.'" target="blank">'.$data -> web.'</a> </div>
        <div class="sponsor-email"><i class="mdi mdi-mail-ru mdi-24px inline-icon"></i><a class="sponsors-text" href="mailto:'.$data -> email.'">'.$data -> email.'</a>
        </div>
        <div class="news-content">
        '.$data -> text.'
        </div>
        <a class="btn-small maximise" href="news.php?ind=0">
        '. BUTTON_NEWS.'
        </a>
        <a class="btn-small minimise" href="news.php?ind=0">
        '. BUTTON_NEWS_MIN.'</a>
        </div>
</div>'; } function setHtmlLang() { if ($_SESSION['lang']) { echo $_SESSION['lang']; } else { echo "de-de"; } } function gettitle(){ switch($_GET['type']){ case 'partner': echo SPONSOR_HEADER_PARTNER; break; case 'service': echo SPONSOR_HEADER_SPONSORS; break;
case 'finance': echo SPONSOR_HEADER_FINANCE; break; default: echo SPONSOR_HEADER_PARTNER; break; } } function setactive($type){ if($type == $_GET['type']){ echo 'active'; } } ?>

  <!DOCTYPE html>
  <html lang="<?php setHtmlLang() ?>">

  <head>
    <title>
      <?php echo TITLE ?> |
        <?php gettitle()?>
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
              <a href="?type=partner" class="navbar-option">
                <?php echo SPONSOR_HEADER_PARTNER ?>
              </a>
            </div>
            <div class="sidebar-option">
              <a href="?type=service" class="navbar-option">
                <?php echo SPONSOR_HEADER_SPONSORS ?>
              </a>
            </div>
            <div class="sidebar-option">
              <a href="?type=finance" class="navbar-option">
                <?php echo SPONSOR_HEADER_FINANCE ?>
              </a>
            </div>
            <hr>
            <div class="sidebar-option">
              <a href="?lang=de-de&type=<?php echo $_GET['type']?>" class="navbar-option">
                <?php echo GERMAN ?>
              </a>
            </div>
            <div class="sidebar-option">
              <a href="?lang=en-en&type=<?php echo $_GET['type']?>" class="navbar-option">
                <?php echo ENGLISH ?>
              </a>
            </div>
          </div>
          <div class="grey"></div>
        </div>
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
        <div class="left">
          <a class="navbar-option <?php setactive('partner'); ?>" href="?type=partner">
            <?php echo SPONSOR_HEADER_PARTNER ?>
          </a>
        </div>
        <div class="left">
          <a class="navbar-option <?php setactive('service'); ?>" href="?type=service">
            <?php echo SPONSOR_HEADER_SPONSORS ?>
          </a>
        </div>
        <div class="left">
          <a class="navbar-option <?php setactive('finance'); ?>" href="?type=finance">
            <?php echo SPONSOR_HEADER_FINANCE ?>
          </a>
        </div>
        <div class="right">
          <div class="navbar-option dropdown" href="">
            <?php echo LANGUAGE ?>
              <i class="mdi mdi-arrow-down-drop-circle"></i>
          </div>
          <div class="dropdown-content">
            <a href="?lang=de-de&type=<?php echo $_GET['type']?>">
              <?php echo GERMAN ?>
            </a>
            <a href="?lang=en-en&type=<?php echo $_GET['type']?>">
              <?php echo ENGLISH ?>
            </a>
          </div>
        </div>
        <div id='magic-line' />
    </nav>

    <header>
      <section class="logo-header" id="home">

      </section>
      <a href="#partner">
        <div class="fab">
          <i class="mdi mdi-arrow-down mdi-24px"></i>
        </div>
      </a>
    </header>

    <main>
      <section id="partner" class="news">
<img src="../assets/icons/<?php echo $_GET['type'] ?>.svg" class="sponsor-type"/>
        <h1><?php gettitle() ?></h1>
        <section class="news" id="partner">
          <div class="row">

            <?php printsponsors() ?>
          </div>
        </section>
      </section>
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


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="../assets/js/email_responsivnews.js"></script>
  </body>

  </html>
