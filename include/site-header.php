<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head >
<title>Hotel Management</title>
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
<!-- //end-smoth-scrolling -->
<asp:ContentPlaceHolder id="head" runat="server">
</asp:ContentPlaceHolder>
</head>
<body>
<div class="banner  bann-mask">
<div class="container">
<div class="phone-icons">
<div class="phone-num"><p>Ph : +586 454 764 2577</p></div>
<div class="social-icons">
<ul>
<li><a style="color: #fff !important;" href="login.php">Admin Login </a></li>

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
<li><a href="gallery.php">Gallery</a></li> 
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
