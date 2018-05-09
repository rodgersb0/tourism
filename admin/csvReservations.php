<?php
// Connection 
/*
$conn=mysqli_connect('localhost','root','');
$db=mysqli_select_db($conn,'tms');

$filename = "Reservations.xls"; // File Name
// Download file
header("Content-Disposition: attachment; filename=\"$filename\"");
header("Content-Type: application/vnd-ms-excel");
$query="SELECT tblusers.FullName as CLIENT_NAME,tblusers.MobileNumber as CLIENT_NUMBER,
tbltourpackages.PackageName as PACKAGE_NAME,tbltourpackages.PackagePrice as PACKAGE_PRICE,tblbooking.FromDate as FROM_DATE,tblbooking.ToDate as TO_DATE,
tblbooking.status as STATUS from tblusers join  tblbooking on  
tblbooking.UserEmail=tblusers.EmailId join tbltourpackages on tbltourpackages.PackageId=tblbooking.PackageId WHERE status=1";

$user_query = mysqli_query($conn,$query);


// Write data to file
$flag = false;
while ($row = mysqli_fetch_assoc($user_query)) {
    if (!$flag) {
        // display field/column names as first row
        echo implode("\t", array_keys($row)) . "\r\n";
        $flag = true;
    }
    echo implode("\t", array_values($row)) . "\r\n";
}
mysqli_free_result($user_query);*/
?>





<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tms";
//mysql and db connection

$con = new mysqli($servername, $username, $password, $dbname);

if ($con->connect_error) {  //error check
    die("Connection failed: " . $con->connect_error);
}
else
{

}


//$DB_TBLName = "tblbooking"; 
$filename = "reservations";  //your_file_name
$file_ending = "xls";   //file_extention

header("Content-Type: application/xls");    
header("Content-Disposition: attachment; filename=$filename.xls");  
header("Pragma: no-cache"); 
header("Expires: 0");

$sep = "\t";

$sql="SELECT tblusers.FullName as CLIENT_NAME,
tbltourpackages.PackageName as PACKAGE_NAME,tbltourpackages.PackagePrice as PACKAGE_PRICE,tblbooking.FromDate as FROM_DATE,tblbooking.ToDate as TO_DATE,
tblbooking.status as STATUS from tblusers join  tblbooking on  
tblbooking.UserEmail=tblusers.EmailId join tbltourpackages on tbltourpackages.PackageId=tblbooking.PackageId WHERE status=1"; 
$resultt = $con->query($sql);
while ($property = mysqli_fetch_field($resultt)) { //fetch table field name
    echo $property->name."\t";
}

print("\n");    

while($row = mysqli_fetch_row($resultt))  //fetch_table_data
{
    $schema_insert = "";
    for($j=0; $j< mysqli_num_fields($resultt);$j++)
    {
        if(!isset($row[$j]))
            $schema_insert .= "NULL".$sep;
        elseif ($row[$j] != "")
            $schema_insert .= "$row[$j]".$sep;
        else
            $schema_insert .= "".$sep;
    }
    $schema_insert = str_replace($sep."$", "", $schema_insert);
    $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
    $schema_insert .= "\t";
    print(trim($schema_insert));
    print "\n";
}

?>