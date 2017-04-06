<?php
session_start();
if(!($_SESSION['login'] === True)) die();
function printmembers(){
	$length = 32;
	$secure = true;
	$_SESSION['teamtoken'] = bin2hex(openssl_random_pseudo_bytes($length, $secure));
	$team = json_decode(file_get_contents("../../content/team/team-en-en.json"));
	$i = 0;
	foreach($team as $mem){
		// echo'<a href="change.php?index='.$i.'">'.$mem -> name .'</a>&nbsp<a href="remove.php?index='.$i++.'&token='.$_SESSION['teamtoken'].'">Remove</a><br>';
        echo '<tr><td class="table__elem td-name">'. $mem -> name .'</td><td class="table__elem td-icon"><a href=""><i class="mdi mdi-pencil mdi-dark mdi-24px"></i></a></td><td class="table__elem td-icon"><a href=""><i class="mdi mdi-delete mdi-dark mdi-24px"></i></a></td></tr>';
	}
}
?>
    <!DOCTYPE>
    <html>

    <head>
        <link rel="stylesheet" href="../../assets/css/webinterface/admin.css" />
        <link rel="stylesheet" href="../../assets/css/materialdesignicons.min.css" />
    </head>

    <body>
        <table class="table-itemList">
            <?php printmembers() ?>
        </table>
    </body>

    </html>