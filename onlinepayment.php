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
$roomstatuspay = "Online";
$card = $_POST['card'];
$cardnumber = $_POST['cardnumber'];
$bankname = $_POST['bankname'];



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
$stmt = $DB_con->prepare('INSERT INTO payment(userid,roomusernamepay,roomuseremailpay,checkinpay,checkoutpay,adultpay,childpay,roompay,roomtypepay,roomnumberpay,roompricepay,roomtotalpay,roomstatuspay,card,cardnumber,bankname) VALUES(:a1,:a2,:a3,:a4,:a5,:a6,:a7,:a8,:a9,:a10,:a11,:a12,:a13,:a14,:a15,:a16)');

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
$stmt->bindParam(':a14',$card);
$stmt->bindParam(':a15',$cardnumber);
$stmt->bindParam(':a16',$bankname);
if($stmt->execute())
{
$successMSG = "Payment Successful";
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

<div class="container">
<div class="card6">
<div class="row">
<div class="col-sm-3"> </div>
<div class="col-sm-6">
<div class="card5">

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

<center><h3 style="color: #C76161">Impressive Hotel Online Payment</h3></center> <hr>
<label>Guest Name : <span style="color: #C76161"><?php echo $name;?> </span> </label> 
<label style="float: right;"><small><?php echo "Date :  " . date("Y/m/d") . "<br>";?></small> </label>
<br>
<label>Total Payable Ammount : <span style="color: #C76161"> <b>Rs. <?php echo $roomtotalammount;?> /-</b> </span> </label>

<hr>


<div class="form-group">
<select name="card" class="form-control" required="required">
	<option value="select none" selected disabled>Select Card type Credit card Debit card</option>
    <option value="Credit Card">Credit Card</option>
    <option value="Debit Card">Debit Card</option>
</select>
</div>


<div class="form-group">
<select name="bankname" class="form-control" required="required">
	<option value="Select none " selected disabled>Select Bank</option>
    <option value="Axis Bank Debit Card">Axis Bank Debit Card</option>
    <option value="Axis Bank Credit Card">Axis Bank Credit Card</option>
    <option value="Axis Bank Debit">Axis Bank Debit Card</option>
    <option value="State Bank of india Debit Card">State Bank of india Debit Card</option>
</select>
</div>



<div class="form-group">
<input type="text" name="cardholdername" placeholder="Card holder Name" class="form-control" required="required">
</div>

<div class="row">
	<div class="col-sm-6">
<div class="form-group">
<input type="text" name="cardnumber" placeholder="xxxx-xxxx-xxxx-xxxx" max="16" onkeypress="return mask(this,event);" class="form-control" required="required">
</div>
</div>

<div class="col-sm-3">
<div class="form-group">
<input type="text" name="expiry" placeholder="Expiry Date MM/YY"  class="form-control" required="required">
</div>
</div>
<div class="col-sm-3">
<div class="form-group">
<input type="text" name="cvv" placeholder="CVV" onkeypress="return mask(this,event);" max="3" class="form-control" required="required">
</div>

</div>
</div>

<div class="form-group">
	<label>ATM Seure Password for Payment</label>
<input type="text" name="passtxt" placeholder="Enter Secure Password" class="form-control" required="required">
</div>

<hr />
<input type="submit" name="save" class="btn btn-success" value="Pay Now" >
</form>
</div>
</div> 

<div class="col-sm-3"> </div>
</div>
</div>
</div> </div>

<?php require_once"include/admin-footer.php";?>
