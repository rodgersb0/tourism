<?php
include("config_mysql.php");
session_start();

$pid = $_GET['pid'];


$sql = "DELETE FROM TblTourPackages WHERE PackageId=".$pid."";
if(mysqli_query($conn, $sql)){
    echo '<script language="javascript">';
	//echo 'alert("Record successfully deleted!");';
	echo 'window.location="manage-packages.php";';
	echo '</script>';
	
} else {
	echo '<script language="javascript">';
	echo 'alert("Error Updating!");';
	echo 'window.location="manage-packages.php";';
	echo '</script>';
}
?>