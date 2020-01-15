<?php
session_start();
session_unset();
session_destroy();
header("locaiton: admin.php?logout=success");
?>