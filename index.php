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
  </head>

  <body>
    <nav>
      <ul class="navbar-content">
        <li class="navbar-option">
          <a href="">
            <?php echo NEWS ?>
          </a>
        </li>
        <li class="navbar-option">
          <a href="">
            <?php echo CONTEST ?>
          </a>
        </li>
        <li class="navbar-option">
          <a href="">
            <?php echo SPONSORS ?>
          </a>
        </li>

        <li class="navbar-option">
          <a href="">
            <?php echo SUCESS ?>
          </a>
        </li>
        <li class="navbar-option">
          <a href="">
            <?php echo TEAM ?>
          </a>
        </li>
        <li class="navbar-option">
          <a href="">
            <?php echo LANGUAGE ?>
          </a>
        </li>
      </ul>
    </nav>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>    
    <script src="assets/js/functions.js"></script>
  </body>

  </html>