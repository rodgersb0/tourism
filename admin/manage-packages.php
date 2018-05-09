<?php
session_start();
//error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{ 
	?>
<!DOCTYPE HTML>
<html>
<head>
<title>TM | Admin Manage Packages</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>



<link rel="stylesheet" href="css/morris.css" type="text/css"/>
<!-- Graph CSS -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<script src="js/jquery-2.1.4.min.js"></script>
<!-- //jQuery -->

<link rel="stylesheet" type="text/css" href="css/basictable.css" />

<!-- //tables -->
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<!-- lined-icons -->
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
<!-- //lined-icons -->

<!-- SweetAlert-->
		<script src="sweetalert/sweetalert.js"></script>
		<link rel="stylesheet" href="sweetalert/sweetalert.css">
		

</head> 
<body>
  	<br>
    <br>	
		<?php include('header.php'); ?>
        <?php include('config_mysql.php'); ?>
		
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('sidebar.php'); ?>
			
			
			 <div class="span9" id="content">
                     <div class="row-fluid">
						
			    <div class="empty">
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                         <i class="icon-info-sign"></i>  <strong>Note!:</strong> Please select the action corresponding to the package.
                    </div>
               </div>	
				
				<?php	
				 $query="select * from tbltourpackages";
	             $count_log=mysqli_query($conn,$query);
	             $count = mysqli_num_rows($count_log);
                 ?>	 
                        <div id="block_bg" class="block">
                            
                            <div class="block-content collapse in">
                                <div class="span12">
								<form action="delete_users.php" method="post">
  									<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
								
									
									
									
										<thead>
										  <tr>
					
					
					        <th>#</th>
							<th >Name</th>
							<th>Type</th>
							<th>Location</th>
							<th>Price</th>
							<th>Creation Date</th>
							<th></th>
							
						  
										   </tr>
										</thead>
										<tbody>				
						
						
						
						
						
						
						
						
						
						
<?php $sql = "SELECT * from TblTourPackages";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{				?>		
						  <tr>
						    <td><?php echo htmlentities($cnt);?></td>
							<td><?php echo htmlentities($result->PackageName);?></td>
							<td><?php echo htmlentities($result->PackageType);?></td>
							<td><?php echo htmlentities($result->PackageLocation);?></td>
							<td>$<?php echo htmlentities($result->PackagePrice);?></td>
							<td><?php echo htmlentities($result->Creationdate);?></td>
							<td><p><a href="update-package.php?pid=<?php echo htmlentities($result->PackageId);?>"><i class="fa fa-edit fa-2x" ></i></a> <br>
							<!--<a href="delete-package.php?pid=<?php echo htmlentities($result->PackageId);?> " onClick="return confirm('Are you sure you want to delete?')"><i class="fa fa-trash fa-2x" style="color:red"></i></a>-->
							
							<a  onClick="call(<?php echo htmlentities($result->PackageId); ?>);"> <i class="fa fa-trash fa-2x" style="color:red"></i></a>
							
							</p>
							</td>
						  </tr>
						 <?php $cnt=$cnt+1;} }?>
						</tbody>
					  </table>
					</div>
				  </table>

				
			</div>
		

<?php include('includes/footer.php');?>

</div>
</div>
<script>
	$(document).ready(function(){

});
	function call(e){
	swal({
  title: "Are you sure?",
  text: "delete the package",
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
  
     swal("Deleted!", "Package has been deleted successfully."+ e, "success");
setTimeout(function(){
  window.location.href="delete-package.php?pid="+e;
  
  }, 2000);
  } else {
    swal("Cancelled", " ", "error");
  }
});
}
</script>
</div> 
<?php include('script.php'); ?>   

</body>
</html>
<?php } ?>