<?php 
require_once 'db_config.php';
include('session.php');
error_reporting( ~E_NOTICE );

if(isset($_GET['payid']) && !empty($_GET['payid'])) 
{
$id = $_GET['payid'];
$stmt = $DB_con->prepare('SELECT * FROM roombooking WHERE id =:pid');
$stmt->execute(array(':pid'=>$id));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
extract($row);
}
else{
header('Location: booking-home.php');
}

if(isset($_POST['save']))
{

$userid = $adharid;
$roomusernamepay = $name;
$roomuseremailpay = $email;
$checkinpay = $checkin;
$checkoutpay = $checkout;
$adultpay = $adult;
$childpay = $child;
$roompay = $rooms;
$roomtypepay = $roomtype;
$roomnumberpay = $roomnumber;
$roompricepay = $roomrent;
$roomtotalpay = $roomtotalammount;
$roomstatuspay = "Offline";



$stmt = $DB_con->prepare('SELECT * FROM payment WHERE  userid=:uid');
$stmt->execute(array(':uid'=>$userid));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if($stmt->rowCount() > 0)
{
$errMSG = "$roomusernamepay  Already pay this Ammount and checkout";
//header('refresh:1; booking-home.php');
}
else
{

if(!isset($errMSG))
{
$stmt = $DB_con->prepare('INSERT INTO payment(userid,roomusernamepay,roomuseremailpay,checkinpay,checkoutpay,adultpay,childpay,roompay,roomtypepay,roomnumberpay,roompricepay,roomtotalpay,roomstatuspay) VALUES(:a1,:a2,:a3,:a4,:a5,:a6,:a7,:a8,:a9,:a10,:a11,:a12,:a13)');

$stmt->bindParam(':a1',$userid);
$stmt->bindParam(':a2',$roomusernamepay);
$stmt->bindParam(':a3',$roomuseremailpay);
$stmt->bindParam(':a4',$checkinpay);
$stmt->bindParam(':a5',$checkoutpay);
$stmt->bindParam(':a6',$adultpay);
$stmt->bindParam(':a7',$childpay);
$stmt->bindParam(':a8',$roompay);
$stmt->bindParam(':a9',$roomtypepay);
$stmt->bindParam(':a10',$roomnumberpay);
$stmt->bindParam(':a11',$roompricepay);
$stmt->bindParam(':a12',$roomtotalpay);
$stmt->bindParam(':a13',$roomstatuspay);
if($stmt->execute())
{
$successMSG = "Data Successfully Saved";
header('refresh:1; booking-home.php');
}
else
{
$errMSG = "error something wrong ! please try later...";
}
}
} 
}

?>
<?php require_once"include/admin-header.php";?>
<div style="padding-top:30px;"></div>
<div class="container ">
<div class="row card5">

<div class="col-sm-2"></div>

<div class="col-sm-8">
<div class="card6">
<div class="card5">

<div class="row">
<div class="col-sm-12">

<table class="table table-bordered">
	<form method="post">
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
<thead style="text-align:center">
<tr>
<center><h3 style="color: #C76161">Impressive Hotel Cash / Offline Payment</h3></center> <hr>
</tr>
</thead>
<tbody>
 <tr>
<td>Guest Unique Id :</td>
<td><?php echo $adharid ; ?></td>
</tr>

<tr>
<td>Guest Name :</td>
<td><?php echo $name ; ?></td>
</tr>

<tr>
<td>Total Payable Ammount :</td>
<td style="color:#c76161; font-weight:900 bold"><b>Rs. <?php echo $roomtotalammount ; ?> /-</b></td>
</tr>





<tr>
<td colspan="2"> <center>
	<input type="submit" name="save" value="Pay Now" class="btn btn-success">
</center></td>
</tr>
</form>
</tbody>
</table>



</div>
</div>
</div>
</div>
</div>

<div class="col-sm-2"></div>

</div>
</div>
<?php require_once"include/admin-footer.php";?>