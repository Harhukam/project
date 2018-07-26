<?php 
session_start();// Starting Session
$ucheck = $_SESSION['login_user'];

$stmt = $DB_con->prepare('SELECT * FROM table_login WHERE username=:uname');
$stmt->execute(array(':uname'=>$ucheck));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

$login_session =$row['username'];
if(!isset($login_session)){

if(isset($_SESSION['username']))
unset($_SESSION['username']);
header('refresh:1; login.php');
}
?>