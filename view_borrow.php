<?php

include("connections/session.php");

include 'connections/conn.php';
include("header.php");

$obj=new query;

$s=$_GET['s'];
$pid=$_GET['pid'];
if($s!=""){
$where="s_id=".$s;
$result=$obj->singledelete($conn,table3,$where);
$where="p_id=$pid";
$query="p_status=0";
$result=$obj->updaterow($conn,table2,$query,$where);

}


?>
<section id="view_product">
	<div class="container">
<br>
<?php if($result!=""){?>
<span class="alert alert-success"><?php echo $result; ?></span><?php } ?>
<br/>
<br/>
<br/>
		<table id="example" class="table table-bordered" style="width:100%;">
        <thead>
            <tr>
                <th>S No.</th>
                <th>Product Name</th>
                <th>Product description</th>
                <th>Product image</th>
                <th>Borrow Message</th>
                <th>Return Date</th>
                <th>Status</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
        	<?php
        		$exe=$obj->selectall($conn,table3);
        		$i=1;
        		while($fetch=mysqli_fetch_array($exe)){

                    if($fetch['u_id']!=$_SESSION['u_id']){
        	?>
        	<tr>
        		<td><?php echo $i;?></td>
        		<td><?php
                        $where="p_id=".$fetch['p_id'];
                        $fetchp=$obj->selectone($conn,table2,$where); 
                        echo $fetchp['p_name'];?>
                            
                </td>
        		<td><?php echo substr($fetchp['p_desc'],0,10)."...";?></td>
        		<td><img src="upload/product/<?php echo $fetchp['p_img'];?>" height="150" width="200"></td>
        		<td><?php
                        $where="r_id=".$fetch['r_id'];
                        $fetchr=$obj->selectone($conn,table5,$where); 
                        echo $fetchr['b_desc'];

                        
                ?>
                    
                </td>
                <td>
                   <?php 
                
                  echo $dn= $fetchr['b_time'];

if($d==$dn){
$where="b_id=".$fetch['b_id'];
                        $fetchr=$obj->selectone($conn,table1,$where); 
                        $to = $fetchr['u_email'];


$subject = "Important Message";

$message = "
<html>
<head>
<title>Important Message</title>
</head>
<body style='margin: 0;'>
    <div style='background-color: blue;height: 50px;width: 100%;'>
        <p style='color: white;'>Your Borrow Period Has Expired</p>
</div>
    <div style='background-color: skyblue;height: 50px;width: 100%;'>
    <p>The Borrow Duration of your Product has expired Kindly retrun it or else your Account will be put in inspection.</p>
</div>
    <div style='background-color: blue;color:white;height: 50px;width: 100%;'>
        Thank you
</div>
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $where="u_id=".$fetch['u_id'];
                        $fetchr=$obj->selectone($conn,table1,$where); 
                        $From = $fetchr['u_email'];
// More headers
$headers .= 'From: <$From>' . "\r\n";


mail($to,$subject,$message,$headers);
}
                   ?>
                </td>
        		<td><?php 
        			if($fetch['p_status']==1){
        				echo "<a href='index.php?status=view_product&p_status=0&p_id=".$fetch['p_id']."&type=product&work=status'>
        					<input type='button' class='btn btn-success' value='Active'/>
        					</a>
        				";
        			}else{
        				echo "<a href='index.php?status=view_product&p_status=1&p_id=".$fetch['p_id']."&type=product&work=status'>
        					<input type='button' class='btn btn-danger' value='Deactive'/>
        					</a>
        				";
        			}
        			?>
        				
        		</td>
        		<td>
        			<a href="view_borrow.php?s=<?php echo $fetch['s_id']; ?>&pid=<?php echo $fetch['p_id']?>">
        				<input type='button' class='btn btn-danger' value='Not With Me'/>
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