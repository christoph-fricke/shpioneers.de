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
function printteam(){
    foreach(getmembers() as $mit){
        printcard($mit);
    }
}
function getmembers()
{
    return json_decode(file_get_contents("../content/team/team-". $_SESSION['lang'] . ".json"));
}
function printcard($data){
    echo '<div class="card news-card">
    <div class="news-upper" style=" background-image: url('. htmlspecialchars($data -> img).');">
    </div>
    <div class="news-lower">
    <h4>'. $data -> name. '</h4>
    <h5>'.$data -> job.'</h5>
    <p>
    '.$data -> quote.' ~'. $data -> quotee.'
    </p>
    <div class="news-content">
    '.$data -> text.'
    </div>
    <a class="btn-small maximise" href="news.php?ind=0">
    '. BUTTON_NEWS.'
    </a>
    <a class="btn-small minimise" href="news.php?ind=0">
    '.BUTTON_NEWS_MIN.'
    </a>
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
  <html lang="<?php setHtmlLang() ?>">

  <head>
    <title>
      <?php echo TITLE ?> |
        <?php echo HEADER_TEAM ?>
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
          <div class="grey"></div>
        </div>
        <div class="left">
          <div class="navbar-option navbar-title">
            <span><?php echo HEADER_TEAM ?></span>
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
        <div class="left">
          <div class="navbar-option navbar-title">
            <span><?php echo HEADER_TEAM ?></span>
          </div>
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

    <div class="spacer"></div>
    <main>
      <section id="team" class="news">
        <div class="row">
          <?php printteam() ?>
        </div>
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
    <div class="clearfix"></div>

    <div class="credits">
      <a class="credits-content" href="http://christoph-fricke.de">
        <svg class="credits-icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path d="M0 0h24v24H0V0z" fill="none" />
          <path d="M9.4 16.6L4.8 12l4.6-4.6L8 6l-6 6 6 6 1.4-1.4zm5.2 0l4.6-4.6-4.6-4.6L16 6l6 6-6 6-1.4-1.4z" />
        </svg>
        <span class="credits-span">&nbsp;with&nbsp;</span>
        <svg class="credits-icon credits-icon--love" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path d="M0 0h24v24H0z" fill="none" />
          <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />
        </svg>
        <span class="credits-span">&nbsp;by&nbsp;</span>
        <span class="credits-span credits-span--bold">Christoph&nbsp;Fricke</span>
      </a>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="../assets/js/email_responsivnews.js"></script>
  </body>

  </html>