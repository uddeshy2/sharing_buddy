<?php require 'conn.php'?>

<!DOCTYPE html>
<html>
<head>
	<title>admin login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="form">
<form action="" method="POST">
	<h1>login for admin:</h1>
	<input type="Email" name="Email" placeholder="Enter Email..">
	<input type="password" name="pass" placeholder="Enter Password..">
	<button type="submit" name="login">login</button>
</form>
</div>
<?php
	if(isset($_POST['login'])){
		$email=$_POST['Email'];
		$pass=$_POST['pass'];

		if(empty($email) || empty($pass)){
			header("location: admin.php?error=empty");
			exit();
		}
	 else{
			$sql="SELECT *FROM `admin_data` WHERE email=? AND pass=?";
			$stmt=mysqli_stmt_init($db);
			if(!mysqli_stmt_prepare($stmt,$sql)){
				header("location: admin.php?error=sql");
			}
			else{
				mysqli_stmt_bind_param($stmt,'ss',$email,$pass);
				mysqli_stmt_execute($stmt);
				$result=mysqli_stmt_get_result($stmt);
				$row=mysqli_fetch_assoc($result);
				if($pass==$row['pass']){
					session_start();
					$_SESSION['user']=$row['uname'];
					$_SESSION['id']=$row['a_id'];
					header("location: index.php?login=success");
					exit();
				}
				else{
					header("location: index.php?error=invalidPass");
					exit();
				}

				}
			}
		}

	


	?>
</body>
</html>