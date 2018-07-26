<?php 
error_reporting( ~E_NOTICE );

if(isset($_POST['send']))
{

	$rname = $_POST['txt_urn'];

if($rname==""){
$successMSG ="Email Sucessfully Sent.";
}

}
?>

<?php include_once "include/site-header.php"; ?>
<div class="bann-page">
<div class="container">
<ul>
<li><a href="index.html" class="active">Home</a></li> /
<li><h4>Contact</h4></li> 
</ul>
</div>
</div>
</div>
<!--header end here-->
<!--contact start here-->
<div class="contact">
<div class="container">
<div class="contact-main">
<div class="contact-top">
<h2>Contact</h2>
<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text.</p>
</div>

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

<div class="contact-bottom">
<div class="col-md-9 contact-left">
<form method="post">
<input type="text" placeholder="Name" name="txt_urn">
<input type="text" class="email" placeholder="Email">
<textarea placeholder="Message" required=""></textarea>
<input type="submit" value="Send" name="send" class="btn btn-theme">
</form>
</div>
<div class="col-md-3 contact-right">
<h4>Nemo voluptatem</h4>
<p><b>Company Office</b></p>
<p>voluptatem nesciunt.</p>
<p>+880 5558 568 78541</p>
<p><a href="mailto:info@example.com">user@gmail.com</a></p>
</div>
<div class="clearfix"> </div>
</div>
</div>
</div>
</div>
<!--contact end here-->
<!--map start here-->
<div class="map">
<div class="container">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387144.007583421!2d-73.97800349999999!3d40.7056308!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2sin!4v1415253431785"  frameborder="0" style="border:0"> </iframe>
</div>
</div>
<!--map end here-->
<?php include_once "include/site-footer.php"; ?>

