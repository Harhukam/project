<?php
require_once 'db_config.php';
include('session.php');
session_destroy();
header('Location: login.php');
?>