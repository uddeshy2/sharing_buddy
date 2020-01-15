<?php
session_start();
require 'conn.php';
if (isset($_SESSION['id'])) {
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<form method="POST" action="">
		<h1 align="center">All The Current Users!</h1>
		<table border="">
			<tr>
			<th>User Name:</th>
			<th>User Phone Number:</th>
			<th>User Email:</th>
			<th>User Address:</th>
			<th>DELETE:</th>
		</tr>
	
			<?php
			$sql="SELECT * FROM `user_data`";
			$result=mysqli_query($db,$sql);
			while ($data=mysqli_fetch_array($result)) { ?>
				<tr>
				<td>
					<?php echo $data['u_name'];?>
				</td>
				<td> <?php echo $data['u_phone'];?></td>
				<td><?php echo $data['u_email']; ?></td>
				<td><?php echo $data['u_address'];?></td>
				<td><a href="delete.php?id=<?php echo $data['u_id'];?>">delete</a></td>
			</tr>
			<?php } ?>
		
		</table>
		
	</form>
	<form action="logout.php" method="POST">
		<center><button type="submit" name="logout">Logout</button></center>
	</form>

</body>
</html>




<?php } ?>