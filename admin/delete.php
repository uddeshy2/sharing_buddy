<?php
$id=$_GET['id'];
$sql="DELETE FROM `user_data` WHERE u_id=$id";
mysqli_execute($db,$sql);
header("location: index.php");

?>