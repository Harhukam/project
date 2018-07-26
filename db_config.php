<?php


 $DB_HOST = 'localhost';
 $DB_USER = 'db_username';
 $DB_PASS = 'db_pass';
 $DB_NAME = 'db_name';

try{
$DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}",$DB_USER,$DB_PASS);
$DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
echo $e->getMessage();
}

?>
