<?php
ini_set('display_errors',1); 
error_reporting(E_ALL);

include 'connectDB.php';

//$name = $_POST["name"];
//$startTime = $_POST["start time"];
//$endTime = $_POST["end time"];

$selectSql = "SELECT entry  FROM dictionary
			ORDER BY RAND()
			LIMIT 1";

$result = $conn->query($selectSql);
$row = mysqli_fetch_assoc($result);

while($row["used"] != 0){
	$row = mysqli_fetch_assoc($result);
}

$word = $row["entry"];

$updateDictSql = "UPDATE dictionary
				SET used = 1
				WHERE entry = '".$word."'";

$insertuserDataSql = "INSERT INTO user_data (shortlink, username, starttime, endtime)
                	VALUES ('".$word."', '".$name."', '".$startTime."', '".$endTime."')";

$conn->query($updateDictSql) or die ($conn->error);
$conn->query($insertuserDataSql) or die ($conn->error);


//return $word;



