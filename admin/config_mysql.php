

<?php
$username = "root";
$password = "";
$hostname = "localhost";
 
 $conn = mysqli_connect($hostname, $username, $password)
 or die("Unable to connect");
 //echo "connected successfully<br>";
?>
<?php
mysqli_select_db($conn,"tms" ) or
die ("could not select tms");
?>