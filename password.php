<?php
	

include 'connections/conn.php';

$obj=new query;

		$opassword=$_REQUEST['opassword'];
		$npassword=$_REQUEST['npassword'];

if($opassword!="" and $npassword!=""){	

				$where="u_password='$opassword' and u_id='".$_SESSION['u_id']."'";
				$tot=$obj->rowcount($conn,table1,$where);
				$fetch=$obj->selectone($conn,table1,$where);

					if($tot==1){
						$query="u_password='$npassword'";
						$result=$obj->updaterow($conn,table1,$query,$where);
					}else{

						$result="	<span class='text-danger'>
										<h3>Wrong Old Password</h3>
									</span>";
					}
		
}
include("header.php");
?>

<section class="container">
		<br>
		<br>
		<br>
<div class="row text-white">
	<div class="col-md-6 col-xs-6">
		<img src="images/logo.png" class="img-responsive"> 
	</div>
<div class="col-md-6 col-xs-6 ">
	<span><h3 style="color: black;"><?php echo $result;?></h3></span>
		<form data-toggle="validator" role="form" id="signupForm" method="post" enctype="multipart/form-data">
			<input type="hidden" name="type" value="Login">
			<input type="hidden" name="work" value="insert">
		<h2 class="text-black">Change Password</h2>

			    <label for="inputPassword" class="control-label text-black">Old Password</label>
			  <div class="form-group text-danger">
			        <input type="password" data-minlength="6" class="form-control" id="inputPassword" name="opassword" placeholder="Enter old password" required value="<?php echo $_COOKIE['password']?>">
			  </div>		

			    <label for="inputPassword" class="control-label text-black">New Password</label>
			  <div class="form-group text-danger">
			        <input type="password" data-minlength="6" class="form-control" id="inputPassword" name="npassword" placeholder="Enter new password" required value="<?php echo $_COOKIE['password']?>">
			        <div class="help-block text-danger">Minimum of 6 characters</div>
			  </div>
			  <div class="row">
				  <div class="form-group col-md-6 col-xs-6">
				    <button type="submit" class="btn btn-primary">Submit</button>
				  </div>
			  </div>
			</form>
		</div>
	</section>
	
<?php
include("footer.php");
?>
