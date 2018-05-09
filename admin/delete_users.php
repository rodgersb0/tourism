<?php
include("config_mysql.php");
session_start();

$userid = $_GET['userid'];


$sql = "DELETE FROM tblusers WHERE id=".$userid."";
if(mysqli_query($conn, $sql)){
    echo '<script language="javascript">';
	echo 'window.location="manage-users.php";';
	echo '</script>';
	
} else {
	echo '<script language="javascript">';
	echo 'alert("Error Updating!");';
	echo 'window.location="manage-users.php";';
	echo '</script>';
}
?>