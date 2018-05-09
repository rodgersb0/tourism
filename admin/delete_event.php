<?php
include("config_mysql.php");
session_start();

$id =$_GET['id'];


$sql = "DELETE FROM event WHERE id=".$id."";
if(mysqli_query($conn, $sql)){
    echo '<script language="javascript">';
	echo 'window.location="events.php";';
	echo '</script>';
	
} else {
	echo '<script language="javascript">';
	echo 'alert("Error Updating!");';
	echo 'window.location="events.php";';
	echo '</script>';
}
?>