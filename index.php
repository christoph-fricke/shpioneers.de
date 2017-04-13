<?php
include('assets/php/checkLanguage.php');
include('assets/php/news.php');
include('assets/php/achievment.php');
$tournament = array();
define('PATH_TO_ROOT','');
$tournament[] = getcontent(0);
$tournament[] = getcontent(1);
$tournament[] = getcontent(2);

?>

    <!DOCTYPE html>
    <html lang="<?php setHtmlLang() ?>">

    <head>
        <title>
            <?php echo TITLE ?>
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

        <link rel="stylesheet" href="assets/css/style.css" />
        <link rel="stylesheet" href="assets/css/materialdesignicons.min.css" />
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
                        <hr>
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
                    <a class="logo" href="#home">
                        <img class="logo logo-svg" src="assets/icons/logo_text.svg" />
                    </a>
                </div>
            </div>
        </nav>

        <nav class="desktop">
            <div class="navbar-content">
                <div class="left">
                    <a class="logo" href="#home">
                        <img class="logo logo-svg" src="assets/icons/logo_text.svg" />
                    </a>
                </div>
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
            <div class="clearfix"></div>
            <a href="#news">
                <div class="fab">
                    <i class="mdi mdi-arrow-down mdi-24px"></i>
                </div>
            </a>
        </header>

        <main>
            <section id="news" class="news">
                <h1>
                    <?php echo HEADER_NEWS ?>
                </h1>
                <!--<a class="btn-small top_left" href="">
<?php echo BUTTON_OLD_NEWS?>
</a>-->
                <div class="row">
                    <div class="card news-card">
                        <div class="news-upper" style=" background-image: url(<?php echo htmlspecialchars($news[0] -> image) ?>);">
                            <h4>
                                <?php echo $news[0] -> title ?>
                            </h4>
                        </div>
                        <div class="news-lower">
                            <h5>
                                <?php echo $news[0] -> subtitle ?>
                            </h5>
                            <p>
                                <?php echo $news[0] -> preview ?>
                            </p>
                            <div class="news-date">
                                <?php echo $news[0] -> date ?>
                            </div>
                            <div class="news-content">
                                <?php echo $news[0] -> text ?>
                            </div>
                            <a class="btn-small maximise" href="">
                                <?php echo BUTTON_NEWS ?>
                            </a>
                            <a class="btn-small minimise" href="">
                                <?php echo BUTTON_NEWS_MIN ?>
                            </a>
                        </div>
                    </div>
                    <div class="card news-card">
                        <div class="news-upper" style=" background-image: url(<?php echo htmlspecialchars($news[1] -> image) ?>);">
                            <h4>
                                <?php echo $news[1] -> title ?>
                            </h4>
                        </div>
                        <div class="news-lower">
                            <h5>
                                <?php echo $news[1] -> subtitle ?>
                            </h5>
                            <p>
                                <?php echo $news[1] -> preview ?>
                            </p>
                            <div class="news-date">
                                <?php echo $news[1] -> date ?>
                            </div>
                            <div class="news-content">
                                <?php echo $news[1] -> text ?>
                            </div>
                            <a class="btn-small maximise" href="">
                                <?php echo BUTTON_NEWS ?>
                            </a>
                            <a class="btn-small minimise" href="">
                                <?php echo BUTTON_NEWS_MIN ?>
                            </a>
                        </div>
                    </div>
                    <div class="card news-card">
                        <div class="news-upper" style=" background-image: url(<?php echo htmlspecialchars($news[2] -> image) ?>);">
                            <h4>
                                <?php echo $news[2] -> title ?>
                            </h4>
                        </div>
                        <div class="news-lower">
                            <h5>
                                <?php echo $news[2] -> subtitle ?>
                            </h5>
                            <p>
                                <?php echo $news[2] -> preview ?>
                            </p>
                            <div class="news-date">
                                <?php echo $news[2] -> date ?>
                            </div>
                            <div class="news-content">
                                <?php echo $news[2] -> text ?>
                            </div>
                            <a class="btn-small maximise" href="">
                                <?php echo BUTTON_NEWS ?>
                            </a>
                            <a class="btn-small minimise" href="">
                                <?php echo BUTTON_NEWS_MIN ?>
                            </a>
                        </div>
                    </div>
                    <div class="card news-card">
                        <div class="news-upper" style=" background-image: url(<?php echo htmlspecialchars($news[3] -> image) ?>);">
                            <h4>
                                <?php echo $news[3] -> title ?>
                            </h4>
                        </div>
                        <div class="news-lower">
                            <h5>
                                <?php echo $news[3] -> subtitle ?>
                            </h5>
                            <p>
                                <?php echo $news[3] -> preview ?>
                            </p>
                            <div class="news-date">
                                <?php echo $news[3] -> date ?>
                            </div>
                            <div class="news-content">
                                <?php echo $news[3] -> text ?>
                            </div>
                            <a class="btn-small maximise" href="">
                                <?php echo BUTTON_NEWS ?>
                            </a>
                            <a class="btn-small minimise" href="">
                                <?php echo BUTTON_NEWS_MIN ?>
                            </a>
                        </div>
                    </div>
                </div>
            </section>
            <div class="clearfix"></div>
        </main>

        <section id="contest" class="contest">
            <main class="inner-contest">
                <h1>
                    <?php echo HEADER_CONTEST ?>
                </h1>
                <p>
                    <?php echo TEXT_CONTEST ?>
                </p>
                <a class="btn-big" href="https://www.f1inschools.de/" target="_blank">
                    <?php echo BUTTON_CONTEST ?>
                </a>
            </main>
        </section>
        <div class="clearfix"></div>

        <main>
            <section id="sponsors" class="sponsors">
                <h1>
                    <?php echo HEADER_SPONSORS ?>
                </h1>
                <div class="row">
                    <div class="card sponsors-card">
                        <div class="icon-area partner">
                        </div>
                        <h2>
                            <?php echo SUBHEADERS_SPONSORS_0 ?>
                        </h2>
                        <p>
                            <?php echo TEXT_SPONSORS_0 ?>
                        </p>
                        <a class="btn-small" href="sponsors/?type=partner">
                            <?php echo BUTTON_SPONSORS ?>
                        </a>
                    </div>
                    <div class="card sponsors-card">
                        <div class="icon-area thingssponsor">
                        </div>
                        <h2>
                            <?php echo SUBHEADERS_SPONSORS_1 ?>
                        </h2>
                        <p>
                            <?php echo TEXT_SPONSORS_1 ?>
                        </p>
                        <a class="btn-small" href="sponsors/?type=service">
                            <?php echo BUTTON_SPONSORS ?>
                        </a>
                    </div>
                    <div class="card sponsors-card">
                        <div class="icon-area financesponsor">
                        </div>
                        <h2>
                            <?php echo SUBHEADERS_SPONSORS_2 ?>
                        </h2>
                        <p>
                            <?php echo TEXT_SPONSORS_2 ?>
                        </p>
                        <a class="btn-small" href="sponsors/?type=finance">
                            <?php echo BUTTON_SPONSORS ?>
                        </a>
                    </div>
                </div>
            </section>
            <div class="clearfix"></div>

            <section id="sucess" class="sucess">
                <h1>
                    <?php echo HEADER_SUCESS ?>
                </h1>
                <div class="row">
                    <div class="card sucess-card">
                        <div class="trophy">
                            <svg class="icon-big" viewBox="0 0 24 24">
                                <path d="M20.2,2H19.5H18C17.1,2 16,3 16,4H8C8,3 6.9,2 6,2H4.5H3.8H2V11C2,12 3,13 4,13H6.2C6.6,15 7.9,16.7 11,17V19.1C8.8,19.3 8,20.4 8,21.7V22H16V21.7C16,20.4 15.2,19.3 13,19.1V17C16.1,16.7 17.4,15 17.8,13H20C21,13 22,12 22,11V2H20.2M4,11V4H6V6V11C5.1,11 4.3,11 4,11M20,11C19.7,11 18.9,11 18,11V6V4H20V11Z"
                                />
                            </svg>
                        </div>
                        <h2>
                            <?php echo $tournament[0][2] -> place . ". " . PLACE ." ". $tournament[0][0] -> title  ?>
                        </h2>
                        <p>
                            <?php echo $tournament[0][0] -> name. ' | ' . $tournament[0][0] -> location ?>
                        </p>
                        <a class="btn-small" href="achievments/?index=0">
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
                        <h2>
                            <?php echo $tournament[1][2] -> place . ". " . PLACE ." ". $tournament[1][0] -> title  ?>
                        </h2>
                        <p>
                            <?php echo $tournament[1][0] -> name. ' | ' . $tournament[1][0] -> location ?>
                        </p>
                        <a class="btn-small" href="achievments/?index=1">
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
                        <h2>
                            <?php echo $tournament[2][2] -> place . ". " . PLACE ." ". $tournament[2][0] -> title  ?>
                        </h2>
                        <p>
                            <?php echo $tournament[2][0] -> name. ' | ' . $tournament[2][0] -> location ?>
                        </p>
                        <a class="btn-small" href="achievments/?index=2">
                            <?php echo BUTTON_SUCESS ?>
                        </a>
                    </div>
                </div>
            </section>
            <div class="clearfix"></div>
        </main>

        <section id="team" class="team">
            <main class="inner-team">
                <h1>
                    <?php echo HEADER_TEAM ?>
                </h1>
                <p>
                    <?php echo TEXT_TEAM ?>
                </p>
                <a class="btn-big" href="team/">
                    <?php echo BUTTON_TEAM ?>
                </a>
            </main>
        </section>
        <div class="clearfix"></div>

        <footer>
            <main>
                <div class="row">
                    <div class="contact">
                        <h2>
                            <?php echo HEADER_FOOTER_0 ?>
                        </h2>
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
                            <h2>
                                <?php echo HEADER_FOOTER_1 ?>
                            </h2>
                            <h6>
                                <?php echo SUBHEADER_IMPRESSUM_0 ?>
                            </h6>
                            <p>
                                <?php echo TEXT_IMPRESSUM_0 ?>
                            </p>
                            <h6>
                                <?php echo SUBHEADER_IMPRESSUM_1 ?>
                            </h6>
                            <p>
                                <?php echo TEXT_IMPRESSUM_1 ?>
                            </p>
                            <h6>
                                <?php echo SUBHEADER_IMPRESSUM_2 ?>
                            </h6>
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
</a> -->
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
                <svg class="credits-icon credits-icon--speedometer" viewBox="0 0 24 24">
                    <path d="M0 0h24v24H0V0z" fill="none" />
                    <path d="M12,16A3,3 0 0,1 9,13C9,11.88 9.61,10.9 10.5,10.39L20.21,4.77L14.68,14.35C14.18,15.33 13.17,16 12,16M12,3C13.81,3 15.5,3.5 16.97,4.32L14.87,5.53C14,5.19 13,5 12,5A8,8 0 0,0 4,13C4,15.21 4.89,17.21 6.34,18.65H6.35C6.74,19.04 6.74,19.67 6.35,20.06C5.96,20.45 5.32,20.45 4.93,20.07V20.07C3.12,18.26 2,15.76 2,13A10,10 0 0,1 12,3M22,13C22,15.76 20.88,18.26 19.07,20.07V20.07C18.68,20.45 18.05,20.45 17.66,20.06C17.27,19.67 17.27,19.04 17.66,18.65V18.65C19.11,17.2 20,15.21 20,13C20,12 19.81,11 19.46,10.1L20.67,8C21.5,9.5 22,11.18 22,13Z"
                    />
                </svg>
                <span class="credits-span">&nbsp;by&nbsp;</span>
                <span class="credits-span credits-span--bold">Christoph&nbsp;Fricke</span>
            </a>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="assets/js/functions.js"></script>
        <script src="assets/js/email_responsivnews.js"></script>
    </body>

    </html>