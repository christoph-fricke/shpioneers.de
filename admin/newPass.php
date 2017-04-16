<?php
require_once 'passwordLib.php';
echo password_hash($_GET['pass'],PASSWORD_DEFAULT);
?>
