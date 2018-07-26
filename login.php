<?php 
require_once 'db_config.php';
error_reporting( ~E_NOTICE );


if(isset($_POST['login']))
{
$username = $_POST['txt_user'];
$password = $_POST['txt_pass'];


$stmt = $DB_con->prepare('SELECT * FROM table_login WHERE username=:uname AND password=:upass ');
$stmt->execute(array(':uname'=>$username,':upass'=>$password));
$result = $stmt->fetch(PDO::FETCH_ASSOC);
//extract($row_home);

if ($result==TRUE) {
session_start();// Starting Session
//$ucheck = $_SESSION['login_user'];

$stmt = $DB_con->prepare('SELECT * FROM table_login WHERE username=:uname');
$stmt->execute(array(':uname'=>$ucheck));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

$login_session =$row['username'];
if(!isset($login_session)){

if(isset($_SESSION['username']))
unset($_SESSION['username']);
header('refresh:1; login.php');
}


$_SESSION['login_user']=$username;
$successMSG = "Sucessfully Login";
header('refresh:1; booking-home.php');

}
else
{
$errMSG = "Wrong Username Password";

}

}

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head >
<title></title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery-1.11.0.min.js"></script>
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
</head>
<body>

<div class="banner  bann-mask">
<div class="container">
<div class="phone-icons">
<div class="phone-num"><p>Ph : +586 454 764 2577</p></div>
<div class="social-icons">
<ul>
<li><a href="#"><span class="fa"> </span></a></li>
<li><a href="#"><span class="tw"> </span></a></li>
<li><a href="#"><span class="g"> </span></a></li>
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
<li><a href="index.php" class="active">Home</a></li> 
<li><a href="about.php">About</a></li> 
<li><a href="services.php">Services</a></li> 
<li><a href="contact.php">Contact</a></li> 
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


<div style="padding-top:30px;"></div>
<div class="container">
<div class="row">
<div class="col-sm-4">

</div>

<div class="col-sm-4">
<?php
if(isset($errMSG))
{
?>
<div class="alert alert-danger">
<span class="glyphicon glyphicon-info-sign"></span> <strong><?php echo $errMSG; ?></strong>
</div>
<?php
}
else if(isset($successMSG))
{
?>
<div class="alert alert-success">
<strong><span class="glyphicon glyphicon-info-sign"></span> <?php echo $successMSG; ?></strong>
</div>
<?php
}
?>
<form method="post" enctype="multipart/form-data">
<div class="card5" >
<center><h3> Admin LogIn</h3> </center><hr>

<div class="form-group">
<label>UserName </label>
<input type="text" name="txt_user" class="form-control" required="">
</div>

<div class="form-group">
<label>Password</label>
<input type="password" name="txt_pass" class="form-control" required="">
</div>

<hr />
<div class="form-group">
<input type="submit" name="login" class="btn btn-theme btn-block" value="LogIn">
</div>
<br>
<a href="forgotpassword.php"> Forgot Password</a>
</div>
</div>

</form>
<div class="col-sm-4">
</div>

</div>
</div>
</div>

<div style="background-color:#171717; width:100%; height:auto; padding-bottom:30px; margin-bottom:0px;">
<div class="container">
<div class="footer-main">
<div class="copy-right">
<p>© 2016 Impressive. All rights reserved</p>
</div>

<script type="text/javascript">
$(document).ready(function () {
$().UItoTop({ easingType: 'easeOutQuart' });
});
</script>
<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
</div>
</div>
</div> 
<!--footer end here-->
</body>
</html>
