<?php
session_start();
if(!($_SESSION['login'] === True))die();
?>
<!DOCTYPE>
<html>
<body>
<a href="sponsorlist.php?type=partner">Partner</a>
<a href="sponsorlist.php?type=service">Service</a>
<a href="sponsorlist.php?type=finance">Finance</a>
</body>
</html>
