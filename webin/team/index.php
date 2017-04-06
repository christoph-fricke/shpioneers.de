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
		echo'<a href="change.php?index='.$i.'">'.$mem -> name .'</a>&nbsp<a href="remove.php?index='.$i++.'&token='.$_SESSION['teamtoken'].'">Remove</a><br>';
	}
}
?>
    <!DOCTYPE>
    <html>

    <body>
        <table class="table-itemList">
            <tr>
                <td>
                    <a href="">Add new item</a>
                </td>
            </tr>
        </table>
    </body>

    </html>