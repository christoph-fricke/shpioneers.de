<?php 
	session_start();
	if(!($_SESSION['login'] === True)) die();
define('PATH_TO_ROOT','../../');
function printtournaments(){
	$i = 0;
	$length = 32;
	$secure = true;

	$_SESSION['achievtoken']= bin2hex(openssl_random_pseudo_bytes($length, $secure));
	
	for($i = 0; $i < sizeof(json_decode(file_get_contents(PATH_TO_ROOT . 'content/achievments/list.json'))); $i++){
	// echo '<a href="newsedit.php?index='.$i.'">'.$new -> title .'</a>&nbsp;<a href="removenews.php?index='.$i++.'&token='.$_SESSION['newstoken'].'">Remove</a><br>';
    echo '<tr><td class="table__elem td-name">'. getcontent($i) -> title .'</td><td class="table__elem td-icon"><a class="change_order up" href=""><i class="mdi mdi-chevron-up mdi-dark mdi-24px"></i></a></td><td class="table__elem td-icon"><a class="change_order down" href=""><i class="mdi mdi-chevron-down mdi-dark mdi-24px"></i></a></td><td class="table__elem td-icon"><a class="edit" href=""><i class="mdi mdi-pencil mdi-dark mdi-24px"></i></a></td><td class="table__elem td-icon"><a class="delete" href=""><i class="mdi mdi-delete mdi-dark mdi-24px"></i></a></td></tr>';
	}
}
function getcontent($id){
$name = "";
$rvalue = array();
$index = json_decode(file_get_contents(PATH_TO_ROOT . 'content/achievments/list.json'));
if(!isset($index[$id])) $name = $index[0];
else $name = $index[$id];
return  json_decode(file_get_contents(PATH_TO_ROOT . 'content/achievments/'. $name .'/en-en.json'));
}
?>
<!DOCTYPE>
<html>

    <head>
        <link rel="stylesheet" href="../../assets/css/webinterface/admin.css" />
        <link rel="stylesheet" href="../../assets/css/materialdesignicons.min.css" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Roboto:400,700" />
    </head>

    <body>
        <table class="table-itemList">
            <tr>
                <td class="table__elem">
                    <a class="edit table__elem--edit" href=""> Add new element</a>
                </td>
            </tr>
            <?php printtournaments() ?>
        </table>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script>
            // This has to stay in this file
            var token = "<?php echo $_SESSION['achievtoken']; ?>";
        </script>
        <script src="../../assets/js/webinterface.js"></script>
    </body>

</html>
