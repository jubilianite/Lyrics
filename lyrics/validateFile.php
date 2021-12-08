<?php
// Initialize the session
session_start();

//Hide PHP Errors
error_reporting(0);
ini_set('display_errors', 0);

?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">

    <style>

body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #04AA6D;
  color: white;
}

.topnav .icon {
  display: none;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
}
</style>

   <div class="col-md-6 offset-md-3 mt-5">
        <br>
        <h1>File Validation Completed</h1>

<?php
if ($_SESSION["role"] != "Admin") {
    header("location: index.php");
} else {
	$target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
	
	}
	
	// Check if file already exists
	if (file_exists($target_file)) {
	echo "Another file with the same name exists! Overwriting it...<br>";
	$uploadOk = 1;
	}
	
	// Allow certain file formats
	if($imageFileType != "txt") {
	echo "Sorry, only selected types of file are allowed. <br>";
	$uploadOk = 0;
	}
	
	if(htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])) != "ProPresenter Export.txt") {
		echo "Sorry, this file is not valid<br>";
		$uploadOk = 0;
	}
	
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
	echo "Sorry, your file was not uploaded. <br>";
	// if everything is ok, try to upload file
	} else {
	if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
		header( "refresh:3;url=reload.php" );
	} else {
		echo "<p>Sorry, there was an error uploading your file. ";
	}
	}
}
?>

</div>