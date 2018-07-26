<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head >
<title>Hotel Management</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery-1.11.0.min.js"></script>
<!-- <script src="js/jquery1.9.1.js"></script>
<script src="js/jquery-1.9.2jquery-ui.min.js"></script> -->



<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Impressive Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
jQuery(document).ready(function ($) {
$(".scroll").click(function (event) {
event.preventDefault();
$('html,body').animate({ scrollTop: $(this.hash).offset().top }, 1000);
});
});
</script>
<!-- //end-smoth-scrolling -->


</head>

<body>

<div class="banner  bann-mask">
<div class="container">
<div class="phone-icons">
<div class="phone-num"><p style="color: #F9E7A7; font-size: 18px;"> <small style="font-size: 14px;color: #fff !important;">Welcome</small> <?php echo $_SESSION['login_user']; ?></p></div>
<div class="social-icons">
<ul>


<li > <a style="color: #fff;" href="logout.php">Logout</a> </li>

</ul>
</div>
<div class="clearfix"> </div>
</div>
</div>
<div class="header">
<div class="container">
<div class="header-main">
<div class="logo">
<a href="#"><img src="images/logo1.png" alt=""></a>
</div>
<div class="top-nav">
<span class="menu"> <img src="images/icon.png" alt=""/></span>
<ul class="res"> 
<li><a href="booking-home.php">Booking Home</a></li> 
<li><a href="roombooking.php">New Booking</a></li> 
<li><a href="addrooms.php">Add Rooms</a></li> 
<li><a href="reportall.php">All Records Report</a></li> 
<li><a href="reportbyid.php">Report By ID</a></li> 

</ul>
<!-- script-for-menu -->
<script>
$("span.menu").click(function () {
$("ul.res").slideToggle(300, function () {
// Animation complete.
});
});
</script>
</div>
<div class="clearfix"> </div>
</div>
</div>
</div>

<div style="background:#eee;padding-top:50px; padding-bottom:100px; min-height:500px; background-image:url('images/back100.jpg');background-repeat: no-repeat;
background-attachment: fixed;
background-size: cover;">