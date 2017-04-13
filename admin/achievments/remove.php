<?php
session_start();
if(!($_SESSION['login'] === True) || $_SESSION['achievtoken'] != $_GET['token']) die();
$list = json_decode(file_get_contents('../../content/achievments/list.json'));
exec('rm -r ../../content/achievments/'. $list[$_GET['index']]);
array_splice($list,$_GET['index'],1);
file_put_contents('../../content/achievments/list.json',json_encode($list));
echo 'suc';
?>
