<?php
session_start();
//error_reporting(0);
include('includes/config.php');

if(strlen($_SESSION['login'])==0)
	{	
header('location:index.php');
}
else{
if(isset($_REQUEST['bkid']))
	{
		$bid=intval($_GET['bkid']);
$email=$_SESSION['login'];
	$sql ="SELECT FromDate FROM tblbooking WHERE UserEmail=:email and BookingId=:bid";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':bid', $bid, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
{
	 $fdate=$result->FromDate;

	$a=explode("/",$fdate);
	$val=array_reverse($a);
	 $mydate =implode("/",$val);
	$cdate=date('Y/m/d');
	$date1=date_create("$cdate");
	$date2=date_create("$fdate");
 $diff=date_diff($date1,$date2);
echo $df=$diff->format("%a");
if($df>1)
{
$status=2;
$cancelby='u';
$sql = "UPDATE tblbooking SET status=:status,CancelledBy=:cancelby WHERE UserEmail=:email and BookingId=:bid";
$query = $dbh->prepare($sql);
$query -> bindParam(':status',$status, PDO::PARAM_STR);
$query -> bindParam(':cancelby',$cancelby , PDO::PARAM_STR);
$query-> bindParam(':email',$email, PDO::PARAM_STR);
$query-> bindParam(':bid',$bid, PDO::PARAM_STR);
$query -> execute();

$msg="Booking Cancelled successfully";
}
else
{
$error="You can't cancel booking before 24 hours";
}
}
}
}

?>
<!DOCTYPE HTML>
<html>
<head>
<title>TM | Tour History</title>

			<link href="admin/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
			<link href="admin/bootstrap/css/font-awesome.css" rel="stylesheet" media="screen">
			<link href="admin/bootstrap/css/my_style.css" rel="stylesheet" media="screen">
			
			      <!-- uyu amakweza header mmwamba plus bordering output-->
			<link href="admin/assets/styles.css" rel="stylesheet" media="screen">				
		    <link href="admin/bootstrap/css/bootstrap.min1.css" rel="stylesheet" media="screen">
		    <link href="admin/bootstrap/css/sb_admin.css" rel="stylesheet" media="screen">
			
			<link href="css/style.css" rel='stylesheet' type='text/css' />
			<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
			
        <!-- HTmL5 shim, for IE6-8 support of HTmL5 elements -->
        <!--[if lt IE 9]>
		
          
        <![endif]-->
		<!-- calendar css -->
		<script src="admin/bootstrap/js/html5.js"></script>
		<link href="admin/vendors/fullcalendar/fullcalendar.css" rel="stylesheet" media="screen">
		<script src="admin/vendors/jquery-1.9.1.min.js"></script>
        <script src="admin/vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
		<!-- data table -->
		<link href="admin/assets/DT_bootstrap.css" rel="stylesheet" media="screen">
		<!-- notification  -->
		<link href="admin/vendors/jGrowl/jquery.jgrowl.css" rel="stylesheet" media="screen">
		<!-- wysiwug  -->
		<link rel="stylesheet" type="text/css" href="admin/vendors/bootstrap-wysihtml5/src/bootstrap-wysihtml5.css"></link>
	
		<script src="admin/vendors/jGrowl/jquery.jgrowl.js"></script>

		
		

		</style>
		
		<!-- SweetAlert-->
		<script src="admin/sweetalert/sweetalert.js"></script>
		<link rel="stylesheet" href="admin/sweetalert/sweetalert.css">
		
</head>
<body>

<?php include('includes/header.php');?>
<?php include('admin/config_mysql.php'); ?>

<div class="container-fluid">
            <div class="row-fluid">
                
			 
				<?php
                 $query = "select * from tblissues";				
	             $count_members=mysqli_query($conn,$query);
	             $count = mysqli_num_rows($count_members);
				 
                 ?>	 
				
				   <div id="block_bg" class="block">
                        <div class="navbar navbar-inner block-header">
                             <div class="muted pull-left"><i class="icon-reorder icon-large"></i> MY Tour history</div>
						  </div>
						  
           
<div class="block-content collapse in">
    <div class="span12">
	<form action="" method="post">
  	<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
		<thead>		
		        <tr>			        
                	<th>#</th>
					<th>Reservation Id </th>
					<th>Package Name</th>
					<th>From</th>
					<th>To</th>
                    <th>Comment </th>
					<th>Status </th> 
					<th>Reservation date </th>
					<th>Action </th>
                    	
                   		
                    				
		    </tr>
		</thead>
<tbody>
<?php 

$uemail=$_SESSION['login'];;
$sql = "SELECT tblbooking.BookingId as bookid,tblbooking.PackageId as pkgid,tbltourpackages.PackageName as packagename,tblbooking.FromDate as fromdate,tblbooking.ToDate as todate,tblbooking.Comment as comment,tblbooking.status as status,tblbooking.RegDate as regdate,tblbooking.CancelledBy as cancelby,tblbooking.UpdationDate as upddate from tblbooking join tbltourpackages on tbltourpackages.PackageId=tblbooking.PackageId where UserEmail=:uemail ORDER BY bookid DESC";
$query = $dbh->prepare($sql);
$query -> bindParam(':uemail', $uemail, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	?>
<tr align="center">
<td><?php echo htmlentities($cnt);?></td>
<td>#BK<?php echo htmlentities($result->bookid);?></td>
<td><a href="package-details.php?pkgid=<?php echo htmlentities($result->pkgid);?>"><?php echo htmlentities($result->packagename);?></a></td>
<td><?php echo htmlentities($result->fromdate);?></td>
<td><?php echo htmlentities($result->todate);?></td>
<td><?php echo htmlentities($result->comment);?></td>
<td><?php if($result->status==0)
{
echo "Pending";
}
if($result->status==1)
{
echo "Confirmed";
}
if($result->status==2 and  $result->cancelby=='u')
{
echo "Canceled by you at " .$result->upddate;
} 
if($result->status==2 and $result->cancelby=='a')
{
echo "Canceled by admin at " .$result->upddate;

}
?></td>
<td><?php echo htmlentities($result->regdate);?></td>
<?php if($result->status==2)
{
	?><td>Cancelled</td>
<?php } else {?>

<td><!--<a href="tour-history.php?bkid=<?php echo htmlentities($result->bookid);?>" onclick="return confirm('Do you really want to cancel booking')" >Cancel</a>-->

<a  onClick="calle(<?php echo htmlentities($result->bookid); ?>);">Cancel</a>

</td>


<?php }?>
</tr>
<?php $cnt=$cnt+1; }} ?>
</tbody>
	</table>
		</form>		
		
			  		
</div>
</div>
</div>
</div>



<!--- /privacy ---->
<!--- footer-top ---->
<!--- /footer-top ---->
<?php include('includes/footer.php');?>
<!-- signup -->
<?php include('includes/signup.php');?>			
<!-- //signu -->
<!-- signin -->
<?php include('includes/signin.php');?>			
<!-- //signin -->
<!-- write us -->
<?php include('includes/write-us.php');?>
<?php include('script.php');?>


<script>
	$(document).ready(function(){

});
	function calle(e){
	swal({
  title: "Are you sure you want to cancel?",
  text: "",
  type: "warning",
  showCancelButton: true,
  confirmButtonClass: "btn-danger",
  confirmButtonText: "Yes",
  cancelButtonText: "No",
  closeOnConfirm: false,
  closeOnCancel: false
},
function(isConfirm) {
  if (isConfirm) {
  
     swal("cancelled successfully"+ e, "success");
setTimeout(function(){
  window.location.href="cancel_tour.php?bkid="+e;
  
  }, 2000);
  } else {
    swal("operation aborted", " ", "error");
  }
});
}
	</script>

   
</body>
</html>
<?php } ?>