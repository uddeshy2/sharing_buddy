<?php
error_reporting(0);
session_start();
include_once("define.php");

$conn=mysqli_connect(server,username,password,database) or die("please Check Connection");

include_once("query.php");
?>