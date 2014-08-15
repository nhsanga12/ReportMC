<?php
session_start();
if (!$_SESSION['user']) {
	$_SESSION['user']['login'] 		= 	false;
	$_SESSION['user']['name'] 		= 	false;
	$_SESSION['user']['id'] 		= 	false;
}
?>
