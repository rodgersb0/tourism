<?php
include("config_mysql.php");
include('includes/config.php');
require('tour-history.php');
$bkid = $_GET['bkid'];


$sql = "UPDATE tblbooking SET status=2,CancelledBy=:cancelby WHERE  BookingId=".$bkid."";
if(mysqli_query($conn, $sql)){
    echo '<script language="javascript">';
	echo 'window.location="tour-history.php";';
	echo '</script>';
	
} else {
	echo '<script language="javascript">';
	echo 'window.location="tour-history.php";';
	echo '</script>';
}
?>