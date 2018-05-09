<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>
<!DOCTYPE HTML>
<html>
<head>
<title>TM | Package List</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="applijewelleryion/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/font-awesome.css" rel="stylesheet">
<!-- Custom Theme files -->
<script src="js/jquery-1.12.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<!-- contact float sidebar -->
 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"> 
 <link rel="stylesheet" href="css/contact-buttons.css"> 
 <link rel="stylesheet" href="font-awesome.min.css"> 
 
 <!-- phone number flag picker-->
<link rel="stylesheet" href="css/intlTelInput.css">
  <link rel="stylesheet" href="css/demo1.css">

 <!-- Chat box-->
<link rel="stylesheet" href="css/chatStyle.css" type="text/css" media="screen" />


<!--animate-->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/wow.min.js"></script>
	<script>
		 new WOW().init();
	</script>
<!--//end-animate-->


<!--chatbox-->
<div class="shout_box">
      <div class="header"> Chat with Tour Malawi	  <div class="open_btn">&nbsp;</div></div>
     <div class="toggle_chat">
     <div class="message_box">
    </div>
    <div class="user_info">
	<?php
	$value = htmlentities($_SESSION['login']);
	
	?>
    <!--<input name="shout_username" id="shout_username" type="text" placeholder="Your Name" maxlength="15" />-->
	<input name="shout_username" id="shout_username" type="text" value="<?php echo $value; ?>"/>
   <input name="shout_message" id="shout_message" type="text" placeholder="Type Message Hit Enter" maxlength="100" />
   
   <audio id="audio" style="display:none" volume="100">
   <source src="audio/Ding.mp3" type="audio/mpeg"></audio>
    </div>
    </div>
	</div>
	
	<!-- audio script--
	<script type="text/javascript">	
	document.addEventListener('keydown', function(e) {
if  (e.keyCode == 13){
document.getElementById('audio').play();
audio.volume= 100;
}
});
</script>-->
	
<script type="text/javascript">
$(document).ready(function() {

	// load messages every 1000 milliseconds from server.
	load_data = {'fetch':1};
	window.setInterval(function(){
	 $.post('shout.php', load_data,  function(data) {
		$('.message_box').html(data);
		var scrolltoh = $('.message_box')[0].scrollHeight;
		$('.message_box').scrollTop(scrolltoh);
	 });
	}, 1000);
	
	//method to trigger when user hits enter key
	$("#shout_message").keypress(function(evt) {
		if(evt.which == 13) {
		        document.getElementById('audio').play();
				var iusername = $('#shout_username').val();
				var imessage = $('#shout_message').val();
				var iemail = $('#shout_email').val();
				post_data = {'username':iusername, 'message':imessage, 'email':iemail};
			 	
				//send data to "shout.php" using jQuery $.post()
				$.post('shout.php', post_data, function(data) {
					
					//append data into messagebox with jQuery fade effect!
					$(data).hide().appendTo('.message_box').fadeIn();
	
					//keep scrolled to bottom of chat!
					var scrolltoh = $('.message_box')[0].scrollHeight;
					$('.message_box').scrollTop(scrolltoh);
					
					//reset value of message box
					$('#shout_message').val('');
					
				}).fail(function(err) { 
				
				//alert HTTP server error
				alert(err.statusText); 
				});
			}
	});
	
	$('.toggle_chat').slideToggle();
	
	
	//toggle hide/show shout box
	$(".open_btn").click(function (e) {
		//get CSS display state of .toggle_chat element
		var toggleState = $('.toggle_chat').css('display');
		
		//toggle show/hide chat box
		$('.toggle_chat').slideToggle();
		
		//use toggleState var to change close/open icon image
		if(toggleState == 'block')
		{
			$(".header div").attr('class', 'open_btn');
		}else{
			$(".header div").attr('class', 'close_btn');
		}
		 
		 
	});
});

</script>

<!-- End chat box-->




</head>
<body>
<?php include('includes/header.php');?>
<!--- banner ---->
<div class="banner-3">
	<div class="container">
		<h1 class="wow zoomIn animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;">Tour Malawi - Package List</h1>
	</div>
</div>
<!--- /banner ---->
<!--- rooms ---->









<div class="rooms">
	<div class="container">
		
		<div class="room-bottom">
			<h3>Package List</h3>

					
<?php $sql = "SELECT * from tbltourpackages";
$query = $dbh->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	?>
			<div class="rom-btm">
				<div class="col-md-3 room-left wow fadeInLeft animated" data-wow-delay=".5s">
					<img src="admin/pacakgeimages/<?php echo htmlentities($result->PackageImage);?>" class="img-responsive" alt="">
				</div>
				<div class="col-md-6 room-midle wow fadeInUp animated" data-wow-delay=".5s">
					<h4>Package Name: <?php echo htmlentities($result->PackageName);?></h4>
					<h6>Package Type : <?php echo htmlentities($result->PackageType);?></h6>
					<p><b>Package Location :</b> <?php echo htmlentities($result->PackageLocation);?></p>
					<p><b>Features</b> <?php echo htmlentities($result->PackageFetures);?></p>
				</div>
				<div class="col-md-3 room-right wow fadeInRight animated" data-wow-delay=".5s">
				<small><h4>From</h4></small><h5>$<big><?php echo htmlentities($result->PackagePrice);?></big></h5><small><h4>pp</h4></small>
					<a href="package-details.php?pkgid=<?php echo htmlentities($result->PackageId);?>/<?php echo htmlentities($result->PackageName);?>" class="view">View</a>
				</div>
				<div class="clearfix"></div>
			</div>

<?php }} ?>
		
		
		
		
		
		</div>
	</div>
</div>
<!--- /rooms ---->

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
<!-- //write us -->


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



<!-- script for float contact sidebar -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="jquery.min.js"></script>
 <script src="js/jquery.contact-buttons.js"></script>
 <script src="js/demo.js"></script> 


  <!-- Load jQuery from CDN so can run demo immediately -->
  <script src="js/intlTelInput.js"></script>
  <script>
    $("#phone").intlTelInput({
      utilsScript: "js/utils.js"
    });
  </script>
 
</body>
</html>