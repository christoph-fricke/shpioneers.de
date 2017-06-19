<?php
session_start();
//Checks if the script is called with a valid token and if an email adress is provided.
if ((!isset($_SESSION['token']) || $_SESSION['token'] != $_POST['token']) && !isset($_POST['email'])) {
    die('No token and/or email is provided.');
}

require_once('dbConnector.php');

$email = $_POST['email'];

try {
    $sql = "INSERT INTO subscribers (email, hash) VALUES (:email, :hash)";
    $prepared = $pdo -> prepare($sql);
    $prepared -> execute(array('email' -> $email, 'hash' -> $hash));
}
catch(PDOExeption $e) {
    echo $e -> getMessage();
    echo $e -> getTraceAsString();  
}

//TODO: Add hashing script
?>