<?php
// Initialize the session
session_start();

//Hide PHP Errors
error_reporting(0);
ini_set('display_errors', 0);

// Verify session
if ($_SESSION["role"] != "Admin") {
    header("location: index.php");
}

//SQL Connection
$config = parse_ini_file('../dbconfig.ini');
$conn = new mysqli($config['dbservername'], $config['dbusername'], $config['dbpassword'], $config['dbname']);

// Check SQL Connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html>
<body>
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
        <h1>Upload Lyrics</h1>
        <form enctype="multipart/form-data" action="validateFile.php" method="post">
          <div class="form-group">
  <div class="custom-file">
    <input type="file" class="custom-file-input" id="fileToUpload" name="fileToUpload" required>
    <label class="custom-file-label" for="validatedCustomFile">Upload File Here...</label>
  </div>
  <!--<input type="file" name="fileToUpload" id="fileToUpload">-->
          <hr>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div> 
    


</body>
</html>