<?php

session_start();


$myfile = fopen("ProPresenter Export.txt", "r") or die("Unable to open file!");
// Output one line until end-of-file

$songs_array = array();



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

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" />

</head>
<body>



<button class="btn btn-success" onclick="javascript:window.location.href='index.php'">Back to main page</button><br/><br/>


<br/><br/><br/>

<table id="songs" class="songs_list">
	<tr>
    <th>Song name</th>
    <th>Lyrics</th>
    
    
  </tr>

	<?php
		if(!empty($songs_array)) {
			foreach ($songs_array as $key => $value) {
				?><tr>
				    <td><?php echo $value["title"]; ?></td>

				     <td><?php echo $value["text"]; ?></td>
				    
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


