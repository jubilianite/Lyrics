<?php

session_start();


$myfile = fopen("ProPresenter Export.txt", "r") or die("Unable to open file!");
// Output one line until end-of-file

$songs_array = array();

if(!isset($_SESSION["favorites"])) {
	$_SESSION["favorites"] = array();
}

if(!isset($_GET["is_fav"])) {
	$_GET["is_fav"] = "";
}


$count = -1;

while(!feof($myfile)) {
	$value = fgets($myfile);

	$value1 = strtok($value, ":");

	if($value1 == "Title") {
		$str = "";
		$count++;
		$songs_array[$count]["title"] = str_replace("Title:", "", $value);
		
	} else {
		$str .= $value;
		$songs_array[$count]["text"] = "<pre>".$str."</pre>";

	}

  	

}

fclose($myfile);





?>


<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>




<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" />

<style>
        table {
            border-collapse: collapse;
            border-spacing: 0;
            width: 100%;
            border: 1px solid #ddd;
        }

        th, td {
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even){background-color: #f2f2f2}
    </style>

</head>
<body>


<button class="btn btn-success" onclick="javascript:window.location.href='index.php'">Back to main page</button><br/><br/>

<?php
 if(isset($_GET["song_id"])) {

	?> <table id="songs">
	<tr>
    <th>Song name</th>
    <th>Lyrics</th>
  	</tr>
	<tr>
	    <td><?php echo $songs_array[$_GET["song_id"]]["title"]; ?></td>
	    <td><?php echo $songs_array[$_GET["song_id"]]["text"]; ?></td>
	    
	  </tr>
	  </table><br/><br/><br/><?php
			
		}
	?>


<br/><br/><br/>

<?php



		if(isset($_GET["song_id"]) && $_GET["is_fav"] == "1") {

			if(!isset($_SESSION["favorites"][$_GET["song_id"]])) {
				$_SESSION["favorites"][$_GET["song_id"]]["title"] = $songs_array[$_GET["song_id"]]["title"];
				$_SESSION["favorites"][$_GET["song_id"]]["text"] = $songs_array[$_GET["song_id"]]["text"];

				echo "<script>alert('song added to favorite list');</script>";
			}

			

			
	
			
		} else if(isset($_GET["song_id"]) && $_GET["is_fav"] == "0") {

			if(isset($_SESSION["favorites"][$_GET["song_id"]])) {
				unset($_SESSION["favorites"][$_GET["song_id"]]);	
				echo "<script>alert('song removed from favorite list');</script>";
			}
			

			

			
			
		} 
	?>

<?php
if(!empty($_SESSION["favorites"])) {
 ?><table id="songs">
	<tr>
    <th>Favrorite Song name (Click on the link to display lyrics)</th>
    <th>Remove from favorites (Click on the link to remove song from favorite list)</th>
    
    
  </tr>

	<?php
		if(!empty($_SESSION["favorites"])) {
			foreach ($_SESSION["favorites"] as $key => $value) {
				?><tr>
				    <td><a href="add_to_favorite.php?song_id=<?php echo $key; ?>"><?php echo $value["title"]; ?></a></td>

				     <td><a href="add_to_favorite.php?song_id=<?php echo $key; ?>&is_fav=0">Remove from favorites</a></td>
				    
				  </tr><?php
			}
		}

}
	?>
  
  
</table>

<br/><br/><br/>



<br/><br/><br/>

	
	

  


</body>
</html>


