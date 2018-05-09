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

    <body>
		<br>
		<br>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('sidebar.php');?>
				<div class="span3" id="adduser">
				<?php include('edit_event_form.php'); ?>		   			
				</div>
				<?php	
	             $count_members=mysqli_query($conn,"select * from event");
	             $count = mysqli_num_rows($count_members);
                 ?>	
                <div class="span6" id="">
                     <div class="row-fluid">
                        <!-- block -->
					<div class="empty">
                          <div class="alert alert-success alert-dismissable">
                             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                             <i class="icon-info-sign"></i>  <strong>Note!:</strong> Select the checkbox if you want to delete?
                          </div>
                    </div>
					 
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><i class="icon-user"></i>  Event(s) List</div>
								<div class="muted pull-right">
								Number of Events <span class="badge badge-info"><?php  echo $count; ?></span>
							 </div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form action="delete_members.php" method="post">
  									<table cellpadding="0" cellspacing="0" border="0" class="table" >
	
										<thead>
										  <tr>
												<!--<th></th>-->
												<th>Event Name</th>
												<th>Description</th>
												<th>From</th>
												<th>To</th>
												<th>Venue</th>
												<th>Price</th>
												<th>Action</th>
										   </tr>
										</thead>
										<tbody>
													<?php
													$user_query = mysqli_query($conn,"select * from event limit 1")or die(mysqli_error());
													while($row = mysqli_fetch_array($user_query)){
													$id = $row['id'];
													?>
									
												<tr>
												<!--<td width="30">
												<input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php //echo $id; ?>">
												</td>-->
												
	
												<td><?php echo $row['Title']; ?></td>
												<td><?php echo $row['content']; ?></td>
												<td><?php echo $row['FromDate']; ?></td>
												<td><?php echo $row['ToDate']; ?></td>
												<td><?php echo $row['Venue']; ?></td>
												<td><?php echo $row['Price']; ?></td>
											
																										
		                                        <td width="120">
												<a rel="tooltip"  title="Edit Event" id="e<?php echo $id; ?>" href="edit_event.php<?php echo '?id='.$id; ?>"  data-toggle="modal" class="btn btn-success"><i class="icon-pencil icon-large"> Edit</i></a>
												</td>
									
												</tr>
												
									
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

		<?php //include('includes/footer.php');?>
        </div>
		
		<?php include('script.php'); ?>
    </body>
	<?php } ?>
</html>
<?php } ?>