<?php
include('assets/php/checkLanguage.php');
include('assets/php/news.php');
?>

  <!DOCTYPE html>
  <html lang="de-de">

  <head>
    <title>
      <?php echo TITLE ?>
    </title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="assets/img/favicon.ico" />

    <meta name="author" content="Pioneers" />
    <link rel="stylesheet" href="assets/css/style.css" />
    <link href="assets/css/materialdesignicons.min.css" rel="stylesheet" />
  </head>

  <body>
    <nav>
      <div class="navbar-content">
        <div class="left">
          <a class="navbar-option" href="#news">
            <?php echo NEWS ?>
          </a>
        </div>
        <div class="left">
          <a class="navbar-option" href="">
            <?php echo CONTEST ?>
          </a>
        </div>
        <div class="left">
          <a class="navbar-option" href="">
            <?php echo SPONSORS ?>
          </a>
        </div>
        <div class="left">
          <a class="navbar-option" href="">
            <?php echo SUCESS ?>
          </a>
        </div>
        <div class="left">
          <a class="navbar-option" href="">
            <?php echo TEAM ?>
          </a>
        </div>
        <div class="right">
          <a class="navbar-option dropdown" href="">
            <?php echo LANGUAGE ?>
              <i class="mdi mdi-arrow-down-drop-circle"></i>
          </a>
          <div class="dropdown-content">
            <a href="">
              <?php echo TEAM ?>
            </a>
            <a href="">
              <?php echo TEAM ?>
            </a>
          </div>
        </div>
    </nav>

    <header>
      <section class="logo-header">

      </section>
      <a href="#news">
        <div class="fab">
          <i class="mdi mdi-arrow-down mdi-24px"></i>
        </div>
      </a>
    </header>

    <main>
      <section id="news" class="news">
        <h1><?php echo HEADER_NEWS ?></h1>
        <div class="row">
          <div class="card news-card">
            <div class="news-upper">
              <img src="<?php echo htmlspecialchars($news[0] -> image) ?>" />
              <h4><?php echo $news[0] -> title ?></h4>
            </div>
            <div class="news-lower">
              <h5><?php echo $news[0] -> subtitle ?></h5>
              <p>
                <?php echo $news[0] -> preview ?>
              </p>
              <a href="news.php?ind=0">
                <?php echo BUTTON_NEWS ?>
              </a>
            </div>
          </div>
          <div class="card news-card">
            <div class="news-upper">
              <img src="<?php echo htmlspecialchars($news[0] -> image) ?>" />
              <h4><?php echo $news[0] -> title ?></h4>
            </div>
            <div class="news-lower">
              <h5><?php echo $news[0] -> subtitle ?></h5>
              <p>
                <?php echo $news[0] -> preview ?>
              </p>
              <a href="news.php?ind=1">
                <?php echo BUTTON_NEWS ?>
              </a>
            </div>
          </div>
          <div class="card news-card">
            <div class="news-upper">
              <img src="<?php echo htmlspecialchars($news[0] -> image) ?>" />
              <h4><?php echo $news[0] -> title ?></h4>
            </div>
            <div class="news-lower">
              <h5><?php echo $news[0] -> subtitle ?></h5>
              <p>
                <?php echo $news[0] -> preview ?>
              </p>
              <a href="news.php?ind=2">
                <?php echo BUTTON_NEWS ?>
              </a>
            </div>
          </div>
          <div class="card news-card">
            <div class="news-upper">
              <img src="<?php echo htmlspecialchars($news[0] -> image) ?>" />
              <h4><?php echo $news[0] -> title ?></h4>
            </div>
            <div class="news-lower">
              <h5><?php echo $news[0] -> subtitle ?></h5>
              <p>
                <?php echo $news[0] -> preview ?>
              </p>
              <a href="news.php?ind=3">
                <?php echo BUTTON_NEWS ?>
              </a>
            </div>
          </div>
        </div>
      </section>
    </main>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="assets/js/functions.js"></script>
  </body>

  </html>