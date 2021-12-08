<?php

session_start();

//Hide PHP Errors
error_reporting(0);
ini_set('display_errors', 0);

if($_SESSION["favourites"] == null) {
} elseif($_SESSION["favourites"] != null && $_GET['songs'] == null) { 
	header('Location: favourites.php?songs='.$_SESSION["favourites"]);
}

// SQL Connection
$config = parse_ini_file('../dbconfig.ini');
$conn = new mysqli($config['dbservername'], $config['dbusername'], $config['dbpassword'], $config['dbname']);

// Check SQL Connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = 'SELECT * FROM information';
                    if ($result = $conn->query($sql)) {
                        while ($row = $result->fetch_assoc()) {
                            $version = $row["version"];
                            $dbupdated = $row["dbupdated"];
                            $totalsongs = $row["totalsongs"];
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
pre {
    margin: 0;
	background-color:Transparent;
	border: none;
	font-family: Arial;
	font-size: 1.2em;
}

table {
  table-layout: auto;
  text-align: left;
  border-collapse: collapse;
  width: 80%;
  padding: 8px;
  border: 1px solid #ddd;
  padding: 8px;
}
.center {
  margin-left: auto;
  margin-right: auto;

}
tr:hover {background-color: AliceBlue;}
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
        <li class="active"><a href="favourites.php">Favourites</a></li>
		<li><a href="adminLogin.php">Admin</a></li>
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


      <form class="navbar-form navbar-right" role="search">
        <div class="form-group">
          <input type="text" class="form-control" id="search" placeholder="Search">
        </div>
      </form>
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

        <br>
        <h1></h1>

           <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="tablebody">
                    <?php
					if($_GET["songs"] != null) {
					$headers = explode('-', $_GET["songs"]);
					$counter = count($headers) - 1;
					//print_r($headers);
					//echo "<br>";
					//echo count($headers);
for ($x = 0; $x < $counter; $x++) {


					
					$id = $headers[$x];
                    $sql = "SELECT * FROM lyrics WHERE id = ?";
					$stmt = $conn->prepare($sql);
					$stmt->bind_param('i', $id);
					$stmt->execute();
					$result = $stmt->get_result();
					$song = $result->fetch_array(MYSQLI_ASSOC);



                            echo '<tr>
                    <td>' . $song['id'] . '</td>
                    <td>' . $song['title'] . '</td>

                    <td>
							<button  class="glyphicon glyphicon-chevron-down" style="font-size:24px;border: none;background-color:Transparent;" onclick="myFunction(' . $song['id'] . ')"></button>
                            <button class="glyphicon glyphicon-remove" style="font-size:24px;color:red;border: none;background-color:Transparent;" name = "add" data-id="'. $song['id'] .'">  </button>
							<button class="glyphicon glyphicon-copy" style="font-size:24px;border: none;background-color:Transparent;" onclick="CopyToClipboard('. $id .')"></button>
                    </td>
					<td><div style="display:none;padding: 0;width: 0;">' . $song['lyrics'] . '</div></td>
                    </tr>
					<tr>
					<td colspan ="4"><div id="' . $song['id'] . '" style="display:block;text-align:center;">' . $song['lyrics'] . '</div></td>
					</tr>';

}
					} else {
						// Since there are no songs, redirect to main page.
						echo '<script>alert("There are no songs in your favourites!"); window.location.href = "index.php";</script>'; 
						//header("Location: index.php");
					}
					?>
</tbody>
</table>


<script type="text/javascript">
//Function For Display/Hide Lyrics
function myFunction(id) {
  var x = document.getElementById(id);
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

//Function to remove a selected song from favourites				
$('.glyphicon-remove').on('click', function() {
  var id = $(this).data('id');  // get the `id` from data property
	//console.log(id);
  // send a ajax request
  $.ajax({
     url: 'removeFromFavourites.php',
	 type: "POST",
     data: { id: id },
	 success: function (data) {
	 // Do Something
	 console.log(data);
	 alert("Successfully deleted this song from your favourites!");
	 window.location.href = "favourites.php";
	 }
  });
});

//Search Function
$(document).ready(function () {
    $("#search").on("keyup", function () {
        var value = $(this).val().toLowerCase();
        $("#tablebody tr").filter(function () {
            $(this).toggle($(this).text()
                    .toLowerCase().indexOf(value) > -1)
        });
    });
});

//Function to copy lyrics easily
function CopyToClipboard(id)
{
var x = document.getElementById(id);
x.style.display = "block";
var r = document.createRange();
r.selectNode(document.getElementById(id));
window.getSelection().removeAllRanges();
window.getSelection().addRange(r);
document.execCommand('copy');
window.getSelection().removeAllRanges();
}

//Function to display Notes / Disclaimer
$(document).ready(function(){
  $("#notesbutton").click(function(){
    $("#notesanddisclaimer").modal();
  });
});
</script>

</body>
</html>