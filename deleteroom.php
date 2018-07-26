<?php 
require_once 'db_config.php';
include('session.php');
error_reporting( ~E_NOTICE );


if(isset($_GET['deleteid']))
{
$id = $_GET['deleteid'];
$stmt = $DB_con->prepare('DELETE FROM roomsandprice WHERE id =:bid');
$stmt->execute(array(':bid'=>$id));
header('refresh:1; addrooms.php');
}
?>

<?php require_once"include/admin-header.php";?>
<div style="padding-top:30px;"></div>

<div class="container">
<div class="card5">

<div class="card6">
<div class="row">

<div class="col-sm-3">
</div>

<?php require_once"include/admin-footer.php";?>




<div class="col-sm-6">
	
<div class="card5">
	<div class="well well-info">
		Record Delete Sucessfully.
	</div>
</div>
</div>

<div class="col-sm-3">
</div>



</div>
</div>
</div>

<?php require_once"include/admin-footer.php";?>