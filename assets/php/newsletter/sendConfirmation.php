<?php
//This gets included in addPending.php and sends a confirmation email to the user
switch($lang){
	case 0:
		include('lang/de.php');
		break;
	case 1:
		include('lang/en.php');
		break;
	default:
		include('lang/de.php');
		break;
}
$header = "FROM: <info@shpioneers.de>\nContent-Type:text/html;charset=UTF-8";
$to = $email;
$subject = CONFIRM_SUB;  
$message = MESSAGE_FRONT. "<a href=\"http://shpioneers.de/confirm.php?hash={$hash}\">".MESSAGE_MIDDLE."</a>". MESSAGE_BACK;
 try {
        mail($to, $subject, $message, $header);
        $status = 1;
    } catch(Exeption $e) {
        $status = 0;
    }


?>
