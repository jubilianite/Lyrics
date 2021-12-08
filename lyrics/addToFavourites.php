<?php
	//session_start();
	//session_unset();
	//session_destroy();
	
session_start();
//$_SESSION["favourites"] = 1;
//echo $_SESSION["favourites"];
echo $_POST['id'];
$_SESSION["favourites"] .= $_POST['id'];
$_SESSION["favourites"] .= "-";
?>