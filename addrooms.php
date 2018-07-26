<?php 
require_once 'db_config.php';
include('session.php');
error_reporting( ~E_NOTICE );

if(isset($_POST['save']))
{

$rname = $_POST['txt_rn'];
$rtype = $_POST['txt_rt'];
$rprice = $_POST['txt_rp'];
$rdisplaytext = $_POST['txt_rdt'];

if(!isset($errMSG))
{
$stmt = $DB_con->prepare('INSERT INTO roomsandprice(roomname,roomtype,roomprice,roomdisplaytext) VALUES(:a1,:a2,:a3,:a4)');
$stmt->bindParam(':a1',$rname);
$stmt->bindParam(':a2',$rtype);
$stmt->bindParam(':a3',$rprice);
$stmt->bindParam(':a4',$rdisplaytext);
if($stmt->execute())
{
$successMSG = "Data Successfully Saved";
header('refresh:1; addrooms.php');
}
else
{
$errMSG = "error something wrong ! please try later...";
}
}
} 



?>

<?php require_once"include/admin-header.php";?>
<div style="padding-top:30px;"></div>

<div class="container">
<div class="card5">

<div class="card6">
<div class="row">
<div class="col-sm-5">
<form method="post" enctype="multipart/form-data">
<div class="card5">
	<h3>Add New Room </h3>
	<hr>
<div class="form-group">
<label>Room (name) </label>
<input type="text" name="txt_rn" class="form-control" required="" value="">
</div>

<div class="form-group">
<label>Room Type</label>
<input type="text" name="txt_rt" class="form-control"  value="">
</div>


<div class="form-group">
<label>Set Room Price Rs.</label>
<input type="text" name="txt_rp" class="form-control"  value="" onkeypress="return mask(this,event);">
</div>



<div class="form-group">
<label>Room display text</label>
<input type="text" name="txt_rdt" class="form-control"  value="" >
</div>

<hr>
<center>
<input type="submit" name="save" value="Submit" class="btn btn-success"> 
</center>
</form>
</div>
</div>



<div class="col-sm-7">
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

	<h3>Available Room List & Price</h3>
	<hr>
<form>
	<table class="table table-bordered">
<thead style="text-align:center">
<tr >
<th colspan="12" style="text-align:center">Impressive Hotel Rooms Detail(s)</th>
</tr>
</thead>
<tbody>
<tr>
<th>Room(s)</th>
<th>Roon type</th>
<th>Room Price</th>
<th>Edit</th>
<th>Delete</th>
</tr>

<tr>
<?php
$stmt = $DB_con->prepare('SELECT * FROM roomsandprice  ORDER BY id DESC LIMIT 5 ');
$stmt->execute();
if($stmt->rowCount() > 0)
{
while($res=$stmt->fetch(PDO::FETCH_ASSOC))
{
extract($res);
?> 


<td><?php echo $roomname;?></td>
<td><?php echo $roomtype;?></td>
<td><?php echo $roomprice;?></td>
<td><a href="updaterooms.php?editid=<?php echo $id;?>" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-edit"></span> Edit</a></td>
<td><a href="deleteroom.php?deleteid=<?php echo $id;?>" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"> Delete</a></td>

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
</form>
</div>
</div>

</div>
</div>

</div>
</div>

<?php require_once"include/admin-footer.php";?>