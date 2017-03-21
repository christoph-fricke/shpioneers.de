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
    <h4>'. $data -> name. '</h4>
    </div>
    <div class="news-lower">
    <h5>'.$data -> job.'</h5>
    <p>
    '.$data -> quote.'~'. $data -> quotee.'
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
      <a href="#partner">
        <div class="fab">
          <i class="mdi mdi-arrow-down mdi-24px"></i>
        </div>
      </a>
    </header>

    <main>
      <section id="partner" class="news">
        <h1><?php echo HEADER_TEAM ?></h1>
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
