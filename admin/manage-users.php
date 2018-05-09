<?php include('header.php'); ?>
<?php include('config_mysql.php'); ?>
	
		<!-- SweetAlert-->
		<script src="sweetalert/sweetalert.js"></script>
		<link rel="stylesheet" href="sweetalert/sweetalert.css">
		
		
		
		
    </head>
<?php include('config_mysql.php'); 

?>

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




<body>
  <br>
 
			<?php //include('navbar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('sidebar.php'); ?>
                <div class="span9" id="content">
                     <div class="row-fluid">
                        <!-- block -->
				<div class="empty">
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                         <i class="icon-info-sign"></i>  <strong>Note!:</strong> This is the list of all the system users
                    </div>
                </div>
				
				<?php	
				$query="select * from tblusers";
	             $count_user=mysqli_query($conn,$query);
	             $count = mysqli_num_rows($count_user);
                 ?>	 
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"></i><i class="icon-user"></i> Users' List</div>
								<div class="muted pull-right">
								Number of Users: <span class="badge badge-info"><?php  echo $count; ?></span>
							 </div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form action="delete_users.php" method="post">
  									<table cellpadding="0" cellspacing="0" border="0" class="table">
									
			</div>
			
										<thead>		
		        <tr>	
<!--<th>Check</th>-->		 
                    <th>id</th>       
                	<th>Name</th>
					<th>Mobile No. </th>
					<th>Email Id</th>
			        <th>Reg Date</th>
					<th></th>
					
                    	
                   		
                    				
		    </tr>
		</thead>
<tbody>
<!-----------------------------------Content------------------------------------>
<?php

        $query="select * from tblusers";

		$members_query = mysqli_query($conn,$query)or die(mysql_error());
		while($row = mysqli_fetch_array($members_query)){
		$username = $row['id'];
		//$id= $row['id'];
	
		?>
									
		<tr>
			
			<td><?php echo $row['id']; ?></td>
			<td><?php echo $row['FullName']; ?></td>
			<td><?php echo $row['MobileNumber']; ?></td>
			<td><?php echo $row['EmailId']; ?></td>
			<td><?php echo $row['RegDate']; ?></td>
			
			
			<td> <a  onClick="call(<?php echo $row['id']; ?>);"> <i class="fa fa-trash fa-2x" style="color:red"></i></a></td>
			
			

            </tr>
											
	<?php } ?>   

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
  text: "You will not be able to recover this imaginary file!",
  type: "warning",
  showCancelButton: true,
  confirmButtonClass: "btn-danger",
  confirmButtonText: "Yes, delete it!",
  cancelButtonText: "Cancel",
  closeOnConfirm: false,
  closeOnCancel: false
},
function(isConfirm) {
  if (isConfirm) {
  
     swal("Deleted!", "Your imaginary file has been deleted."+ e, "success");
setTimeout(function(){
  window.location.href="delete_users.php?userid="+e;
  
  }, 2000);
  } else {
    swal("Cancelled", "Your imaginary file is safe :)", "error");
  }
});
}
	</script>
	
	
<?php include('script.php'); ?>
</body>
</html>
<?php } ?>