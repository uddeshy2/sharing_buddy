<?php
include("connections\conn.php");
include("connections/session.php");

include("header.php");
 
$obj = new query;

if($_GET['s']!=""){

    $where="r_id=".$_GET['s'];
$result=$obj->singledelete($conn,table5,$where);
}

?>
<section id="view_product">
    
            <div class="row" id="main" >
                <div class="col-sm-12 col-md-12 well" id="content">
                    <h1>Send Request</h1>
                </div>
            </div>
    <div class="container">
        <?php echo $result;?>
<br>
        <table id="example" class="table table-bordered" style="width:100%;">
        <thead>
            <tr>
                <th>S No.</th>
                <th>Request</th>
                <th>Date</th>
                <th>Borrow Till</th>
                <th>Status</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
        		$exe=$obj->selectall($conn,table5);
        		$i=1;
        		while($fetch=mysqli_fetch_array($exe)){

                    if($fetch['b_id']==$_SESSION['u_id'] AND $fetch['b_status']==0){
        	?>
        	<tr>
        		<td><?php echo $i;?></td>
                <td>
                    <?php

                    $where="u_id=".$fetch['b_id'];
                    $fetchu=$obj->selectone($conn,table1,$where)
                    ?>
                        <span class=" h4"><?php echo $fetchu['u_name'];?></span>
                    
                        you send request to
                     <?php
$where="u_id=".$fetch['u_id'];
                    $fetchu=$obj->selectone($conn,table1,$where)
                    ?>
                        <span class=" h4"><?php echo $fetchu['u_name'];?></span>
                for Borrowing : 
                    <?php

                    $where="p_id=".$fetch['p_id'];
                    $fetchp=$obj->selectone($conn,table2,$where)
                    ?>
                    <span class="text-primary h4 "><?php echo $fetchp['p_name']?>.</span>

                </td>
                <td>
                        <span class="text-primary h4 "><?php echo $fetch['b_Date']?></span>
                </td>
                <td>
                        <span class="text-primary h4 "><?php echo $fetch['b_time']?></span>
                </td>
                <td>
                        <span class="text-primary h4 ">Pending</span>
                </td>
        		<td>
        			<a href="sendrequest.php?s=<?php echo $fetch['r_id']; ?>">
        				<input type='button' class='btn btn-danger' value='Delete'/>
        			</a>
        		</td>
        	</tr>
        	<?php
        }
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