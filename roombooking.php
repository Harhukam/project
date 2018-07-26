<?php 
require_once 'db_config.php';
include('session.php');
error_reporting( ~E_NOTICE );


if(isset($_POST['save']))
{
$adharid = $_POST['txt_adhaar'];
$user = $_POST['txt_user'];
$checkin = $_POST['txt_checkin'];
$checkout = $_POST['txt_checkout'];
$adult = $_POST['txt_adult'];
$child = $_POST['txt_child'];
$rooms = $_POST['txt_rooms'];
$roomtype = $_POST['txt_roomstype'];
$roomnumber = $_POST['txt_roomnumber'];
$name = $_POST['txt_name'];
$email = $_POST['txt_email'];
$phone = $_POST['txt_phone'];
$requirement = $_POST['txt_requirements'];
$address = $_POST['txt_address'];
$city = $_POST['txt_city'];
$state = $_POST['txt_state'];
$country = $_POST['txt_country'];
$pincode = $_POST['txt_pincode'];
$roomrent= $_POST['txt_roomrent'];



$date1 = $_POST['txt_checkin'];
$date2 = $_POST['txt_checkout'];
$diff = abs(strtotime($date2) - strtotime($date1));
$totaldays = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));




if ($rooms="Double") {
$roomrentcal="2";
}
elseif($rooms="Single")
{
$roomrentcal="1";
}
else{
	$roomrentcal="none";
}

$roomtotalammount = $totaldays * $roomrentcal * $roomrent;




$stmt = $DB_con->prepare('SELECT * FROM roombooking WHERE  roomnumber=:uid');
$stmt->execute(array(':uid'=>$roomnumber));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if($stmt->rowCount() > 0)
{
$errMSG = " Selected Room Already Booked please assign another room.";
//header('refresh:1; booking-home.php');
}
else
{


if(!isset($errMSG))
{
$stmt = $DB_con->prepare('INSERT INTO roombooking(adharid,user,checkin,checkout,adult,child,rooms,roomtype,roomnumber,name,email,phone,requirement,address,city,state,country,pincode,totaldays,roomrent,roomrentcal,roomtotalammount,roomrent,roomrentcal,roomtotalammount) VALUES(:a1,:a2,:a3,:a4,:a5,:a6,:a7,:a8,:a9,:a10,:a11,:a12,:a13,:a14,:a15,:a16,:a17,:a18,:a19,:a20,:a21,:a22)');

$stmt->bindParam(':a1',$adharid);
$stmt->bindParam(':a2',$user);
$stmt->bindParam(':a3',$checkin);
$stmt->bindParam(':a4',$checkout);
$stmt->bindParam(':a5',$adult);
$stmt->bindParam(':a6',$child);
$stmt->bindParam(':a7',$rooms);
$stmt->bindParam(':a8',$roomtype);
$stmt->bindParam(':a9',$roomnumber);
$stmt->bindParam(':a10',$name);
$stmt->bindParam(':a11',$email);
$stmt->bindParam(':a12',$phone);
$stmt->bindParam(':a13',$requirement);
$stmt->bindParam(':a14',$address);
$stmt->bindParam(':a15',$city);
$stmt->bindParam(':a16',$state);
$stmt->bindParam(':a17',$country);
$stmt->bindParam(':a18',$pincode);
$stmt->bindParam(':a19',$totaldays);
$stmt->bindParam(':a20',$roomrent);
$stmt->bindParam(':a21',$roomrentcal);
$stmt->bindParam(':a22',$roomtotalammount);
if($stmt->execute())
{
$successMSG = "Data Successfully Saved";
header('refresh:3; booking-home.php');
}
else
{
$errMSG = "error something wrong ! please try later...";
}
}
} }
?>

<?php require_once"include/admin-header.php";?>
<div style="padding-top:30px;"></div>
<div class="container">
<div class="card5">
<div class="card6">
<div class="row" >
<form method="post" enctype="multipart/form-data">
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
<div class="col-sm-6">
<div class="form-group">
<label>Adhaar ID / Passport Number</label>
<input type="text" name="txt_adhaar" class="form-control" maxlength="12" required="" value=" ">
</div>
</div>


<div class="col-sm-6 " style="padding-left:0px;">
<div class="form-group">
<label>User</label>
<input type="text" name="txt_user" value="Admin" readonly="true" class="form-control" required="" value="">
</div>
</div>
</div>
</div>
<br />



<div class="row">
<div class="col-sm-4">
<div class="card6">

<div class="form-group">
<label>Check In</label>
<input type="date" name="txt_checkin" class="form-control"  required="" maxlength="10" value="">
</div>


<div class="form-group">
<label>Check Out</label>
<input type="date" name="txt_checkout" class="form-control" maxlength="10" required="" value="" >
</div>

<div class="row">
<div class="col-sm-6">
<div class="form-group">
<label>Adult (s)</label>
<input type="text" name="txt_adult" class="form-control" required="" maxlength="3" onkeypress="return mask(this,event);" value="">
</div>
</div>

<div class="col-sm-6">
<div class="form-group">
<label>Child (s)</label>
<input type="text" name="txt_child" class="form-control" required="" maxlength="3" onkeypress="return mask(this,event);" value="">
</div>
</div>
</div>


<div class="form-group">
<label>Room (s)</label>
<select type="text" name="txt_rooms"  class="form-control" required="" value="">
<option value="Select" selected disabled>Select</option>
<?php
$stmt = $DB_con->prepare('SELECT * FROM roomsandprice  ORDER BY id ASC');
$stmt->execute();
if($stmt->rowCount() > 0)
{
while($res=$stmt->fetch(PDO::FETCH_ASSOC))
{
extract($res);
?> 
<option value="<?php echo $roomname;?>"><?php echo $roomname;?></option>
<?php
}
}

?> 
</select>
</div>


<div class="row">
<div class="col-sm-7">

<div class="form-group">
<label>Room (Type)</label>
<select type="text" name="txt_roomstype"  class="form-control" required="" value="">
<option value="Select" selected disabled>Select</option>
<?php
$stmt = $DB_con->prepare('SELECT * FROM roomsandprice  ORDER BY id ASC');
$stmt->execute();
if($stmt->rowCount() > 0)
{
while($res=$stmt->fetch(PDO::FETCH_ASSOC))
{
extract($res);
?> 
<option value="<?php echo $roomtype;?>"><?php echo $roomtype;?></option>
<?php
}
}

?> 

</select>
</div>
</div>

<div class="col-sm-5">
<div class="form-group">
<label>Room No.</label>
<input type="text" name="txt_roomnumber" class="form-control" required="" maxlength="3" onkeypress="return mask(this,event);" value="">
</div>
</div>
</div>


<div class="form-group">
<label>Room Rent.</label>
<select type="text" name="txt_roomrent"  class="form-control"  required="" value="">
<option value="Select" selected disabled>Select</option>
<?php
$stmt = $DB_con->prepare('SELECT * FROM roomsandprice  ORDER BY id DESC LIMIT 5 ');
$stmt->execute();
if($stmt->rowCount() > 0)
{
while($res=$stmt->fetch(PDO::FETCH_ASSOC))
{
extract($res);
?> 
<option value="<?php echo $roomprice;?>"><?php echo $roomdisplaytext;?></option>
<?php
}
}

?> 

</select>
</div>

</div>
</div>



<div class="col-sm-4">
<div class="card6">
<div class="form-group">
<label>Guest Name</label>
<input type="text" name="txt_name" class="form-control" maxlength="30" value="">
</div>

<div class="form-group">
<label>Email Id</label>
<input type="email" name="txt_email" class="form-control" maxlength="50" required="" value="">
</div>


<div class="form-group">
<label>Phone / Mobile</label>
<input type="text" name="txt_phone" class="form-control" maxlength="15" required="" onkeypress="return mask(this,event);" value="">
</div>

<div class="form-group">
<label>Special Requirment</label>
<textarea type="text" value="" name="txt_requirements" rows="5" maxlength="60" class="form-control" required=""></textarea >
</div>

</div>
</div>





<div class="col-sm-4">
<div class="card6">
<div class="form-group">
<label>Address</label>
<input type="text" name="txt_address" class="form-control" required="" value="">
</div>

<div class="form-group">
<label>City</label>
<input type="text" name="txt_city" class="form-control" required="" value="">
</div>


<div class="form-group">
<label>State</label>
<input type="text" name="txt_state" class="form-control" required="" value="">
</div>

<div class="form-group">
<label>Country</label>
<input type="text" name="txt_country" class="form-control" required="" value="">
</div>

<div class="form-group">
<label>Post Code</label>
<input type="text" name="txt_pincode" class="form-control" required="" maxlength="6" onkeypress="return mask(this,event);" value="">
</div>

</div>
</div>
</div>
<br/>


<div class="row">
<div class="col-sm-12">
<div class="card6">
<center>
<input type="submit" name="save" value="Submit" class="btn btn-success btn-lg"> 
<a href="roombooking.php" class="btn btn-danger btn-lg"> Cancel </a>
</center>
</div>
</div>
</form>

</div>
</div>
</div>

<?php require_once"include/admin-footer.php";?>