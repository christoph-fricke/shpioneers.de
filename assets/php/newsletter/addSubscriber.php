<?php
session_start();
//Checks if the script is called with a valid token and if an email adress is provided.
if ((!isset($_SESSION['token']) || $_SESSION['token'] != $_POST['token']) && !isset($_POST['email'])) {
    die('No token and/or email is provided.');
}

require_once('dbConnector.php');

$email = $_POST['email'];
$secure = true;
$hash = bin2hex(openssl_random_pseudo_bytes(64, $secure));

try {
    $sql = "INSERT INTO subscribers (email, hash) VALUES (:email, :hash)";
    $prepared = $pdo -> prepare($sql);
    $prepared -> execute(array('email' => $email, 'hash' => $hash));

    $status = 1;
}
catch(PDOExeption $e) {
    $status = 0;
}

//Return feedback to the client
echo $status . ';' . newToken();

function newToken() {
    $length = 32;
    $secure = true;
    
    $newToken = bin2hex(openssl_random_pseudo_bytes($length, $secure));
    $_SESSION['token'] = $newToken;
    return $newToken;
}
?>