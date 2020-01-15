<?php

include 'connections/conn.php';

$obj=new query;
// $name=$_REQUEST['name'];
// $email=$_REQUEST['email'];
// $msg=$_REQUEST['msg'];
// date_default_timezone_set("Asia/Calcutta");
// $time=date('d F Y, h:i:s A');

$where="p_id='".$_REQUEST['p_id']."'";

$fetch=$obj->selectone($conn,table2,$where);
// print_r($fetch);
include("header.php");
?>
	<section class="height1 container" id="about">
		
		<br>
		<br>
		<br>
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="row">
					<div class="col-md-8">
						<p class=" text-justify h4 slideRight">
							<label>Item Description:</label><?php echo nl2br($fetch['p_desc']);?>
						</p>
						<p class=" text-justify h4 slideRight">
							<label>Owned By:<?php $uid=$fetch['u_id'];
							$where2="u_id=$uid";
							$fetchU=$obj->selectone($conn,table1,$where2);
							echo $fetchU['u_name'];
							 ?></label>
						</p>
						
					</div>
					<div class="col-md-4">
						<h1 class="text-right">
							<label>Item Name:</label><?php echo $fetch['p_name'];?>
						</h1>
						<img 
							src="upload/product/<?php echo $fetch['p_img'];?>" 
							class="img-thumbnail slideLeft" 
							style="height:400px;width: 100%;font-family: 'Poppins';"
						/>

						<br>
						<div class="col-md-12"> 
						<?php
								if($_SESSION['u_id']!=""){ 
									if($_SESSION['u_id']==$fetch['u_id']){
									}else{
							?>
							
							<button class="btn btn-primary pull-left">Borrow This!</button>
							<?php
						}
							}else{ 
								?>

							<a href="login.php" class="text-white">
								<button class="btn btn-primary pull-left">
									Login
								</button>
							</a>
								<?php
							}
							?>

						<a href="index.php">
							<button class="btn btn-danger pull-right text-white">Exit	</button>
						</a>
					</div>
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


<?php
include("footer.php");
?>
