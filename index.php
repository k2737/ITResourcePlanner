:<?php
//MySQL Database Connect
include 'dbInfo.php';

echo "<html>";
echo "<body>";

$sql = "select DeviceName, Date, PageCount from PrintCounts JOIN Devices ON PrintCounts.DeviceID=Devices.DeviceID WHERE PrintCounts.DeviceID='3';";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Device Name: " . $row["DeviceName"]. "  Date: " . $row["Date"]. "  Page Count:" . $row["PageCount"]. "<br>";
    }
} else {
    echo "0 results";
}


$result2 = $conn->query("select DeviceName from Devices where DeviceType='3';"); 
echo "Select Printer Name";
echo "<br \>";
echo " <br \>";
echo "<select name='printers'>";


if ($result2->num_rows > 0) {
while ($row = $result2->fetch_assoc()) {

                  unset($name);
                  $name = $row["DeviceName"]; 
                  echo "<option value='$name'>$name</option>";
                 }
}
else {
	echo "0 Results";
}
	echo "</select>";
	echo "</body>";
	echo "</html>";


$conn->close();
?>
