<?php
	

include 'connections/conn.php';

$obj=new query;


		$email=$_REQUEST['email'];
		$password=$_REQUEST['password'];
		echo $tc=$_REQUEST['rem'];

if($email!=""){				
				$where="u_email='$email' and u_password='$password'";
				$tot=$obj->rowcount($conn,table1,$where);
				$fetch=$obj->selectone($conn,table1,$where);

					if($tot==1){
						$_SESSION['u_id']=$fetch['u_id'];
						header("location:index.php");
					}else{

						$result="	<span class='text-danger'>
										<h3>Wrong Email & Password</h3>
									</span>";
					}
			if($tc=="1"){
				setcookie("email",$email,time()+60);
				setcookie("password",$password,time()+60);

			}
		
}
include("header.php");
?>

<section class="container">
		<br>
		<br>
		<br>
<div class="row ">
	<div class="col-md-6 col-xs-6">
		<img src="images/logo.png" class="img-responsive"> 
	</div>
<div class="col-md-6 col-xs-6 ">
	<?php echo $result;?>
		<form data-toggle="validator" role="form" id="signupForm" method="post" enctype="multipart/form-data">
			<input type="hidden" name="type" value="Login">
			<input type="hidden" name="work" value="insert">
		<h2 class="">Login</h2>
		
			    <label for="inputEmail" class="control-label ">Email</label>
			  <div class="form-group text-danger">
			    <input type="email" class="form-control" name="email" id="inputEmail" placeholder="Email" data-error="Bruh, that email address is invalid" value="<?php echo $_COOKIE['email']?>">
			    <div class="help-block with-errors text-danger"></div>
			  </div>

			    <label for="inputPassword" class="control-label ">Password</label>
			  <div class="form-group text-danger">
			        <input type="password" data-minlength="6" class="form-control" id="inputPassword" name="password" placeholder="Password" required value="<?php echo $_COOKIE['password']?>">
			        <div class="help-block text-danger">Minimum of 6 characters</div>
			  </div>
			  <div class="form-group text-black">
			    <div class="checkbox">
			      <label>
			        <input type="checkbox" name="rem" value="1" id="terms" data-error="Before you wreck yourself">
			         Remember
			      </label>
			      <div class="help-block with-errors"></div>
			    </div>
			  </div>
			  <div class="row">
				  <div class="form-group col-md-6 col-xs-6">
				    <button type="submit" class="btn btn-primary">Submit</button>
				  </div>
				  <div class="form-group col-md-6 col-xs-6">
				    <a href="signup.php"><button type="button" class="btn btn-danger pull-right">Register</button></a>
				  </div>
			  </div>
			</form>
		</div>
	</section>
	
<?php
include("footer.php");
?>
