<?php

session_start();

//Hide PHP Errors
error_reporting(0);
ini_set('display_errors', 0);

// SQL Connection
$config = parse_ini_file('../dbconfig.ini');
$conn = new mysqli($config['dbservername'], $config['dbusername'], $config['dbpassword'], $config['dbname']);

// Check SQL Connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SESSION["role"] == "Admin") {
    header("location: AdminDashboard.php");
}



$sql = 'SELECT * FROM information';
                    if ($result = $conn->query($sql)) {
                        while ($row = $result->fetch_assoc()) {
                            $version = $row["version"];
                            $dbupdated = $row["dbupdated"];
                            $totalsongs = $row["totalsongs"];
						}
					}
					
// Define variables and initialize with empty values
$password = "";
$password_err = $login_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($password_err)){
		
                        function sanitize_input($data) {
                            $data = trim($data);
                            $data = stripslashes($data);
                            $data = htmlspecialchars($data);
                            return $data;
                        }		

                        if($_POST["password"] == "387606hcc"){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION['role'] = "Admin";
                            
                            // Redirect user to welcome page
                            header("location: AdminDashboard.php");
                        } else{
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid Password.";
                        }

    }
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script><!-- JQUERY -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"><!-- For the Heart -->

    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 360px; padding: 20px; }
  .center {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 200px;
  border: 3px solid green; 
}

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

<body>

<!-- NAV BAR -->
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="">JUB</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="index.php">Index<span class="sr-only">(current)</span></a></li>
        <li><a href="favourites.php">Favourites</a></li>
		<li class="active"><a href="adminLogin.php">Admin</a></li>
        <li class="dropdown">
          <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Information <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="">Developed By: Jubilian Ho</a></li>
			<li role="separator" class="divider"></li>
            <li><a href="">Version: <?php echo $version; ?></a></li>
			<li role="separator" class="divider"></li>
			<li><a href="">Database Updated: <?php echo $dbupdated; ?></a></li>
			<li role="separator" class="divider"></li>
			<li><a href="">Total Songs Loaded: <?php echo $totalsongs; ?></a></li>
			<li role="separator" class="divider"></li>
			<li><a id="notesbutton">Notes / Disclaimer</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

  <!-- Modal -->
  <div class="modal fade" id="notesanddisclaimer" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Notes / Disclaimer</h4>
        </div>
        <div class="modal-body">
          <p>The search bar has been implemented for easy identification of songs through known titles or lyrics.</p>
		  <p>This website was developed during the developer's university studies. It has not been benchmarked with reputable or market UI/UX Design standards.</p>
		  <p>The purpose of the development of this website was to expedite the process of identifying unplanned songs during an event as well as identifying songs that fit into certain categories with relevant titles or lyrics.</p>
		  <p>This website was built to read and load selected file exports from ProPresenter 7.</p>
		  <p>Though this website is available for public usage, it was designed for internal usage only.</p>
		  <p>This website was built with Hypertext Markup Language (HTML), Cascading Style Sheets (CSS), Personal Homepage (PHP) as well as JavaScript (JS), alongside the utilization of jQuery 3.5.1 and Bootstrap 3.4.1.</p>
		  <p>The features and functions of this website are provided on an "as is" basis, without warranty of any kind</p>
		  <p>There are no guarantees that this website will be error-free, continuously available or uninterrupted in operation or free of viruses or other harmful components not specifically mentioned herein.</p>
		  <p>The use of the website is at a user's sole risk. </p>
		  <p>If a user is dissatisfied with any features or functions on the website or with any of the terms and conditions governing the website, a user's sole and exclusive remedy is to discontinue using the website.</p>
		  <p>While the developer makes every effort to ensure the features and functions available on the website are free of any software virus, it cannot guarantee that the features and functions are free from any or all software viruses. The developer is not responsible for any loss or damage caused by software and related codes, including but not limited to viruses and worms.</p>
		  <p>The developer reserves the right to change these terms and conditions at any time, without notice.</p>
		  <p>If you have any questions or concerns about these terms and conditions or pertaining the features of this website, or any feedback that you may wish to sound out to the developer about, or collaborate with the developer for certain projects, please contact the developer at <a href="mailto:jubilianharvest@gmail.com">jubilianharvest@gmail.com</a>.</p>
		  <p>The development and hosting of this website is not free. If you would like to fund the developer to support the maintenance and hosting of this website as well as the further development of other projects, you may do so via PayPal <a href="https://paypal.me/jubilianho">here</a>.</p>
		  <p>Alternatively, donations and funding via PayLah and PayNow are accepted as well. Please send the developer an email beforehand to indicate the purpose of your transfer.</p>
		  <p>All donations are not refundable.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
<!-- END OF NAV BAR -->

    <div class="wrapper" style="width:300px; justify-content:center;  height: 200px; align-items:center; margin:auto;">

        <h2>Admin Login</h2>
        <p></p>

        <?php 
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }        
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <!--<p>Don't have an account? <a href="register.php">Sign up now</a>.</p>-->
        </form>
    </div>

</body>
</html>