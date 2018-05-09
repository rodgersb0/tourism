<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>
<!DOCTYPE HTML>
<html>
<head>
<title>TM | Package Details</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="applijewelleryion/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/font-awesome.css" rel="stylesheet">

<!-- share buttons -->

    <link rel="stylesheet" type="text/css" href="css/jquery.floating-social-share.min.css" />


	<!-- phone number flag picker-->
<link rel="stylesheet" href="css/intlTelInput.css">
  <link rel="stylesheet" href="css/demo1.css">

	
<!-- Custom Theme files -->
<script src="js/jquery-1.12.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!--animate-->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/wow.min.js"></script>
<link rel="stylesheet" href="css/jquery-ui.css" />
	<script>
		 new WOW().init();
	</script>
<script src="js/jquery-ui.js"></script>
					<script>
						$(function() {
						$( "#datepicker,#datepicker1" ).datepicker();
						});
					</script>
					
					<script>
					function validateForm() {
    var x = document.forms["book"]["fromdate"].value;
    if (x == null || x == "") {
        alert("Date must be filled out");
        return false;
    }
}
					
					</script>
					<script>
					function validateForm() {
    var x = document.forms["book"]["todate"].value;
    if (x == null || x == "") {
        alert("Date must be filled out");
        return false;
    }
}
					
					</script>
					
					
					
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
</head>
<body>
<!-- top-header -->
<?php include('includes/header.php');?>
<div class="banner-3">
	<div class="container">
		<h1 class="wow zoomIn animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;"> Tour Malawi-Package Details</h1>
	</div>
</div>
<!--- /banner ---->
<!--- selectroom ---->
<div class="selectroom">
	<div class="container">	
		  <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>


<form name="book" method="post" onsubmit="return validateForm()">
		<div class="selectroom_top">
			<div class="col-md-4 selectroom_left wow fadeInLeft animated" data-wow-delay=".5s">
				<img src="admin/pa/<!--<?php echo htmlentities($result->PackageImage);?>-->" class="img-responsive" alt="Package Image">
			</div>
			<div class="col-md-8 selectroom_right wow fadeInRight animated" data-wow-delay=".5s">
				<h2>Package Name</h2>
				<p class="dow">#PKG-</p>
				<p><b>Package Type :</b> </p>
				<p><b>Package Location :</b> </p>
					<p><b>Features: </b> </p>
					<div class="ban-bottom">
					
				<div class="bnr-right">
				<label class="inputLabel">From</label>
				<input class="date" id="datepicker" type="text" placeholder="yyyy-mm-dd"  name="fromdate" readonly="readonly" required >
	
			</div>
		
			<div class="bnr-right">
				<label class="inputLabel">To</label>
				<input class="date" id="datepicker1" type="text" placeholder="yyyy-mm-dd" name="todate" readonly="readonly" required >
			</div>
			</div>
						<div class="clearfix"></div>
				<div class="grand">
					<p>From</p>
					 <h3>Price</h3>
					<p>per person</p>
				</div>
			</div>
		<h3>Package Information</h3>
				<p style="padding-top: 1%" align="Justify"><i>Package information</i></p>	
				<div class="clearfix"></div><br><br>
				
		
		<div class="selectroom_top">
			<h2>Travel</h2>
			<div class="selectroom-info animated wow fadeInUp animated" data-wow-duration="1200ms" data-wow-delay="500ms" style="visibility: visible; animation-duration: 1200ms; animation-delay: 500ms; animation-name: fadeInUp; margin-top: -70px">
				<ul>
				
					<li class="spe">
						<label class="inputLabel">Comment on the package</label>
						<input class="special" type="text" name="comment">
					</li>
					<?php if($_SESSION['login'])
					{?>
						<li class="spe" align="center">
					<button type="submit" name="submit2" class="btn-primary btn"> Reserve Package </button>
						</li>
						<?php } else {?>
							<li class="sigi" align="center" style="margin-top: 1%">
							<a href="#" data-toggle="modal" data-target="#myModal4" class="btn-primary btn" > Reserve Package</a></li>
							<?php } ?>
					<div class="clearfix"></div>
				</ul>
			</div>
			
		</div>
		</form>



	</div>
</div>
<!--- /selectroom ---->
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

         
		 
<!-- No rightclick -->
<script type="text/javascript">

if (document.addEventListener){
    document.addEventListener('contextmenu', function(e){
	e.preventDefault();
	}, false);
	
} else {
document.attachEvent('oncontextmenu', function(){
window.event.returnValue = false;
});
}

</script>


<script type="text/javascript" src="js/jquery.floating-social-share.min.js"></script>
<script>
  $("body").floatingSocialShare({
    place: "top-right",
    buttons: [
      "facebook", "google-plus", "linkedin", "telegram", "tumblr", "twitter","tumbrl", "whatsapp"
    ],
    twitter_counter: true,
    text: "share with: ",
    url: "http://google.com"
  });
</script>

<!-- Load jQuery from CDN so can run demo immediately -->
  <script src="js/intlTelInput.js"></script>
  <script>
    $("#phone").intlTelInput({
      
      utilsScript: "js/utils.js"
    });
  </script>
 

</body>
</html>