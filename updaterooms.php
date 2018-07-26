<?php 
require_once 'db_config.php';
include('session.php');
error_reporting( ~E_NOTICE );


if(isset($_GET['editid']) && !empty($_GET['editid'])) 
{
$uid = $_GET['editid'];
$stmt = $DB_con->prepare('SELECT * FROM roomsandprice WHERE id =:pid');
$stmt->execute(array(':pid'=>$uid));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
extract($row);
}

else{
header('Location: addrooms.php');
}






if(isset($_POST['update']))
{

$rname = $_POST['txt_urn'];
$rtype = $_POST['txt_urt'];
$rprice = $_POST['txt_urp'];
$rdisplaytext = $_POST['txt_urdt'];

if(!isset($errMSG))
{
$stmt = $DB_con->prepare('UPDATE roomsandprice SET roomname=:a1,roomtype=:a2,roomprice=:a3,roomdisplaytext=:a4
WHERE id=:did');
$stmt->bindParam(':a1',$rname);
$stmt->bindParam(':a2',$rtype);
$stmt->bindParam(':a3',$rprice);
$stmt->bindParam(':a4',$rdisplaytext);
$stmt->bindParam(':did',$uid);
if($stmt->execute())
{
$successMSG = "update Successfully";
header('refresh:1;  addrooms.php');
}
else
{
$errMSG = "error something wrong ! please try later...";
}
}}


?>

<?php require_once"include/admin-header.php";?>
<div style="padding-top:30px;"></div>

<div class="container">
<div class="card5">

<div class="card6">
<div class="row">

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
	
<div class="card5">
	<h3>Update Room Data </h3>
	<hr>
	<form method="post" enctype="multipart/form-data">
<div class="form-group">
<label>Room (name) </label>
<input type="text" name="txt_urn" class="form-control" required="" value="<?php echo $roomname;?>">
</div>

<div class="form-group">
<label>Room Type</label>
<input type="text" name="txt_urt" class="form-control"  value="<?php echo $roomtype;?>">
</div>


<div class="form-group">
<label>Set Room Price Rs.</label>
<input type="text" name="txt_urp" class="form-control"  value="<?php echo $roomprice;?>">
</div>



<div class="form-group">
<label>Room display text</label>
<input type="text" name="txt_urdt" class="form-control"  value="<?php echo $roomdisplaytext;?>">
</div>

<hr>
<center>
<input type="submit" name="update" value="Update" class="btn btn-success"> 
</center>
</form>
</div>
</div>
</div>





</div>
</div>
</div>

<?php require_once"include/admin-footer.php";?>