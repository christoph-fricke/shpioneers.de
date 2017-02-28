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
          <a class="navbar-option" href="#contest">
            <?php echo CONTEST ?>
          </a>
        </div>
        <div class="left">
          <a class="navbar-option" href="#sponsors">
            <?php echo SPONSORS ?>
          </a>
        </div>
        <div class="left">
          <a class="navbar-option" href="#sucess">
            <?php echo SUCESS ?>
          </a>
        </div>
        <div class="left">
          <a class="navbar-option" href="#team">
            <?php echo TEAM ?>
          </a>
        </div>
        <div class="right">
          <a class="navbar-option dropdown" href="">
            <?php echo LANGUAGE ?>
              <i class="mdi mdi-arrow-down-drop-circle"></i>
          </a>
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
              <a class="btn-small" href="news.php?ind=0">
                <?php echo BUTTON_NEWS ?>
              </a>
            </div>
          </div>
          <div class="card news-card">
            <div class="news-upper">
              <img src="<?php echo htmlspecialchars($news[1] -> image) ?>" />
              <h4><?php echo $news[1] -> title ?></h4>
            </div>
            <div class="news-lower">
              <h5><?php echo $news[1] -> subtitle ?></h5>
              <p>
                <?php echo $news[1] -> preview ?>
              </p>
              <a class="btn-small" href="news.php?ind=1">
                <?php echo BUTTON_NEWS ?>
              </a>
            </div>
          </div>
          <div class="card news-card">
            <div class="news-upper">
              <img src="<?php echo htmlspecialchars($news[2] -> image) ?>" />
              <h4><?php echo $news[2] -> title ?></h4>
            </div>
            <div class="news-lower">
              <h5><?php echo $news[2] -> subtitle ?></h5>
              <p>
                <?php echo $news[2] -> preview ?>
              </p>
              <a class="btn-small" href="news.php?ind=2">
                <?php echo BUTTON_NEWS ?>
              </a>
            </div>
          </div>
          <div class="card news-card">
            <div class="news-upper">
              <img src="<?php echo htmlspecialchars($news[3] -> image) ?>" />
              <h4><?php echo $news[3] -> title ?></h4>
            </div>
            <div class="news-lower">
              <h5><?php echo $news[3] -> subtitle ?></h5>
              <p>
                <?php echo $news[3] -> preview ?>
              </p>
              <a class="btn-small" href="news.php?ind=3">
                <?php echo BUTTON_NEWS ?>
              </a>
            </div>
          </div>
        </div>
      </section>
    </main>

    <section id="contest" class="contest">
      <main class="inner-contest">
        <h1><?php echo HEADER_CONTEST ?></h1>
        <p>
          <?php echo TEXT_CONTEST ?>
        </p>
        <a class="btn-big" href="">
          <?php echo BUTTON_CONTEST ?>
        </a>
      </main>
    </section>

    <main>
      <section id="sponsors" class="sponsors">
        <h1><?php echo HEADER_SPONSORS ?></h1>
        <div class="row">
          <div class="card sponsors-card">
            <div class="icon-area">
            </div>
            <h2><?php echo SUBHEADERS_SPONSORS_0 ?></h2>
            <p>
              <?php echo TEXT_SPONSORS_0 ?>
            </p>
            <a class="btn-small" href="">
              <?php echo BUTTON_SPONSORS ?>
            </a>
          </div>
          <div class="card sponsors-card">
            <div class="icon-area">
            </div>
            <h2><?php echo SUBHEADERS_SPONSORS_1 ?></h2>
            <p>
              <?php echo TEXT_SPONSORS_1 ?>
            </p>
            <a class="btn-small" href="">
              <?php echo BUTTON_SPONSORS ?>
            </a>
          </div>
          <div class="card sponsors-card">
            <div class="icon-area">
            </div>
            <h2><?php echo SUBHEADERS_SPONSORS_2 ?></h2>
            <p>
              <?php echo TEXT_SPONSORS_2 ?>
            </p>
            <a class="btn-small" href="">
              <?php echo BUTTON_SPONSORS ?>
            </a>
          </div>
        </div>
      </section>

      <section id="sucess" class="sucess">
        <h1><?php echo HEADER_SUCESS ?></h1>
        <div class="row">
          <div class="card sucess-card">
            <div class="trophy">
              <svg class="icon-big" viewBox="0 0 24 24">
                <path d="M20.2,2H19.5H18C17.1,2 16,3 16,4H8C8,3 6.9,2 6,2H4.5H3.8H2V11C2,12 3,13 4,13H6.2C6.6,15 7.9,16.7 11,17V19.1C8.8,19.3 8,20.4 8,21.7V22H16V21.7C16,20.4 15.2,19.3 13,19.1V17C16.1,16.7 17.4,15 17.8,13H20C21,13 22,12 22,11V2H20.2M4,11V4H6V6V11C5.1,11 4.3,11 4,11M20,11C19.7,11 18.9,11 18,11V6V4H20V11Z"
                />
              </svg>
            </div>
            <h2><?php echo SUBHEADERS_SUCESS_0 ?></h2>
            <p>
              <?php echo TEXT_SUCESS_0 ?>
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
            <h2><?php echo SUBHEADERS_SUCESS_1 ?></h2>
            <p>
              <?php echo TEXT_SUCESS_1 ?>
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
            <h2><?php echo SUBHEADERS_SUCESS_2 ?></h2>
            <p>
              <?php echo TEXT_SUCESS_2 ?>
            </p>
            <a class="btn-small" href="">
              <?php echo BUTTON_SUCESS ?>
            </a>
          </div>
        </div>
      </section>
    </main>

    <section id="team" class="team">
      <main class="inner-team">
        <h1><?php echo HEADER_TEAM ?></h1>
        <p>
          <?php echo TEXT_TEAM ?>
        </p>
        <a class="btn-big" href="">
          <?php echo BUTTON_TEAM ?>
        </a>
      </main>
    </section>

    <footer>
      <main>
        <div class="row">
          <div class="contact">
            <h2><?php echo HEADER_FOOTER_0 ?></h2>
            <form action="" method="POST">
              <input type="text" name="name" placeholder="<?php echo NAME_FORM ?>" required />
              <input type="email" name="email" placeholder="<?php echo EMAIL_FORM ?>" required />
              <textarea name="message" placeholder="<?php echo MESSAGE_FORM ?>"></textarea>
              <input class="btn-big" type="submit" value="<?php echo BUTTON_FORM ?>"/>
            </form>
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
              <a class="btn-big" href="https://www.facebook.com/SHpioneers/">
                <?php echo BUTTON_SOCIAL_0 ?>
              </a>
              <a class="btn-big" href="https://twitter.com/SHpioneers/">
                <?php echo BUTTON_SOCIAL_1 ?>
              </a>
              <a class="btn-big" href="https://www.instagram.com/shpioneers">
                <?php echo BUTTON_SOCIAL_2 ?>
              </a>
              <a class="btn-big" href="">
                <?php echo BUTTON_SOCIAL_3 ?>
              </a>
              <a class="btn-big" href="">
                <?php echo BUTTON_SOCIAL_4 ?>
              </a>
            </div>
          </div>
        </div>
        <p class="copyright">
          <?php echo COPYRIGHT ?>
        </p>
      </main>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="assets/js/functions.js"></script>
  </body>

  </html>
