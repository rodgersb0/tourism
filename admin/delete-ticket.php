<?php
include("config_mysql.php");


$iid =isset($_GET['iid']);
require('manageissues.php');


$sql = "DELETE FROM tblissues WHERE id=".($result->id)."";

if(mysqli_query($conn, $sql)){
    echo '<script language="javascript">';
	
	echo 'window.location="manageissues.php";';
	echo '</script>';
	
} else {
	echo '<script language="javascript">';
	echo 'alert("Error Updating!");';
	echo 'window.location="manageissues.php";';
	echo '</script>';
}
?>