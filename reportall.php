<?php 
require_once 'db_config.php';
include('session.php');
error_reporting( ~E_NOTICE );
?>
<?php require_once"include/admin-header.php";?>

<div style="padding-top:30px;"></div>
<div class="container">
<div class="row">

<div class="col-sm-12">
<div class="card5">

<table class="table table-bordered">
<thead style="text-align:center">
<tr >
<th colspan="12" style="text-align:center">Impressive Hotel All Record (s) Report</th>
</tr>
</thead>
<tbody>
<tr>
<th>Guest ID</th>
<th>Guest Name</th>
<th>Check-in</th>
<th>Check-Out</th>
<th>Adout(s)</th>
<th>Child(s)</th>
<th>Room(s)</th>
<th>Room Type</th>
<th>Room Number</th>
<th>Total Ammount Pay</th>
<th>Payment Status</th>
<th>Pay Date</th>

</tr>

<tr>
<?php
//$stmt = $DB_con->prepare('SELECT * FROM roombooking WHERE status="Active" ORDER BY id DESC LIMIT 10 ');
$stmt = $DB_con->prepare('SELECT * FROM payment  ORDER BY id DESC LIMIT 10 ');
$stmt->execute();
if($stmt->rowCount() > 0)
{
while($res=$stmt->fetch(PDO::FETCH_ASSOC))
{
extract($res);
?> 


<td><?php echo $userid;?></td>
<td><?php echo $roomusernamepay;?></td>
<td><?php echo $checkinpay;?></td>
<td><?php echo $checkoutpay;?></td>
<td><?php echo $adultpay;?></td>
<td><?php echo $childpay;?></td>
<td><?php echo $roompay;?></td>
<td><?php echo $roomtypepay;?></td>
<td><?php echo $roomnumberpay;?></td>
<td><?php echo $roomtotalpay;?></td>
<td><?php echo $roomstatuspay;?></td>
<td><?php echo $payment_date;?></td>
</tr>

<?php
}
}
else
{
?>
<div class="well">
No record found
</div>
<?php
}
?> 




</tbody>
</table>

</div>

</div>
</div>
</div>
<?php require_once"include/admin-footer.php";?>

