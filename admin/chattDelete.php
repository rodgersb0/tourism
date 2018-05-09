<?php include("config_mysql.php");?>
<?php
$delete=$_GET['delete'];
if(empty($delete)){
echo "you don't select any record";

}else{
$query="delete from shout_box where id =".$delete."";
$result=mysqli_query($mysqli,$query);
header("location: dashboard.php?msg= Chat successfully deleted !!");
exit();
mysqli_close($mysqli);
}
?>

