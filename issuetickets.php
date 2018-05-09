<?php
session_start();
?>



<!DOCTYPE html>
<html>
    <head>
		
			<title>Tour Malawi</title>
		<meta name="description" content="tour malawi">
		<meta name="keywords" content="">
		<meta name="author" content="Rodgers Missili">
		<meta charset="UTF-8">		
        <!-- Bootstrap -->
			
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
    </head>


    <body>
		<?php include('includes/header.php');?>
		<?php include('admin/config_mysql.php'); ?>
		<?php include('includes/config.php'); ?>
		
        <div class="container-fluid">
            <div class="row-fluid">
			    
                
			
					 
				<?php
                 $query = "select * from tblissues WHERE UserEmail= '".$_SESSION['login']."'";				
	             $count_members=mysqli_query($conn,$query);
	             $count = mysqli_num_rows($count_members);
				 
                 ?>	 
				 <br>
				 <br>
				 <br>
				   <div id="block_bg" class="block">
                        <div class="navbar navbar-inner block-header">
                             <div class="muted pull-left"><i class="icon-reorder icon-large"></i> Tickets List</div>
                          <div class="muted pull-right">
								Number of placed tickets: <span class="badge badge-info"><?php  echo $count; ?></span>
							 </div>
						  </div>
						  
                 <h4 id="sc">members List
					<div align="right" id="sc">Date:
						<?php
                            $date = new DateTime();
                            echo $date->format('l, F jS, Y');
                         ?></div>
				 </h4>


	<br>
<div class="block-content collapse in">
    <div class="span12">
	<form action="" method="post">
  	<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
		<thead>		
		        <tr>			        
                	<th>#</th>
					<th>User Id </th>
					<th>Issue</th>
			        <th>Description</th>
					<th>Admin Remark</th>
					<th>Reg Date</th>
                    <th>Remark date </th>
                    	
                   		
                    				
		    </tr>
		</thead>
<tbody>
<!-----------------------------------Content------------------------------------>
<?php
        $query="select * from tblissues WHERE UserEmail= '".$_SESSION['login']."'";
		$members_query = mysqli_query($conn,$query)or die(mysqli_error());
		while($row = mysqli_fetch_array($members_query)){
		$username = $row['UserEmail'];
	
		?>
									
		<tr>
		    <td><?php echo $row['id'] ?></td>
			<td><?php echo $row['UserEmail']; ?></td>
			<td><?php echo $row['Issue']; ?></td>
			<td><?php echo $row['Description']; ?></td>
			<td><?php echo $row['AdminRemark']; ?></td>	
			<td><?php echo $row['PostingDate']; ?></td>
            <td><?php echo $row['AdminremarkDate']; ?></td>
           
            </tr>
											
	<?php } ?>   

</tbody>
</table>
</form>		
		
			  		
</div>
</div>
</div>
</div>
</div>
	
</div>	

</div>
<br>
<br>
<br>
<br>
<br>


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
						
 </body>
</html>
<?php// } ?>