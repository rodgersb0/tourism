<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tms";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<?php
session_start();

error_reporting(E_ALL ^ E_DEPRECATED);


$query= "SELECT PackageId, UserEmail, FromDate, ToDate FROM tblbooking";
$result = mysqli_query($conn,$query) or die(mysqli_error());
$num = mysqli_num_rows($result);

//print out the contents of each row into a table
?>

<table>
<tr>
<td>PackageId</td>
<td>UserEmail</td>
<td>FromDate</td>
<td>ToDate</td>
<tr>

<?php
while($row = mysqli_fetch_array($result)){
     echo "<td>\n";
	 echo "<td>$row[PackageId]</td>\n";
	 echo "<td>$row[UserEmail]</td>\n";
	 echo "<td>$row[FromDate]</td>\n";
	 echo "<td>$row[ToDate]</td>\n";
	 echo "</tr>\n";

}
?>
</table>