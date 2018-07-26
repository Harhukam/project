<?php 
require_once 'db_config.php';
include('session.php');
error_reporting( ~E_NOTICE );


if(isset($_POST['search']))
{
$from_date = $_POST['txt_from'];
$to_date = $_POST['txt_to'];

if(!isset($errMSG))
{
$stmt = $DB_con->prepare('SELECT * FROM payment WHERE userid= :fromd');
$stmt->execute(array(':fromd'=>$from_date));

if($stmt)
{

if($stmt->rowCount()>0)

{
$successMSG = "Sucessfully find these record (s)";

foreach($stmt as $row)
{

$abc = $row['name'];
//$sum = $row['sum'];

}

}
// if the id not exist
else
{
$errMSG = "record not found";
}

}


}
} 

?>
<?php require_once"include/admin-header.php";?>
<div style="padding-top:30px;"> </div>
<div class="container">
<div class="card5">

<div class="card6">
<div class="row">


<form method="post" >

<div class="col-sm-4">
<div class="form-group">
<label>From</label>
<input type="text" name="txt_from" class="form-control"  required="" maxlength="12">
</div> </div> 




<div class="col-sm-4">
<div style="height: 28px !important;"></div>
<input type="submit" name="search" value="Search" class="btn btn-danger">
</form>
</div> 

</div> </div> </div>


<div class="row">

<div class="col-sm-12">
<div class="card6">
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
<th>Total Pay</th>
<th>Status Payment Via</th>
<th>Pay Date</th>
</tr>

<tr>
<td><?php echo $row['userid'];?></td>
<td><?php echo $row['roomusernamepay'];?></td>
<td><?php echo $row['checkinpay'];?></td>
<td><?php echo $row['checkoutpay'];?></td>
<td><?php echo $row['adultpay'];?></td>
<td><?php echo $row['childpay'];?></td>
<td><?php echo $row['roompay'];?></td>
<td><?php echo $row['roomtypepay'];?></td>
<td><?php echo $row['roompricepay'];?></td>
<td><?php echo $row['roomtotalpay'];?></td>
<td><?php echo $row['roomstatuspay'];?></td>
<td><?php echo $row['payment_date'];?></td>
</tr>

</tbody>
</table>
</div>

</div>
</div>


</div>
</div>
</div>
<?php require_once"include/admin-footer.php";?>