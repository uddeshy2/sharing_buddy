<?php
include("connections/session.php");
include("connections\conn.php");

include("header.php");
				$obj = new query;


$i=$_GET['i'];
$s=$_GET['s'];
$pid=$_GET['pid'];
if($s!="" and $i!=""){
    //for updating status in Request table

    $where="r_id='$s'";
    $where2="p_id=$pid";
    $query="b_status='1'";
    $qurey1="p_status='1'";
    $result=$obj->updaterow($conn,table5,$query,$where);
    $result2=$obj->updaterow($conn,table2,$qurey1,$where2);

    $fetch=$obj->selectone($conn,table5,$where); 
    // for updating borrow statur table
    $where="p_id='".$fetch['p_id']."'";
    $tot=$obj->rowcount($conn,table3,$where); 

    if($tot==0){
    $query="p_id='".$fetch['p_id']."', u_id='".$fetch['u_id']."' ,b_id='".$fetch['b_id']."' ,r_id='".$fetch['r_id']."'";
    $result=$obj->insertrow($conn,$query,table3);
    }
}
if($s!="" and $i==""){

    $where="r_id='$s'";
    $result=$obj->singledelete($conn,table5,$where);

}


?>
<section id="view_product">

            <div class="row" id="main" >
                <div class="col-sm-12 col-md-12 well" id="content">
                    <h1>Recieve Request</h1>
                </div>
            </div>
    <div class="container">
        <?php if($result!=""){?>

        <span class="alert alert-success"><?php echo $result;?></span>
    <?php } ?>
    <br/>
    <br/>
    <br/>
    <br/>
        <table id="example" class="table table-bordered" style="width:100%;">
        <thead>
            <tr>
                <th>S No.</th>
                <th>Request</th>
                <th>Description</th>
                <th>Requested Till</th>
                <th>Date of Request</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
        		$exe=$obj->selectall($conn,table5);
        		$i=1;
        		while($fetch=mysqli_fetch_array($exe)){

                    if($fetch['u_id']==$_SESSION['u_id'] and $fetch['b_status']=='0'){
        	?>
        	<tr>
        		<td><?php echo $i;?></td>
                <td>

                    <?php

                    $where="u_id=".$fetch['u_id'];
                    $fetchu=$obj->selectone($conn,table1,$where)
                    ?>
                        <span class=" h4"><?php echo $fetchu['u_name'];?></span>
                    ,Do You Want To Give 
                     <?php

                    $where="u_id=".$fetch['b_id'];
                    $fetchu=$obj->selectone($conn,table1,$where)
                    ?>
                        <span class=" h4"><?php echo $fetchu['u_name'];?></span>
                 your product
                    <?php

                    $where="p_id=".$fetch['p_id'];
                    $fetchp=$obj->selectone($conn,table2,$where)
                    ?>
                        <span class="text-primary h4 "><?php echo $fetchp['p_name']?> .</span>
                </td>
                <td>
                        <span class="text-primary h4 "><?php echo $fetch['b_desc'];?></span>
                </td>
                <td>
                        <span class="text-primary h4 "><?php echo $fetch['b_time'];?></span>
                </td>
                <td>
                        <span class="text-primary h4 "><?php echo $fetch['b_Date'];?></span>
                </td>
                <td>
                    <a href="recieverequest.php?i=1&s=<?php echo $fetch['r_id']; ?>&pid=<?php echo $fetch['p_id']?>">
                        <input type='button' class='btn btn-success' value='Approve'/>
                    </a>
                    <a href="recieverequest.php?s=<?php echo $fetch['r_id']; ?>">
                        <input type='button' class='btn btn-danger' value='Deny'/>
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