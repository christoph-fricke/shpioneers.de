<?php
    session_start();
    if(isset($_SESSION['notification'])) {
        echo "false";
    }
    else {
        echo "true";
        $_SESSION['notification'] = 'false';
    }
?>