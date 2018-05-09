<?php
session_start();
error_reporting(0);
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
<title>TM | Manage tickets</title>
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

<style>
		.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
		</style>
		<script language="javascript" type="text/javascript">
var popUpWin=0;
function popUpWindow(URLStr, left, top, width, height)
{
 if(popUpWin)
{
if(!popUpWin.closed) popUpWin.close();
}
popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+600+',height='+250+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
}

</script>

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
				 $query="SELECT tblissues.id as id,tblusers.FullName as fname,tblusers.MobileNumber as mnumber,tblusers.EmailId as email,tblissues.Issue as issue,tblissues.Description as Description,tblissues.PostingDate as PostingDate from tblissues join tblusers on tblusers.EmailId=tblissues.UserEmail ORDER BY id DESC";
	             $count_log=mysqli_query($conn,$query);
	             $count = mysqli_num_rows($count_log);
                 ?>	 
                        <div id="block_bg" class="block">
                            
                            <div class="block-content collapse in">
                                <div class="span12">
								<form action="delete_users.php" method="post">
  									<table cellpadding="0" cellspacing="0" border="0" class="table">
								
										<thead>
                                 <tr>
					
					
					        <th>#</th>
							<th >Name</th>
							<th>Mobile No.</th>
							<th>Email Id</th>
							<th>Issues</th>
							<th>Description </th>
							<th>Postin Date</th>
							<th> </th>
							
						  
										   </tr>
										</thead>
										<tbody>		

						  
						
<?php $sql = "SELECT tblissues.id as id,tblusers.FullName as fname,tblusers.MobileNumber as mnumber,tblusers.EmailId as email,tblissues.Issue as issue,tblissues.Description as Description,tblissues.PostingDate as PostingDate from tblissues join tblusers on tblusers.EmailId=tblissues.UserEmail ORDER BY id DESC";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

if($query->rowCount() > 0)
{
foreach($results as $result)
{				?>		
						  <tr>
							<td width="100">#00<?php echo htmlentities($result->id);?></td>
							<td width="50"><?php echo htmlentities($result->fname);?></td>
							<td width="90"><?php echo htmlentities($result->mnumber);?></td>
							<td width="50"><?php echo htmlentities($result->email);?></td>
							<td width="180"><?php echo htmlentities($result->issue);?></a></td>
							<td width="300"><p align="Justify"><?php echo htmlentities($result->Description);?></p></td>
							
								<td width="50"><?php echo htmlentities($result->PostingDate);?></td>
			

<td width="100"><p><a href="javascript:void(0);" title="View placed ticket" onClick="popUpWindow('http://localhost/tourism/admin/updateissue.php?iid=<?php echo ($result->id);?>');"><i class="fa fa-eye fa-2x"></i></a><br><br>
			
			<a  onClick="call(<?php echo htmlentities($result->id); ?>);"> <i class="fa fa-trash fa-2x" style="color:red"></i></a>
			
			
		
			
</td>

</tr>
						 <?php } }?>
						</tbody>
					  </table>
					</div>
				  </table>

				  		</div>
		

<?php include('includes/footer.php');?>

</div>
<script>
	$(document).ready(function(){

});
	function call(e){
	swal({
  title: "Are you sure?",
  text: "",
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
  
     swal("Deleted!", "Ticket has been deleted successfully."+ e, "success");
setTimeout(function(){
  window.location.href="delete-ticket.php?iid="+e;
  
  }, 2000);
  } else {
    swal("Cancelled", " ", "error");
  }
});
}
	</script>
	
</div>
</div>
<?php include('script.php'); ?>   

</body>
</html>
<?php } ?>
		