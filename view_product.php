<?php

include("connections/session.php");

include 'connections/conn.php';
$obj=new query;

// Single Delete Product
        $p_id=$_REQUEST['p_id'];
        $p_status=$_REQUEST['p_status'];
        
        if($p_id!="" and $p_status==""){
            $where="p_id='$p_id'";
            $result=$obj->singledelete($conn,table2,$where);
        }else{

// Status of Product
        $query="p_status='$p_status'";
        $where="p_id=$p_id";
        $result=$obj->updaterow($conn,table2,$query,$where);
        }

include("header.php");

?>
<section id="view_product">

	<div class="container">
<br>

        <hr>
        <h1 class="text-black text-right">View Product</h1>
        <hr>
<br>
<br>
<br>
		<table id="example" class="table table-bordered table-responsive" style="width:100%;color: white">
        <thead>
            <tr class="text-black">
                <th>S No.</th>
                <th>Name</th>
                <th>description</th>
                <th>image</th>
                
                
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tfoot>
            <tr class="text-black">
                <th>S No.</th>
                <th>Name</th>
                <th>description</th>
                <th>image</th>
                
                
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </tfoot>
        <tbody>
        	<?php
                $where="u_id=".$_SESSION['u_id'];
        		$exe=$obj->selectjoin($conn,table2,$where);
        		$i=1;
        		while($fetch=mysqli_fetch_array($exe)){
        	?>
        	<tr class="text-black">
        		<td><?php echo $i;?></td>
        		<td><?php echo $fetch['p_name'];?></td>
        		<td><?php echo nl2br($fetch['p_desc']); ?></td>
        		<td><img src="upload/product/<?php echo $fetch['p_img'];?>" height="150" width="200"></td>
        		
        		<!--<td><?php 
        			/*if($fetch['p_status']==1){
        				echo "<a href='view_product.php?p_status=0&p_id=".$fetch['p_id']."'>
        					<input type='button' class='btn btn-success' value='Active'/>
        					</a>
        				";
        			}else{
        				echo "<a href='view_product.php?p_status=1&p_id=".$fetch['p_id']."'>
        					<input type='button' class='btn btn-danger' value='Deactive'/>
        					</a>
        				";
        			}*/
        			?> </td> !-->
        				
        		
        		<td>
        			<a href="add_product.php?p_id=<?php echo $fetch['p_id']; ?>">
        				<input type='button' class='btn btn-primary' value='Edit'/>
        			</a>
        		</td>
        		<td>
        			<a href="view_product.php?p_id=<?php echo $fetch['p_id']; ?>">
        				<input type='button' class='btn btn-danger' value='Delete'/>
        			</a>
        		</td>
        	</tr>
        	<?php
        	$i++;
        		}
        	?>
        </tbody>
    </table>
	</div>
</section>

<?php
include("footer.php");
?>