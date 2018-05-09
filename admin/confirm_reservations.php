<?php
include("config_mysql.php");
include('includes/config.php');
session_start();

$bckid = $_GET['bckid'];


$sql = "UPDATE tblbooking SET status=1 WHERE BookingId=".$bckid."";
if(mysqli_query($conn, $sql)){
    echo '<script language="javascript">';
	echo 'window.location="manage-bookings.php";';
	echo '</script>';
	
} else {
	echo '<script language="javascript">';
	echo 'alert("Error Updating!");';
	echo 'window.location="manage-bookings.php";';
	echo '</script>';
}
?>