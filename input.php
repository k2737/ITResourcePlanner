<?php

//MySQL Database Connect
include 'dbInfo.php';


//if (isset($_POST['submit'])) {
$printerId = $_POST['printerID'];
$printerType = $_POST['printerType'];
$date = $_POST['date'];
$printCount = $_POST['printCount'];

mysqli_query($conn, "INSERT INTO PrintCounts (DeviceID, DeviceType, Date, PageCount) VALUES ('$printerId','$printerType','$date','$printCount')");
				
	if(mysqli_affected_rows($conn) > 0){
	echo "<p>Print Count added!</p>";
	echo "<a href='index.php'>Go Back</a>";
} else {
	echo "Employee NOT Added<br />";
	echo mysqli_error ($conn);
}

//$sql = "INSERT INTO PrintCounts (DeviceId, DeviceType, Date, PageCount) VALUES (`$printerId`,`$printerType`,`$date`,`$printCount`);";

//$order = $conn->Query($sql);

//if ($order) {
  //  echo '<br>Input data is successful';
//} else {
  //  echo '<br>Input data is not valid';
//}
//}
?>
