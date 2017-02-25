<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
// this was debugging although the php doesnt show syntx errors
writenews(1); //calling the function to see wether it does what it promises
function writenews(int $index){ // the index describes the number to which news number news is supposed to be displayed
    session_start();
    if(!isset($_SESSION['lang'])){
        $_SESSION['lang'] = "de-de";
    }
    if($_SESSION['lang'] == "de-de"){
        $String = file_get_contents('../../content/news/newsde-de.json');
    }
    else{
        $String = file_get_contents('../../content/news/newsen-en.json');
    }
    // choosing the language specific news data
    $json = json_decode($String)  ;
    $i = 0; // variable to keep count of index
    foreach($json   as $thisnews){
        echo '<div class="news-card"><div class="news-top"><img class="news-img"';
        echo 'src="'. $thisnews ->  image.'"/>';
        echo '<div class="news-title">'. $thisnews ->  title. "</div>";
        echo '</div>';
        echo '<div class="news-bottom">';
        echo '<div class="news-prev">'. $thisnews ->  preview. "</div>";
        echo '<a class="news-button" href="newss.php?ind='.$i.'"> MEHR ERFAHREN</a>';
        echo '</div></div>';
        // output, well i could write all this in one line but that would be unreadable so i dont
        if($i == $index){ // manual for loop because during development i was caugt up in foreach and i am to lazy to switch it
            break;
    }
    else{
        $i++;
    }
}
}
?>