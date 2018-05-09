  <?php

if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
?>

<?php include('header.php'); ?>
<?php include('config_mysql.php'); ?>
	<?php $get_event_id= $_GET['id']; ?>		  
   <a href="events.php" class="btn btn-info" id="add" data-placement="right" title="Click to Add New" ><i class="icon-plus-sign icon-large"></i> Add New  Event</a>
   <script type="text/javascript">
	$(document).ready(function(){
	$('#add').tooltip('show');
	$('#add').tooltip('hide');
	});
	</script>
<div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><i class="icon-pencil icon-large"></i> Edit Event Info.</div>
                            </div>
  <?php
								$query = mysqli_query($conn,"select * from event where id = '$get_event_id'")or die(mysqli_error());
								$row = mysqli_fetch_array($query);
								?>
   
   <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><i class="icon-plus-sign icon-large"> EDIT EVENT</i></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form method="post">
				<table>
					<tr>
						<td style="color: #003300; font-weight: bold; font-size: 16px">Edit Event Here:</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
					</tr>
					<tr>
					
						<td><label>Event title</label><input type="text" name="title" value="<?php echo $row['Title']; ?>" required></td>
					</tr>
					
					<tr>
						<td><label>From date</label><input type="date" name="fromdate" value="<?php echo $row['FromDate']; ?>" required></td>
					</tr>
					
					<tr>
						<td><label>To date</label><input type="date" name="todate" value="<?php echo $row['ToDate']; ?>" required></td>
					</tr>
					
					<tr>
						<td><label>Venue</label><input type="text" name="venue" value="<?php echo $row['Venue']; ?>" required></td>
					</tr>
					
					<tr>
						<td><label>Price</label><input type="text" name="price" value="<?php echo $row['Price']; ?>" required></td>
					</tr>
					
					
					<tr>
						<td>
						<label>Event information</label>
							<textarea name="content" rows="" cols=""   value="<?php echo $row['content']; ?>" required></textarea>
						</td>
					</tr>
					<tr>
						<td><input type="submit" name="update" value="SAVE"></td>
					</tr>
				</table>
			</form>
								</div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
								
<?php
include ('config_mysql.php');
if(isset($_POST['update'])){
						
											
						$title = $_POST['title'];
						$fromdate = $_POST['fromdate'];
						$todate = $_POST['todate'];
						$venue = $_POST['venue'];
						$price = $_POST['price'];
						$content = $_POST['content'];
							$qry = "UPDATE event  SET Title='$title',FromDate='$fromdate',ToDate='$todate',Venue='$venue',Price='$price',content='$content' where id='$get_event_id'";
							
							$result = mysqli_query($conn,$qry)or die(mysqli_error());
							if($result == TRUE){
								echo "<script type = \"text/javascript\">
											
											window.location = (\"events.php\")
											</script>";
							} else{
								echo "<script type = \"text/javascript\">
											alert(\"Not Updated. Try Again\");
											</script>";
							}
					}


?>
<?php } ?>