<?php

include 'connections/conn.php';
session_start();
// print_r($_POST);

$obj=new query;

if($_REQUEST['request']=="submit"){
	$p=$_REQUEST['p_data'];
	$table=table2;
	$where="p_id=".$p;
	$fetch=$obj->selectone($conn,$table,$where);
	$u_id=$fetch['u_id'];
	$b_id=$_SESSION['u_id'];
	$b_time=$_POST['day'];
	$b_desc=$_POST['desc'];

	date_default_timezone_set("Asia/Kolkata");
	

	 $d=date("Y-m-d");
 $date=date_create($d);
 $day=$b_time;
 
date_add($date,date_interval_create_from_date_string("$day days"));
 $b_time=date_format($date,"d-m-Y");


	$query="p_id='$p', u_id='$u_id', b_id='$b_id', b_time='$b_time', b_desc='$b_desc' , b_Date='$d'";
	$result=$obj->insertrow($conn,$query,table5);
	echo "<script>alert('Your request is successfully sent');</script>";

}






if($_REQUEST['submit']=="submit"){

$email=$_REQUEST['email'];
$name=$_REQUEST['name'];
$msg=$_REQUEST['msg'];
date_default_timezone_set("Asia/Calcutta");
$time=date('d F Y, h:i:s A');

	if($name!="" and $email!="" and $msg!=""){
		$query="name='$name' , email='$email' , message='$msg' , time='$time'";
		$result=$obj->insertrow($conn,$query,table4);

	 $msg="
<!DOCTYPE html>
<html>
<head>
	<title>email</title>
	<style>
		body{
			margin: 0;
		}
		header{
			padding: 10px;
			height: 80px;
			background-color: black;
			color: white;
			text-align: center;
		}
		middle{
			width: 100%;
			margin: auto;
		}
		.middle{
			width: 300px;
			margin: auto;
		}
		footer{
			background-color: black;
			color: white;
		}
		.footer{
			font-size: 120%;
			width: 300px;
			margin: auto;
			text-align: center;
		}
	</style>
</head>
<body>
	<div class=main>
		<header>
			<h1>Borrow Product</h1>
		</header>
		<middle>
			<div class=middle>
				<p>
					Dear ".$name.",<br/>
						Welcome on Borrow Product site.<br/>
<br/>
						we give best service for our customer.<br/>
						thank you for visit !!!<br/>
				</p>
			</div>
		</middle>
		<footer>
			<div class=footer>
				uddeshy2@gmail.com<br/>
				9571246473<br/>
			</div>
		</footer>
	</div>
</body>
</html>
		";

		if(main($to,$subject,$msg,$from)){
			echo "<script>alert(your Enquiry Sended!!!);</script>";
		}else{	
			echo "<script>alert(your Enquiry not Sended!!!);</script>";
		}
	}else{
		$result="Fill your email and message!!!";
	}
}
include("header.php");
?>
	<section id="section1">
		<!-- <h1 class="text-center ">Industrial Name</h1> -->
							<div id="myCarousel" class="carousel slide text-center" data-ride="carousel" data-interval="2000">
							  <!-- Indicators -->
							  <!-- <ol class="carousel-indicators">
							    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
							    <li data-target="#myCarousel" data-slide-to="1"></li>
							  </ol> -->

							  <!-- Wrapper for slides -->
							  <div class="carousel-inner">
							    <div class="item active" style="height: 500px;width: 100%;background-color: transparent;">
							    	<img src="images/banner2.jpg" class="img-responsive" height="1000" width="4000">
							    </div>
							    <div class="item" style="height: 500px;width: 100%;background-color: transparent;">
							    	<img src="images/banner.jpg" class="img-responsive" height="2000" width="4000">
							    </div>
							  </div>
							  <!-- Left and right controls -->
							  <!-- <a class="left carousel-control" href="#myCarousel" data-slide="prev">
							    <span class="glyphicon glyphicon-circle-arrow-left"></span>
							    <span class="sr-only">Previous</span>
							  </a>
							  <a class="right carousel-control" href="#myCarousel" data-slide="next">
							    <span class="glyphicon glyphicon-circle-arrow-right"></span>
							    <span class="sr-only">Next</span>
							  </a> -->
							</div>

	</section>
	
	<section class="height1" id="product">
	<br/>
			<br/>
	<br/>
			<br/>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1 class="text-center ">Browse All Items!<hr></h1>
				</div>
			</div>
			<br/>
			<br/>
			<br/>
			<br/>
			<div class="row">

				<!-- modal -->
				<!-- Button trigger modal -->
				<?php
				$where="p_status='0'";
				$exe=$obj->selectjoin($conn,table2,$where);
        	
        		while($fetch=mysqli_fetch_array($exe)){

				?>
					<div class="col-md-3 col-xs-6" style="height: auto;">
						<div class="back-bg">
							<img src="upload/product/<?php echo $fetch['p_img'];?>" class="img-thumbnail img-responsive imgs2">
							<h4>
								<?php echo $fetch['p_name'];?>
							</h4>
							<br>
							<br>
							<p><?php echo nl2br($fetch['p_desc']);?></p>
						</div>
							<a href="product.php?p_id=<?php echo $fetch['p_id'];?>" class="text-white">
								<button class="btn btn-primary">
									Preview
								</button>
							</a>
							<?php
								if($_SESSION['u_id']!=""){ 
							
									if($_SESSION['u_id']==$fetch['u_id']){
									}else{
							?>
							<button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#exampleModalCenter<?php echo $fetch['p_id'];?>">Borrow This!</button>
							<?php
							}
							?>
							<!-- Modal -->
							<div class="modal fade" id="exampleModalCenter<?php echo $fetch['p_id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
							  <div class="modal-dialog modal-dialog-centered" role="document">
							    <div class="modal-content">
							    	<form method="POST">
							      <div class="modal-header">
							        <h5 class="modal-title h3" id="exampleModalLongTitle">Request</h5>
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true">&times;</span>
							        </button>
							      </div>
							      <div class="modal-body">
							      		<div class="text-justify">
							      			Do you want send request to borrow <?php echo $fetch['p_name'];?> product?
							      			<input type="hidden" name="p_data" value="<?php echo $fetch['p_id'];?>">
							      			<br/>
							      			Select Time for Borrow Product</br>
							      			<select name="day" required="required" class="form-control">
						      						<option>Select Day</option>
							      				<?php
							      					for($i=1;$i<=7;$i++){
							      				?>
							      						<option><?php echo $i;?></option>
							      				<?php
							      					}
							      				?>
							      			</select>
							      			<br/>
							      			Enter Description
							      			<textarea name="desc" class="form-control" placeholder="Enter Description" required="required"></textarea>
							      		</div>
							      		
							      </div>
							      <div class="modal-footer">
							        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
							        <button type="submit" class="btn btn-success" name="request" value="submit">Send</button>
							      </div>
							        </form>
							    </div>
							  </div>
							</div>



							<?php
							}else{ 
								?>

							<a href="login.php" class="text-white">
								<button class="btn btn-primary pull-right">
									Login
								</button>
							</a>
								<?php
							}
							?>
					</div>
				<?php
				}
				?>
				
			</div>
		</div>
	</section>
	<section class="height1 container" id="about">
		<br>
		<br>
		<br>
		<br>
		<h1 class="text-center ">About Us</h1>
		<br>
		<br>
		<br>
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="row">
					<div class="col-md-4">
						<p class=" text-justify h4 slideRight">
							“Sharing with friends” is an application which gives the facility of borrowing any type of things. This application is made so that the customer will come and borrow the things which is not useful for other but may be useful to himself/herself. The purpose is to implement the application using which one can perform as admin as well as a user. This will help the person to interact directly with the borrower. 
						</p>
					</div>
					<div class="col-md-8">
						<img src="images/11.png" class="img-thumbnail slideLeft" style="height:400px;width: 600px;font-family: 'Poppins';">
					</div>
				</div>
			</div>
		</div>
		<br>
			<br/>
			<br/>
		<br>
		<br>
	</section>
	<!-- <section id="category">
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1 class="text-center ">Category<hr></h1>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-3" style="height: 300px;">
					<a href="#">
					<div class="back-bg col-md-12">
						<div class="para">
							<h3>Product name</h3>
							<h4>Product Price</h4>
							<p>dolor in reprehenderit in voluptate velit esse
							cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
							proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
						</div>
						<img src="images/11.jpg" style="" class="img-thumbnail img-responsive imgs2">
					</div>
					</a>
				</div>
				<div class="col-md-3" style="height: 300px;">
					<a href="#">
					<div class="back-bg col-md-12">
						<div class="para">
							<h3>Product name</h3>
							<h4>Product Price</h4>
							<p>dolor in reprehenderit in voluptate velit esse
							cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
							proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
						</div>
						<img src="images/11.jpg" style="" class="img-thumbnail img-responsive imgs2">
					</div>
					</a>
				</div>
				<div class="col-md-3" style="height: 300px;">
					<a href="#">
					<div class="back-bg col-md-12">
						<div class="para">
							<h3>Product name</h3>
							<h4>Product Price</h4>
							<p>dolor in reprehenderit in voluptate velit esse
							cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
							proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
						</div>
						<img src="images/11.jpg" style="" class="img-thumbnail img-responsive imgs2">
					</div>
					</a>
				</div>
				<div class="col-md-3" style="height: 300px;">
					<a href="#">
					<div class="back-bg col-md-12">
						<div class="para">
							<h3>Product name</h3>
							<h4>Product Price</h4>
							<p>dolor in reprehenderit in voluptate velit esse
							cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
							proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
						</div>
						<img src="images/11.jpg" style="" class="img-thumbnail img-responsive imgs2">
					</div>
					</a>
				</div>
			</div>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
		</div>
	</section> -->
	<section id="contact">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1 class="text-center ">We're Here For You!</h1>
				</div>
			</div>
			<br>
			<br>
			<div class="row">
				<div class="col-md-4">
					<h2 class=" text-center">Enquiry</h2>
					<form data-toggle="validator" method="post" role="form" id="signupForm">
						  <h3><?php echo $result;?></h3>
						  <div class="form-group">
						    <label for="inputName" class="control-label ">Name</label>
						    <input type="text" class="form-control" name="name" id="inputName" placeholder="Name" required>
						  </div>
						  <div class="form-group">
						    <label for="inputEmail" class="control-label ">Email</label>
						    <input type="email" class="form-control" name="email" id="inputEmail" placeholder="Email" data-error="Bruh, that email address is invalid" required>
						    <div class="help-block with-errors text-danger"></div>
						  </div>
						  <div class="form-group">
						    <label for="inputEmail" class="control-label ">Message</label>
						    <textarea class="form-control" id="inputEmail" name="msg" placeholder="Write text here..." data-error="Bruh, that email address is invalid" required rows="5"></textarea>
						    <div class="help-block with-errors text-danger"></div>
						  </div>
						  <div class="form-group">
						    <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
						  </div>
					</form>
				</div>
				<div class="col-md-6 col-md-offset-2">
							<h2 class="text-center">Location</h2>
						<br>
						<br>
						<div  class="row">
								<!-- <img src="images/3.png" class="img-responsive"> -->
								<table class="table table-resposive table-bordered" align="center">
									<tr>
										<th>Address </th>
										<td><a href=" http://maps.google.com/?q=154, 2nd C Road Sardarpura,Jodhpur">154, 2nd C Road Sardarpura,Jodhpur</a></td>
									</tr>
									<tr>
										<th>Email </th>
										<td><a href="mailto:uddeshy2@gmail.com">uddeshy2@gmail.com</a></td>
									</tr>
									<tr>
										<th>Contact </th>
										<td><a href="tel:9571246473">9571246473</a></td>
									</tr>
								</table>
						</div>
				</div>
			</div>
		</div>
	</section>
</div>


<?php
include("footer.php");
?>
