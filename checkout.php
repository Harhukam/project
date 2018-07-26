<?php 
require_once 'db_config.php';
include('session.php');
error_reporting( ~E_NOTICE );

if(isset($_GET['checkoutid']) && !empty($_GET['checkoutid'])) 
{
$id = $_GET['checkoutid'];
$stmt = $DB_con->prepare('SELECT * FROM roombooking WHERE id =:pid');
$stmt->execute(array(':pid'=>$id));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
extract($row);
}
else{
header('Location: booking-home.php');
}
?>

<?php require_once"include/admin-header.php";?>
<div style="padding-top:30px;"></div>
<div class="container ">
<div class="row card5">



<div class="col-sm-8">
<div class="card6">
<div class="card5">


<div class="row">
<div class="col-sm-12">

<table class="table table-bordered">
<thead style="text-align:center">
<tr >
<th colspan="3" style="text-align:center; font-weight: bold;"> <h4>Impressive Hotel Checkout</h4></th>
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
<td>Address :</td>
<td><?php echo $address." ".$pincode." ".$city." ".$state." ".$country ; ?></td>
</tr>

<tr>
<td>Adoult (s) :</td>
<td><?php echo $adult; ?></td>
</tr>

<tr>
<td>Child (s) :</td>
<td><?php echo $child; ?></td>
</tr>

<tr>
<td>Room (s) :</td>
<td><?php echo $rooms; ?></td>
</tr>


<tr>
<td>Room (type) :</td>
<td><?php echo $roomtype ; ?></td>
</tr>

<tr>
<td>Check-In : </td>
<td><?php echo $checkin ; ?></td>
</tr>

<tr>
<td>Check-Out:</td>
<td><?php echo $checkout; ?></td>
</tr>

<tr>
<td>Room Rent Per Day :</td>
<td><?php echo $roomrent ; ?>   (x 2 if room Double)</td>
</tr>

<tr>
<td>Total Days :</td>
<td><?php echo $totaldays ; ?></td>
</tr>


<tr>
<td>Total Payable Ammount :</td>
<td style="color:green; font-weight:900 bold"><b> <?php echo $roomtotalammount ; ?> </b></td>
</tr>

</tbody>
</table>

<a href="offlinepayment.php?payid=<?php echo $id;?>" name="offline" class="btn btn-theme">Pay Now via Cash </a>
<a href="onlinepayment.php?payid=<?php echo $id;?>" name="online" class="btn btn-success">Pay Now Online</a>

</div></div>

</div>
</div>

</div>

</div>
</div>

<?php require_once"include/admin-footer.php";?>