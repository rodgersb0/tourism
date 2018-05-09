<?php

session_start();

if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
?>

<?php include('header.php'); ?>
<?php include('config_mysql.php'); ?>
<!-- SweetAlert-->
		<script src="sweetalert/sweetalert.js"></script>
		<link rel="stylesheet" href="sweetalert/sweetalert.css">

    <body>
	<br>
		<p align="left">
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('sidebar.php');?>
				<div class="span3" id="adduser">
				<?php include('add_event.php'); ?>		   			
				</div>
                <div class="span6" id="">
                     <div class="row-fluid">
                        <!-- block -->
						
			    <div class="empty">
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                         <i class="icon-info-sign"></i>  <strong>Note!:</strong> Select the corresponding button to do an operation</div>
               </div>	
				
				<?php	
				 $query="select * from event ";
	             $count_user=mysqli_query($conn,$query);
	             $count = mysqli_num_rows($count_user);
                 ?>	 
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"></i><i class="icon-user"></i> Events List</div>
								<div class="muted pull-right">
								Number of Events: <span class="badge badge-info"><?php  echo $count; ?></span>
							 </div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form action="delete_users.php" method="post">
  									<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
										<thead>
										  <tr>
										       
												<th>Event Name</th>
												<th>From Date</th>
												<th>To date</th>
												<th>Venue</th>
												<th>Price</th>
												
										   </tr>
										</thead>
										<tbody>
													<?php
													$query="select * from event ";
													$user_query = mysqli_query($conn,$query)or die(mysqli_error());
													while($row = mysqli_fetch_array($user_query)){
													$id = $row['id'];
					
													?>
									
												<tr>
										        
												<td><?php echo $row['Title']; ?></td>
												<td><?php echo $row['FromDate']; ?></td>
												<td><?php echo $row['ToDate']; ?></td>
												<td><?php echo $row['Venue']; ?></td>
												<td><?php echo "$".$row['Price']; ?></td>
											
																																								
												<td width="120">
												&nbsp;&nbsp;<a rel="tooltip"  title="Edit Event" id="e<?php echo $id; ?>" href="edit_event.php<?php echo '?id='.$id; ?>"  data-toggle="modal" ><i class="fa fa-pencil fa-2x"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
												
												<!--<a href="delete_event.php?id=<?php echo $id; ?> " onClick="return confirm('Are you sure you want to delete?')"><i class="fa fa-trash fa-2x"  style="color:red"></i></a>-->
												
												<a  onClick="call(<?php echo $id; ?>);"> <i class="fa fa-trash fa-2x" style="color:red"></i></a>
												</td>
		
									
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
		<?php include('script.php'); ?>
		</p>
		
		
		<script>
	$(document).ready(function(){

});
	function call(e){
	swal({
  title: "Are you sure?",
  text: "Event will be deleted!",
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
  
     swal("Deleted!", "Event has been deleted successfully."+ e, "success");
setTimeout(function(){
  window.location.href="delete_event.php?id="+e;
  
  }, 2000);
  } else {
    swal("Cancelled", " ", "error");
  }
});
}
	</script>
	
	<script>
    </body>


</html>
<?php } ?>