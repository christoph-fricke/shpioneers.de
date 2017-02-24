<?php
include('assets/php/checkLanguage.php');
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

    <meta name="author" content="Christoph Fricke" />
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
  </head>

  <body>
    <nav>
      <div class="navbar-content">
        <div class="left">
          <a class="active navbar-option" href="">
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
          <a class="navbar-option" href="">
            <span class="left nav-span"><?php echo LANGUAGE ?></span>
            <svg class="icon-nav left" viewBox="0 0 30 30">
                <path d="M7 10l5 5 5-5z"/>
                <path d="M0 0h24v24H0z" fill="none"/>
            </svg>
          </a>
    </nav>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="assets/js/functions.js"></script>
  </body>

  </html>