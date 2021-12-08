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
		$songs_array[$count]["text"] = $str;

	}

  	

}

fclose($myfile);





?>


<!DOCTYPE html>
<html>
<head>
<style>
#songs {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#songs td, #songs th {
  border: 1px solid #ddd;
  padding: 8px;
}

#songs tr:nth-child(even){background-color: #f2f2f2;}

#songs tr:hover {background-color: #ddd;}

#songs th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" />

</head>
<body>


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
			

			

			
			
		} else if(isset($_GET["song_id"])) {

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
				    <td><a href="index.php?song_id=<?php echo $key; ?>"><?php echo $value["title"]; ?></a></td>

				     <td><a href="index.php?song_id=<?php echo $key; ?>&is_fav=0">Remove from favorites</a></td>
				    
				  </tr><?php
			}
		}

}
	?>
  
  
</table>

<br/><br/><br/>

<table id="songs" class="songs_list">
	<tr>
    <th>Song name (Click on the link to display lyrics)</th>
    <th>Add to favorites (Click on the link to add song to favorite list)</th>
    
    
  </tr>

	<?php
		if(!empty($songs_array)) {
			foreach ($songs_array as $key => $value) {
				?><tr>
				    <td><a href="index.php?song_id=<?php echo $key; ?>"><?php echo $value["title"]; ?></a></td>

				     <td><a href="index.php?song_id=<?php echo $key; ?>&is_fav=1">Add to favorites</a></td>
				    
				  </tr><?php
			}
		}
	?>
  
  
</table>

<br/><br/><br/>

	
	
<script type="text/javascript">

	var information = <?php echo json_encode($songs_array) ?>;


	$(document).ready(function () {
	    $('.songs_list').dataTable({
	        data: information,
	        columns: [
	            { data: 'title', title: 'Title' },
	            { data: 'text', title: 'Lyrics' }
	        ]
	    });
	});
</script>  
  


</body>
</html>


