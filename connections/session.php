<?php
session_start();
if($_SESSION['u_id']==""){
	header("location:index.php");
}

?>