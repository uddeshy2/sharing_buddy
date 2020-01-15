<?php 
include("connections/session.php");
include 'connections/conn.php';
$obj=new query;

// p_id	p_name	p_desc	p_img	p_qty	u_id	p_status
// image array
		$file=$_FILES['p_img'];
		$img=$file['name'];
		$img_tpath=$file['tmp_name'];
// data of form
		$p_name=$_REQUEST['p_name'];
		$p_desc=$_REQUEST['p_desc'];
		$p_qty=$_REQUEST['p_qty'];
		$u_id=$_SESSION['u_id'];
		$p_id=$_REQUEST['p_id'];


		if($p_name!=""){

			if($p_id==""){
					
					$where="p_name='$p_name'";
					$tot=$obj->rowcount($conn,table2,$where);
						
						if($tot==0){
	// insert product

							$query="p_name='$p_name' , p_desc='$p_desc' , p_img='$img' , p_qty='$p_qty' , u_id='$u_id'";
					 		$result=$obj->insertrow($conn,$query,table2);
							header("location:index.php?status=view_product");

							$path="upload/product/".$img;
							move_uploaded_file($img_tpath,$path);
						}else{

							$result="	<span class='text-danger'>
											<h3>Product already exist!!!</h3>
										</span>";
						}
				}else{
					if($img!=""){
	// update product

		// update with image
							$where="p_id=$p_id";
							$query="p_name='$p_name' , p_desc='$p_desc' , p_img='$img' , p_qty='$p_qty' , u_id='$u_id'";
					 		$result=$obj->updaterow($conn,table2,$query,$where);
							header("location:view_product.php");

							$path="upload/product/".$img;
							move_uploaded_file($img_tpath,$path);

					}else{
		// update without image
							$where="p_id=$p_id";
							$query="p_name='$p_name' , p_desc='$p_desc' , p_qty='$p_qty' , u_id='$u_id'";
					 		$result=$obj->updaterow($conn,table2,$query,$where);
							header("location:view_product.php");

					}
				}
			}


// select one
		$where="p_id='$p_id'";
		$fetch=$obj->selectone($conn,table2,$where);
		// print_r($fetch);
include("header.php");
?>
<section class="add_product">
	<div class="container">
		<form method="post" enctype="multipart/form-data">

		<hr>
		<h1 class="text-right">Add Product</h1>
		<hr>
		<h3><?php echo $result;?></h3>
		<div class="form-group">
			<label class="text-white">Name</label>
			<input type="text" name="p_name" value="<?php echo $fetch['p_name']?>" class="form-control" placeholder="Add Product name/title">
		</div>
		<div class="form-group">
			<label class="text-white">Description</label>
			<textarea name="p_desc" class="form-control" placeholder="Add Product Description" rows="10"><?php echo $fetch['p_desc'];?></textarea>
		</div>
		<div class="form-group">
			<label class="text-white">Image</label>
			<input type="file" name="p_img" class="form-control">
		</div>
		<br>
		<br>
		<div class="form-group">
			<input type="submit" value="Add Product" class="btn btn-primary">
		</div>				
		</form>				
	</div>
</section>

<?php
include("footer.php");
?>