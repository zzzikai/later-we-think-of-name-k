<?php

ini_set('display_errors',1); 
error_reporting(E_ALL);

$servername = "localhost";
$username = "stellarm_laterk";
$password = "h44cknr00ll";
$dbname='stellarm_laterk';


// Create connection
$conn = mysqli_connect($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$file_handle = @fopen("http://laterk.stellarmen.com/assets/txt/dictionary.txt", "r");
if ($file_handle) {
    while (($line = fgets($file_handle, 4096)) !== false) {
    	$trim = trim($line);
        //echo $trim;

        $sql = "INSERT INTO dictionary (entry, used)
                VALUES (".$trim.", 0)";


		if ($conn->query($sql) === TRUE) {
		    echo $trim." New record created successfully";
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}


    }
    if (!feof($file_handle)) {
        echo "Error: unexpected fgets() fail\n";
    }
    fclose($file_handle);
}