:<?php
//MySQL Database Connect
include 'dbInfo.php';

echo "<html>";
echo "<head>";
echo "<title>IT ERP</title>";
echo "</head>";
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

echo "<form action='input.php' method='POST'>";
echo "<table border='1'>";
  echo "<tr>";
    echo "<td align='center'>Enter Daily Print Counts</td>";
  echo "</tr>";
  echo "<tr>";
  echo "<td>";
  echo "<table>";
    echo "<tr>";
      echo "<td>Printer ID</td>";
      echo "<td><input type='text' name='printerID' size='20'>";
      echo "</td>";
    echo "</tr>";
    echo "<tr>";
      echo "<td>Printer Type</td>";
      echo "<td><input type='text' name='printerType' size='20'>";
      echo "</td>";
    echo "</tr>";
    echo "<tr>";
      echo "<td>Date</td>";
      echo "<td><input type='text' name='date' size='20'>";
      echo "</td>";
    echo "</tr>";
    echo "<tr>";
      echo "<td>Print Count</td>";
      echo "<td><input type='text' name='printCount' size='20'>";
      echo "</td>";
    echo "</tr>";
    echo "<tr>";
      echo "<td></td>";
      echo "<td align='right'><input type='submit' name='submit' value='Sent'></td>";
    echo "</tr>";
    echo "</table>";
  echo "</td>";
echo "</tr>";
echo "</table>";
echo "</form>";

	echo "</body>";
	echo "</html>";


$conn->close();
?>
