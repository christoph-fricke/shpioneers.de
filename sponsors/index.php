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
        <div class="row">
          <div class="card sucess-card">
            <div class="trophy">
              <svg class="icon-big" viewBox="0 0 24 24">
                <path d="M20.2,2H19.5H18C17.1,2 16,3 16,4H8C8,3 6.9,2 6,2H4.5H3.8H2V11C2,12 3,13 4,13H6.2C6.6,15 7.9,16.7 11,17V19.1C8.8,19.3 8,20.4 8,21.7V22H16V21.7C16,20.4 15.2,19.3 13,19.1V17C16.1,16.7 17.4,15 17.8,13H20C21,13 22,12 22,11V2H20.2M4,11V4H6V6V11C5.1,11 4.3,11 4,11M20,11C19.7,11 18.9,11 18,11V6V4H20V11Z"
                />
              </svg>
            </div>
            <h2><?php echo $tournament[0][2] -> place . ". " . PLACE ." ". $tournament[0][0] -> title  ?></h2>
            <p>
              <?php echo $tournament[0][0] -> name. ' | ' . $tournament[0][0] -> location ?>
            </p>
            <a class="btn-small" href="">
              <?php echo BUTTON_SUCESS ?>
            </a>
          </div>
          <div class="card sucess-card">
            <div class="trophy">
              <svg class="icon-big" viewBox="0 0 24 24">
                <path d="M20.2,2H19.5H18C17.1,2 16,3 16,4H8C8,3 6.9,2 6,2H4.5H3.8H2V11C2,12 3,13 4,13H6.2C6.6,15 7.9,16.7 11,17V19.1C8.8,19.3 8,20.4 8,21.7V22H16V21.7C16,20.4 15.2,19.3 13,19.1V17C16.1,16.7 17.4,15 17.8,13H20C21,13 22,12 22,11V2H20.2M4,11V4H6V6V11C5.1,11 4.3,11 4,11M20,11C19.7,11 18.9,11 18,11V6V4H20V11Z"
                />
              </svg>
            </div>
            <h2><?php echo $tournament[1][2] -> place . ". " . PLACE ." ". $tournament[1][0] -> title  ?></h2>
            <p>
              <?php echo $tournament[1][0] -> name. ' | ' . $tournament[1][0] -> location ?>
            </p>
            <a class="btn-small" href="">
              <?php echo BUTTON_SUCESS ?>
            </a>
          </div>
          <div class="card sucess-card">
            <div class="trophy">
              <svg class="icon-big" viewBox="0 0 24 24">
                <path d="M20.2,2H19.5H18C17.1,2 16,3 16,4H8C8,3 6.9,2 6,2H4.5H3.8H2V11C2,12 3,13 4,13H6.2C6.6,15 7.9,16.7 11,17V19.1C8.8,19.3 8,20.4 8,21.7V22H16V21.7C16,20.4 15.2,19.3 13,19.1V17C16.1,16.7 17.4,15 17.8,13H20C21,13 22,12 22,11V2H20.2M4,11V4H6V6V11C5.1,11 4.3,11 4,11M20,11C19.7,11 18.9,11 18,11V6V4H20V11Z"
                />
              </svg>
            </div>
            <h2><?php echo $tournament[2][2] -> place . ". " . PLACE ." ". $tournament[2][0] -> title  ?></h2>
            <p>
              <?php echo $tournament[2][0] -> name. ' | ' . $tournament[2][0] -> location ?>
            </p>
            <a class="btn-small" href="">
              <?php echo BUTTON_SUCESS ?>
            </a>
          </div>
        </div>
      </section>
    </main>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="../assets/js/functions.js"></script>
  </body>

  </html>