<?php
include 'connections/conn.php';

$obj=new query;

$file=$_FILES['file'];

		$img=$file['name'];
		$img_tpath=$file['tmp_name'];

		$name=$_REQUEST['name'];
		$email=$_REQUEST['email'];
		$fpass=$_REQUEST['fpassword'];
		$lpass=$_REQUEST['lpassword'];
		$address=$_REQUEST['address'];
		$phone=$_REQUEST['phone'];
		$tc=$_REQUEST['tc'];

		if($fpass==$lpass){
			if($tc=="1"){
				
				$where="u_email='$email'";
				$tot=$obj->rowcount($conn,table1,$where);
					
					if($tot==0){
						$query="u_name='$name' , u_phone='$phone' , u_password='$lpass' , u_email='$email' , u_profile='$img' , u_address='$address'";
				 		$result=$obj->insertrow($conn,$query,table1);
						header("location:index.php?status=login");

						$path="upload/user_profiles/".$img;

						move_uploaded_file($img_tpath,$path);
					}else{

						$result="	<span class=''>
										<h3>Email already exist!!!</h3>
									</span>";
					}
			}
		}else{
			$result="	<span class=''>
							<h3>Password not match</h3>
						</span>";
		}


include("header.php");

?>

<section class="container">
	<div class="row">	
	<div class="col-md-6 col-xs-6 hidden-xs hidden-sm">
		<img src="images/logo.png" class="img-responsive"> 
	</div>
<!-- Form -->
	<div class="col-md-6 col-xs-12">
		<?php echo $result;?>
		<h2>Register</h2>
		<form data-toggle="validator" role="form" id="signupForm" method="post" enctype="multipart/form-data">
			<input type="hidden" name="type" value="Register">
			<input type="hidden" name="work" value="insert">
			<div class="form-group">
						<input type="file" name="file" id="profile-img" class="hide">
						<img src="" id="profile-img-tag" width="200px" height="200" />
				</div>
			  <div class="form-group ">
			    <label for="inputName" class="control-label ">Name</label>
			    <input type="text" class="form-control" id="inputName" name="name" placeholder="Name" required>
			  </div>
			  <div class="form-group ">
			    <label for="inputEmail" class="control-label ">Email</label>
			    <input type="email" class="form-control" name="email" id="inputEmail" placeholder="Email" data-error="Bruh, that email address is invalid" required>
			    <div class="help-block with-errors "></div>
			  </div>
			  <div class="form-group ">
			    <label for="inputEmail" class="control-label ">Phone</label>
			    <input type="text" class="form-control" name="phone" data-minlength="10" placeholder="Phone" required>
			    <div class="help-block with-errors "></div>
			  </div>
			  <div class="form-group ">
			    <label for="inputPassword" class="control-label ">Password</label>
			    <div class="form-inline row">
			      <div class="form-group col-sm-6 ">
			        <input type="password" data-minlength="6" class="form-control" id="inputPassword" name="fpassword" placeholder="Password" required>
			        <div class="help-block ">Minimum of 6 characters</div>
			      </div>
			      <div class="form-group col-sm-6 ">
			        <input type="password" class="form-control" id="inputPasswordConfirm" data-match="#inputPassword" name="lpassword" data-match-error="Whoops, these don't match" placeholder="Confirm" required>
			        <div class="help-block with-errors "></div>
			      </div>
			    </div>
			  </div>
		<div class="form-group ">
		    <label for="inputPassword" class="control-label tes">Address</label>
	      	 	<textarea class="form-control" name="address" placeholder="Address" required></textarea>
	  	</div>
			  <div class="form-group ">
			    <div class="checkbox">
			      <label>
			        <input type="checkbox" id="terms" name="tc" value="1" data-error="Before you wreck yourself" required>
			         accept all terms & condition
			      </label>
			      <div class="help-block with-errors"></div>
			    </div>
			  </div>
			  <div class="row">
				  <div class="form-group col-md-6 col-xs-6">
				    <button type="submit" class="btn btn-primary">Submit</button>
				  </div>
			  </div>
		</form>
	</div>
	</div>
	</section>
	
<?php
include("footer.php");
?>