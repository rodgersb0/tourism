<?php
//error_reporting(0);
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
		
        <div class="container-fluid">
            <div class="row-fluid">
			<?php include('sidebar.php'); ?>
					<div class="span9" id="content">
                     <div class="row-fluid">
                        <!-- block -->
				<div class="empty">
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                         <i class="icon-info-sign"></i>  <strong>Note!:</strong> Select the checbox if you want to delete?
                    </div>
                </div> 
			
					 
				<?php
                 $query = "select * from tblbooking WHERE status=1";				
	             $count_members=mysqli_query($conn,$query);
	             $count = mysqli_num_rows($count_members);
				 
                 ?>	 
				   <div id="block_bg" class="block">
                        <div class="navbar navbar-inner block-header">
                             <div class="muted pull-left"><i class="icon-reorder icon-large"></i> Reserved packages List</div>
                          <div class="muted pull-right">
								Number of Reserved packages: <span class="badge badge-info"><?php  echo $count; ; ?></span>
							 </div>
						  </div>
						  
<br>
													
<div class="container-fluid">


  <div class="row-fluid"> 
     <div class="empty">
	     <div class="pull-left">
		 <p class=msoNormal style='margin-bottom:0in; margin-top:-30px; margin-bottom:.0001pt;line-height:
            normal'><span style='font-size:12.0pt;mso-bidi-font-size:11.0pt;font-family:
           "Times New Roman","serif"'>
			</div>
			
			<div class="pull-right">
		   <a href="print_reservation.php" class="btn btn-info" id="print" data-placement="left" title="Click to Print"><i class="icon-print icon-large"></i> Print List</a> 		      
		   <script type="text/javascript">
		     $(document).ready(function(){
		     $('#print').tooltip('show');
		     $('#print').tooltip('hide');
		     });
		   </script>        	   
         </div>
      </div>
    </div> 
</div>
	
<div class="block-content collapse in">
    <div class="span12">
	<form action="" method="post">
  	<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
		<thead>		
		        <tr>			        
                	<th>Client Name</th>
					<th>Client Number </th>
					<th>Package Name</th>
			        <th>From Date</th>
					<th>To Date</th>
					
               
                    	
                   		
                    				
		    </tr>
		</thead>
<tbody>
<!-----------------------------------Content------------------------------------>
<?php

        $query="SELECT tblusers.FullName as CLIENT_NAME,tblusers.MobileNumber as CLIENT_NUMBER,
tbltourpackages.PackageName as PACKAGE_NAME,tblbooking.FromDate as FROM_DATE,tblbooking.ToDate as TO_DATE,
tblbooking.status as STATUS from tblusers join  tblbooking on  
tblbooking.UserEmail=tblusers.EmailId join tbltourpackages on tbltourpackages.PackageId=tblbooking.PackageId WHERE tblbooking.status=1";




/*$query = "SELECT tblbooking.BookingId as bookid,tblusers.FullName as fname,tblusers.MobileNumber as mnumber,tblusers.EmailId as email,
tbltourpackages.PackageName as pckname,tblbooking.PackageId as pid,tblbooking.FromDate as fdate,tblbooking.ToDate as tdate,tblbooking.Comment as comment,
tblbooking.status as status,tblbooking.CancelledBy as cancelby,tblbooking.UpdationDate as upddate from tblusers join  tblbooking on  
tblbooking.UserEmail=tblusers.EmailId join tbltourpackages on tbltourpackages.PackageId=tblbooking.PackageId ORDER BY bookid DESC";*/

		
		$members_query = mysqli_query($conn,$query)or die(mysqli_error());
		while($row = mysqli_fetch_array($members_query)){
		
	
		?>
									
		<tr>
		    <td><?php echo $row['CLIENT_NAME'] ?></td>
			<td><?php echo $row['CLIENT_NUMBER']; ?></td>
			<td><?php echo $row['PACKAGE_NAME']; ?></td>
			<td><?php echo $row['FROM_DATE']; ?></td>
			<td><?php echo $row['TO_DATE']; ?></td>
			
           
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
<?php include('includes/footer.php'); ?>
</div>
	<?php include('script.php'); ?>					
 </body>
</html>
<?php } ?>