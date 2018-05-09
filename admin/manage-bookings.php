<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{ 
	// code for cancel
if(isset($_REQUEST['bkid']))
	{
$bid=intval($_GET['bkid']);
$status=2;
$cancelby='a';
$sql = "UPDATE tblbooking SET status=:status,CancelledBy=:cancelby WHERE  BookingId=:bid";
$query = $dbh->prepare($sql);
$query -> bindParam(':status',$status, PDO::PARAM_STR);
$query -> bindParam(':cancelby',$cancelby , PDO::PARAM_STR);
$query-> bindParam(':bid',$bid, PDO::PARAM_STR);
$query -> execute();

$msg="Reservation Cancelled successfully";
}


if(isset($_REQUEST['bckid']))
	{
$bcid=intval($_GET['bckid']);
$status=1;
$cancelby='a';
$sql = "UPDATE tblbooking SET status=:status WHERE BookingId=:bcid";
$query = $dbh->prepare($sql);
$query -> bindParam(':status',$status, PDO::PARAM_STR);
$query-> bindParam(':bcid',$bcid, PDO::PARAM_STR);
$query -> execute();
$msg="Reservation Confirmed successfully";
}

	?>
<?php include('header.php'); ?>
<?php include('config_mysql.php'); ?>
	
		<!-- SweetAlert-->
		<script src="sweetalert/sweetalert.js"></script>
		<link rel="stylesheet" href="sweetalert/sweetalert.css">
		
		
		
		
    </head>
<?php include('config_mysql.php'); 

?>
	
<body>
  <br>
 
			<?php //include('navbar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('sidebar.php'); ?>
                <div class="span9" id="content">
                     <div class="row-fluid">
					  <script type="text/javascript">
		              $(document).ready(function(){
		              $('#add').tooltip('show');
		              $('#add').tooltip('hide');
		              });
		             </script> 
					 <div id="sc" align="center"><image src="images/sclogo.png" width="45%" height="45%"/></div>
				
				
                        <!-- block -->
				<div class="empty">
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                         <i class="icon-info-sign"></i>  <strong>Note!:</strong> This is the list of all reservations
                    </div>
                </div>
				
				<?php	
				$query="select * from tblbooking";
	             $count_user=mysqli_query($conn,$query);
	             $count = mysqli_num_rows($count_user);
                 ?>	 
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"></i><i class="icon-user"></i> Reservations List</div>
								<div class="muted pull-right">
								Number of Reservations: <span class="badge badge-info"><?php  echo $count; ?></span>
							 </div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form action="" method="post">
  									<table cellpadding="0" cellspacing="0" border="0" class="table">
									
			</div>
			
										<thead>		
		        <tr>	
<!--<th>Check</th>-->		 
                    <th>Reservation id</th>       
                	<th>Name</th>
					<th>Mobile No. </th>
					<th>Email Id</th>
			        <th>Package Name</th>
					<th>From /To</th>
					<th>Comment</th>
					<th>Status</th>
					<th> </th>
	       				
		    </tr>
		</thead>
<tbody>	
	
<?php $sql = "SELECT tblbooking.BookingId as bookid,tblusers.FullName as fname,tblusers.MobileNumber as mnumber,tblusers.EmailId as email,
tbltourpackages.PackageName as pckname,tblbooking.PackageId as pid,tblbooking.FromDate as fdate,tblbooking.ToDate as tdate,tblbooking.Comment as comment,
tblbooking.status as status,tblbooking.CancelledBy as cancelby,tblbooking.UpdationDate as upddate from tblusers join  tblbooking on  
tblbooking.UserEmail=tblusers.EmailId join tbltourpackages on tbltourpackages.PackageId=tblbooking.PackageId ORDER BY bookid DESC";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	?>				

						  <tr>
							<td>#BK-<?php echo htmlentities($result->bookid);?></td>
							<td><?php echo htmlentities($result->fname);?></td>
							<td><?php echo htmlentities($result->mnumber);?></td>
							<td><?php echo htmlentities($result->email);?></td>
							<td><p align="Justify"><a href="update-package.php?pid=<?php echo htmlentities($result->pid);?>"><?php echo htmlentities($result->pckname);?></a></p></td>
							<td><p><?php echo htmlentities($result->fdate);?> To <?php echo htmlentities($result->tdate);?></p></td>
								<td><p align="Justify"><?php echo htmlentities($result->comment);?></p></td>
								<td><?php if($result->status==0)
{
echo "Pending";
}
if($result->status==1)
{
echo "Confirmed";
}
if($result->status==2 and  $result->cancelby=='a')
{
echo "Canceled by you at " .$result->upddate;
} 
if($result->status==2 and $result->cancelby=='u')
{
echo "Canceled by User at " .$result->upddate;

}
?></td>


<?php if($result->status==2)
{
	?><td>Cancelled
	
	
	<td> <a  onClick="call(<?php echo htmlentities($result->bookid); ?>);"> <i class="fa fa-trash fa-2x" style="color:red"></i></a></td>
	</td>
	
	
	

	
<?php } else {?>
<td> <a  onClick="calle(<?php echo htmlentities($result->bookid); ?>);"><i class="fa fa-close (alias) fa-2x " style="color:orange"></i></a>

 <br><a  onClick="caller(<?php echo htmlentities($result->bookid); ?>);"> <i class="fa fa-check-square fa-2x " style="color:green"></i></a>
 <br><a  onClick="call(<?php echo htmlentities($result->bookid); ?>);"> <i class="fa fa-trash fa-2x" style="color:red"></i></a>
 </td>
 
					   
<?php }?>

						  </tr>
						 <?php $cnt=$cnt+1;} }?>
						</tbody>
					  </table>
					</form>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>


                </div>
            </div>
	<?php include('includes/footer.php'); ?>
        </div>
		
	
	<script>
	$(document).ready(function(){

});
	function call(e){
	swal({
  title: "Are you sure?",
  text: "Reservation will be deleted!",
  type: "warning",
  showCancelButton: true,
  confirmButtonClass: "btn-danger",
  confirmButtonText: "delete",
  cancelButtonText: "Cancel",
  closeOnConfirm: false,
  closeOnCancel: false
},
function(isConfirm) {
  if (isConfirm) {
  
     swal("Deleted!", "Reservation has been deleted successfully."+ e, "success");
setTimeout(function(){
  window.location.href="delete_reservations.php?bdel="+e;
  
  }, 2000);
  } else {
    swal("Cancelled", " ", "error");
  }
});
}
	</script>
	
	<script>
	$(document).ready(function(){

});
	function calle(e){
	swal({
  title: "Are you sure you want to cancel?",
  text: "Reservation will be cancelled!",
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
  
     swal("Reservation cancelled successfully"+ e, "success");
setTimeout(function(){
  window.location.href="cancel_reservations.php?bkid="+e;
  
  }, 2000);
  } else {
    swal("operation aborted", " ", "error");
  }
});
}
	</script>
	
	
	<script>
	$(document).ready(function(){

});
	function caller(e){
	swal({
  title: "Are you sure you want confirm?",
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
  
     swal("Reservation confirmed." +e, "success");
setTimeout(function(){
  window.location.href="confirm_reservations.php?bckid="+e;
  
  }, 2000);
  } else {
    swal("operation aborted", " ", "error");
  }
});
}
	</script>
	
	
	
<?php include('script.php'); ?>
</body>
</html>
<?php } ?>
			
			
			
			
			
			
