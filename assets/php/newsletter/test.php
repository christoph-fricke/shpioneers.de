<?php
include('dbConnector.php');
$sql = "SELECT * FROM subscribers";
$res = $pdo -> query($sql);
var_dump($res -> fetchAll());
?>
