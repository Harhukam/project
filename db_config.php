<?php


 $DB_HOST = 'localhost';
 $DB_USER = 'mywezvus_project';
 $DB_PASS = 'Tata#123';
 $DB_NAME = 'mywezvus_project';

try{
$DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}",$DB_USER,$DB_PASS);
$DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
echo $e->getMessage();
}

?>