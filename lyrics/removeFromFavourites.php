<?php
	//session_start();
	//session_unset();
	//session_destroy();
	
session_start();
//$_SESSION["favourites"] = 1;
//echo $_SESSION["favourites"];
$id = $_POST['id'];
$id .= "-";
$_SESSION["favourites"] = str_replace($id, "", $_SESSION["favourites"]);
echo $_SESSION["favourites"];
?>