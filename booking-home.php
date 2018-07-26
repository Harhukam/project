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
<th colspan="12" style="text-align:center">Impressive Hotel Booking Detail(s)</th>
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
<th>Edit</th>
<th>Delete</th>
<th>Checkout</th>
</tr>

<tr>
<?php
//$stmt = $DB_con->prepare('SELECT * FROM roombooking WHERE status="Active" ORDER BY id DESC LIMIT 10 ');
$stmt = $DB_con->prepare('SELECT * FROM roombooking  ORDER BY id DESC LIMIT 10 ');
$stmt->execute();
if($stmt->rowCount() > 0)
{
while($res=$stmt->fetch(PDO::FETCH_ASSOC))
{
extract($res);
?> 


<td><?php echo $adharid;?></td>

<td><?php echo $name;?></td>
<td><?php echo $checkin;?></td>
<td><?php echo $checkout;?></td>
<td><?php echo $adult;?></td>
<td><?php echo $child;?></td>
<td><?php echo $rooms;?></td>
<td><?php echo $roomtype;?></td>
<td><?php echo $roomnumber;?></td>
<td><a href="updateroombooking.php?editid=<?php echo $id;?>" class="btn btn-success btn-xs"> Edit</a></td>
<td><a href="deleterecord.php?deleteid=<?php echo $id;?>" class="btn btn-danger btn-xs"> Delete</a></td>
<td><a href="checkout.php?checkoutid=<?php echo $id;?>" class="btn btn-theme btn-xs">Checkout</a></td>
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

