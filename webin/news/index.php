<?php 
	session_start();
	if(!($_SESSION['login'] === True)) die();
function printnews(){
	$news = json_decode(file_get_contents('../../content/news/newsen-en.json'));
	$i = 0;
	$length = 32;
	$secure = true;

	$_SESSION['newstoken']= bin2hex(openssl_random_pseudo_bytes($length, $secure));
	foreach($news as $new){
	// echo '<a href="newsedit.php?index='.$i.'">'.$new -> title .'</a>&nbsp;<a href="removenews.php?index='.$i++.'&token='.$_SESSION['newstoken'].'">Remove</a><br>';
    echo '<tr><td class="table__elem td-name">'. $new -> title .'</td><td class="table__elem td-icon"><a class="edit" href=""><i class="mdi mdi-pencil mdi-dark mdi-24px"></i></a></td><td class="table__elem td-icon"><a class="delete" href=""><i class="mdi mdi-delete mdi-dark mdi-24px"></i></a></td></tr>';
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
            <?php printnews() ?>
        </table>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script>
            // This has to stay in this file
            var token = "<?php echo $_SESSION['newstoken']; ?>";
        </script>
        <script src="../../assets/js/webinterface.js"></script>
    </body>

</html>