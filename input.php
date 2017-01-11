<?php

//MySQL Database Connect
include 'dbInfo.php';


if (isset($_POST['submit'])) {
$printerId = $_POST["printerId"];
$date = $_POST["date"];
$printerType = $_POST["printerType"];
$printCount = $_POST["printCount"];

$sql = "INSERT INTO PrintCounts (DeviceId, DeviceType, Date, PageCount) VALUES (`$printerId`,`$printerType`,`$date`,`$printCount` );";

$order = $conn->Query($sql);

if ($order) {
    echo '<br>Input data is successful';
} else {
    echo '<br>Input data is not valid';
}
}
?>
