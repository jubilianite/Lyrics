<?php

session_start();

//Run everything only if admin
if ($_SESSION["role"] != "Admin") {
    header("location: index.php");
} else {



function loadTXT() {
$myfile = fopen("uploads/ProPresenter Export.txt", "r") or die("Unable to open file!");

$songs_array = array();


$count = -1;

while(!feof($myfile)) {
	$value = fgets($myfile);
	$value1 = strtok($value, ":");
	if($value1 == "Title") {
		$str = "";
		$count++;
		$songs_array[$count]["title"] = str_replace("Title:", "", $value); // Remove "Title:" from the header and add title into array
	} else {
		$str .= $value;
		$songs_array[$count]["text"] = "<pre>".$str."</pre>"; // Add lyrics into array as it is using <pre>
	}
}

// SQL Connection
$config = parse_ini_file('../dbconfig.ini');
$conn = new mysqli($config['dbservername'], $config['dbusername'], $config['dbpassword'], $config['dbname']);

// Check SQL Connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

date_default_timezone_set('Asia/Singapore');
$datetime = date('Y-m-d H:i:s');

$array_length = count($songs_array);
$sql = "UPDATE information SET totalsongs = '$array_length' , dbupdated = '$datetime'" . "WHERE id = 1";
mysqli_query($conn, $sql);



fclose($myfile);



// Empty DB First
$clearTable = "TRUNCATE TABLE lyrics";
mysqli_query($conn, $clearTable);

// Add Lyrics into DB
$arrayLength = sizeof($songs_array);
for ($counter = 0; $counter < $arrayLength; $counter++) {
	$id = $counter;
	$title = $songs_array[$counter]["title"];
	$lyrics = $songs_array[$counter]["text"];
	$stmt = $conn->prepare("INSERT INTO lyrics (id, title, lyrics) VALUES (?, ?, ?)");
	$stmt->bind_param("iss", $id, $title, $lyrics);
	$stmt->execute();
}
// Run Redirect only after all done.
redirect();
}

function redirect() {
	header("Location: AdminDashboard.php");
}

loadTXT();

}
?>