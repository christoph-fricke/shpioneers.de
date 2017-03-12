<?php
$h = getjson(0);
echo $h -> title;




function getjson($id){
switch($id){
case 0: 
return json_decode(file_get_contents('content/achievments/dm-2016.json'));
}
}
?>
