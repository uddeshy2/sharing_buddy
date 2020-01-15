<?php
include("connections\conn.php");

include("header.php");

?>
<section id="view_product">
	<div class="container">
<br>
<br>
<br>
<br>
<br>
		<table id="example" class="table table-bordered" style="width:100%;">
        <thead>
            <tr>
                <th>S No.</th>
                <th>Request</th>
                <th>To</th>
                <th>From</th>
                <th>Product Name</th>
                <th>Status</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>S No.</th>
                <th>Request</th>
                <th>To</th>
                <th>From</th>
                <th>Product Name</th>
                <th>Status</th>
                <th>Delete</th>
            </tr>
        </tfoot>
        <tbody>
        	<?php
				$obj = new query;
        		$exe=$obj->selectall($conn,table5);
        		$i=1;
        		while($fetch=mysqli_fetch_array($exe)){
        	?>
        	<tr>
        		<td><?php echo $i;?></td>
                <td>
                        <span class="text-success h4">Send</span>
                </td>
                <td>
                    <?php

                    $where="u_id=".$fetch['u_id'];
                    $fetchu=$obj->selectone($conn,table1,$where)
                    ?>
                        <span class=" h4"><?php echo $fetchu['u_name'];?></span>
                </td>
                <td>
                     <?php

                    $where="u_id=".$fetch['b_id'];
                    $fetchu=$obj->selectone($conn,table1,$where)
                    ?>
                        <span class=" h4"><?php echo $fetchu['u_name'];?></span>
                </td>
                <td>  
                    <?php

                    $where="p_id=".$fetch['p_id'];
                    $fetchp=$obj->selectone($conn,table2,$where)
                    ?>
                        <span class="text-primary h4 "><?php echo $fetchp['p_name']?></span>
                </td>
        		<td>
        				<span class="text-primary h4 ">Pending</span>
        		</td>
        		<td>
        			<a href="index.php?status=notification.php?p_id=<?php echo $fetch['p_id']; ?>">
        				<input type='button' class='btn btn-danger' value='Cancel'/>
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