<?php
include("config_mysql.php");
include('includes/config.php');
session_start();

$bdel = $_GET['bdel'];


$sql = "DELETE FROM tblbooking WHERE BookingId=".$bdel."";
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