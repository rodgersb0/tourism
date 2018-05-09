<?php
 session_start();
error_reporting(0);
include('includes/config.php');
?>

<!DOCTYPE HTML>
<html>
<head>
<title>TM | Gallery</title>
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
 <link rel="stylesheet" href="css/contact-buttons.css"> 
 <link rel="stylesheet" href="font-awesome.min.css">
 

<!--animate-->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/wow.min.js"></script>
	<script>
		 new WOW().init();
	</script>
<!--//end-animate-->

<!-- gallery script -->

<script type="text/javascript">
    $(function() {
        $('#gallery a').lightBox();
    });
    </script>
   	<style type="text/css">
	/* jQuery lightBox plugin - Gallery style */
	#gallery {
		background-color:#FFFFFF;
		padding: 10px;
		width: 500px;
	}
	#gallery ul { list-style: none; }
	#gallery ul li { display: inline; }
	#gallery ul img {
		/*border: 5px solid #3e3e3e;*/
		border: 5px solid black;
		border-width: 5px 5px 5px;
	}
	#gallery ul a:hover img {
		border: 5px solid #33CCFF;
		border-width: 5px 5px 5px;
		color: #fff;
	}
	#gallery ul a:hover { color: #fff; }
	</style>
	
	
    <script type="text/javascript" src="js/lightbox/jquery.js"></script>
    <script type="text/javascript" src="js/lightbox/jquery.lightbox-0.5.js"></script>
    <link rel="stylesheet" type="text/css" href="css/lightbox/jquery.lightbox-0.5.css" media="screen" />
	 
   

</head>
<body>
<?php include('includes/header.php');?>
<br>

<div id="gallery">
<div class="container text-center">
	<br>
	<?php
	echo "<ul>";
	$p="#gallery";
	$op=opendir("admin/pacakgeimages");
	while($fr=readdir($op))
	{
	 if($fr!=".." and $fr!="." and $fr!="Thumbs.db")
	 {
        echo "<li>";
           //echo "<a href='admin/pacakgeimages/$fr' title='This is a collection of our gallery, take your time and appreciate it. $p.lightBox();'>";
			
			echo "<a href='admin/pacakgeimages/$fr' title='This is our gallery'>";
                //echo "<img src='admin/gallery/$fr' width='80' height='90' alt='' />";
				echo "<img src='admin/pacakgeimages/$fr' width='120' height='110' alt='' />";
            echo "</a>";
        echo "</li>";
        }
		}
   echo "</ul>";
   ?>
 </div>
</div>


<br>
<br>

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
 
 
 
 
   <script src="js/lightbox/lightbox-plus-jquery.min.js"></script>
 
 
 
</body>
</html>