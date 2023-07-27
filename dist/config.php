<?php
session_start();
date_default_timezone_set("Asia/Calcutta");

$servername='localhost';
$username='local_senthil_agency';
$password='Lane@123#';
$database='local_senthil_agency';

$conn=mysqli_connect($servername,$username,$password,$database)or die("connection failed");
?>