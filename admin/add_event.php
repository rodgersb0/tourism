   <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><i class="icon-plus-sign icon-large"> ADD EVENT</i></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form method="post">
				<table>
					<tr>
						<td style="color: #003300; font-weight: bold; font-size: 16px">Add Event Here:</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td><input type="text" name="title" placeholder="Event title" required></td>
					</tr>
					
					<tr>
						<td>  <label>From date</label> <input type="date" name="fromdate" value="Date" required></td>
					</tr>
					
					<tr>
						<td>  <label>To date</label><input type="date" name="todate" value="Date" required></td>
					</tr>
					
					
					 
					<tr>
						<td>  <label> <i class= "fa fa-map-marker"></i></label> <input type="text" name="venue" placeholder="Event venue" required></td>
					</tr>
					
					<tr>
						<td>  <label> <i class= "fa fa-usd"></i></label> <input type="text" name="price" placeholder="Event price" required></td>
					</tr>
					
					<tr>
						<td>
							<textarea name="content" placeholder="Description"  type="text" required></textarea>
						</td>
					</tr>
					<tr>
						<td><input type="submit" name="send" value="SAVE"></td>
					</tr>
				</table>
			</form>
								</div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
								
<?php
include('config_mysql.php'); 
if(isset($_POST['send'])){
						
											
						$title = $_POST['title'];
						$fromdate = $_POST['fromdate'];
						$todate = $_POST['todate'];
						$venue = $_POST['venue'];
						$price = $_POST['price'];
						$content = $_POST['content'];
							$qry = "INSERT INTO event (Title,FromDate,ToDate,Venue,Price,content)
							VALUES('$title','$fromdate','$todate','venue','price','$content')";
							
							$result = mysqli_query($conn,$qry) or die(mysqli_error($conn));
							
							if($result == TRUE){
								echo "<script type = \"text/javascript\">
											
											window.location = (\"events.php\")
											</script>";
							} else{
								echo "<script type = \"text/javascript\">
											alert(\"message Not Send. Try Again\");
											</script>";
							}
							
							
					}


?>