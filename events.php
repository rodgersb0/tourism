<?php
session_start();
include('includes/config.php');

if(strlen($_SESSION['login'])==0)
	{	
header('location:index.php');
}
else{

?>
<!DOCTYPE HTML>
<html>
<head>
<title>Tour Malawi</title>

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
</head>

<?php include('includes/header.php');?>
<?php include('config_mysql.php'); ?>


    <body>
	<br>
	<br>
<div class="container-fluid">
            <div class="row-fluid">
                
			 
		 
				 <br>
				   <div id="block_bg" class="block">
                        <div class="navbar navbar-inner block-header">
                             <div class="muted pull-left"><i class="icon-reorder icon-large"></i> MY upcoming events</div>
                          
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
  	<table cellpadding="0" cellspacing="0" border="0" class="table">
		<thead>			
  
		        <tr>			        
                	<th>Title</th>
					<th>Starting Date </th>
					<th>Ending Date </th>
					<th>Venue </th>
					<th>Price </th>
					<th>Event information</th>
			        
                    	
                   	  				
		    </tr>
		</thead>
<tbody>
<!-----------------------------------Content------------------------------------>
<?php
        $query="select * from event WHERE FromDate > CURDATE()";
		$members_query = mysqli_query($conn,$query);
		while($row = mysqli_fetch_array($members_query)){
		$username = $row['id'];
	
		?>
									
		<tr>
		    <td><?php echo $row['Title']; ?></td>
			<td><?php echo $row['FromDate']; ?></td>
			<td><?php echo $row['ToDate']; ?></td>
			<td><?php echo $row['Venue']; ?></td>
			<td><?php echo"$";echo $row['Price']; ?></td>
			<td><?php echo $row['content']; ?></td>
			
           
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
<br>
<br>
<br>


<!--- /privacy ---->
<!--- footer-top ---->
<!--- /footer-top ---->

<!-- signup -->
<?php include('includes/signup.php');?>			
<!-- //signu -->
<!-- signin -->
<?php include('includes/signin.php');?>			
<!-- //signin -->
<!-- write us -->
<?php include('includes/write-us.php');?>
<?php include('script.php');?>

<?php include('includes/footer.php');?> 
<?php include('script.php'); ?>  
</body>
</html>
<?php } ?>