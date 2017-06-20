<?php
session_start();
require_once('../../../admin/passwordLib.php');
//Checks if the script is called with a valid token and if an email adress is provided.
if ((!isset($_SESSION['token']) || $_SESSION['token'] != $_POST['token']) && !isset($_POST['email'])) {
    die('No token and/or email is provided.');
}

require_once('dbConnector.php');

$email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
echo $email;
$hash =	password_hash($email,PASSWORD_DEFAULT); 
$lang = 1;// TODO somehow include the language
try {
    $sql = "INSERT INTO pendingSubscribers ( email, hash, date, lang) VALUES (:email, :hash, NOW(), :lang)";
    $prepared = $pdo -> prepare($sql);
    $prepared -> execute(array('email' => $email, 'hash' => $hash, 'lang' => $lang)); 

    $status = 1;
}
catch(Exception $e) {
    $status = 0;
}

//Return feedback to the client
echo $status . ';' . newToken();
include('sendConfirmation.php');

function newToken() {
    $length = 32;
    $secure = true;
    
    $newToken = bin2hex(openssl_random_pseudo_bytes($length, $secure));
    $_SESSION['token'] = $newToken;
    return $newToken;
}
?>
