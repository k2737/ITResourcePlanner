<html>
<head>
<title>IT ERP</title>
</head>
<body>
<style>
/* Style the list */
ul.tab {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
}

/* Float the list items side by side */
ul.tab li {float: left;}

/* Style the links inside the list items */
ul.tab li a {
    display: inline-block;
    color: black;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    transition: 0.3s;
    font-size: 17px;
}

/* Change background color of links on hover */
ul.tab li a:hover {background-color: #ddd;}

/* Create an active/current tablink class */
ul.tab li a:focus, .active {background-color: #ccc;}

/* Style the tab content */
.tabcontent {
    display: none;
    padding: 6px 12px;
    border: 1px solid #ccc;
    border-top: none;
}
</style>


<script>
function openCity(evt, cityName) {
    // Declare all variables
    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Show the current tab, and add an "active" class to the link that opened the tab
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
</script>

<ul class="tab">
  <li><a href="javascript:void(0)" class="tablinks" onclick="openCity(event, 'Dashboard')">DASHBOARD</a></li>
  <li><a href="javascript:void(0)" class="tablinks" onclick="openCity(event, 'Printers')">PRINTERS</a></li>
  <li><a href="javascript:void(0)" class="tablinks" onclick="openCity(event, 'Contracts')">CONTRACTS</a></li>
  <li><a href="javascript:void(0)" class="tablinks" onclick="openCity(event, 'SSL_Certificates')">SSL CERTIFICATES</a></li>
</ul>

<div id='Dashboard' class='tabcontent'>
  <h3>London</h3>
  <p>London is the capital city of England.</p>
</div>

<div id='Printers' class='tabcontent'>
  <h3>Paris</h3>
  <p>Paris is the capital of France.</p>
</div>

<div id='Contracts' class='tabcontent'>
  <h3>Tokyo</h3>
  <p>Tokyo is the capital of Japan.</p>
</div>

<div id='SSL_Certificates' class='tabcontent'>
  <h3>Tokyo</h3>
  <p>Tokyo is the capital of Japan.</p>
</div>

<?php

include 'dbInfo.php';

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
