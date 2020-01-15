<?php

// print_r($_POST);

// $img=$_FILES['image-file'];
// echo $img['name'];
// echo $img['tmp_name'];

include("connections\conn.php");

$obj = new query;
$table1=table1;

$id=$_SESSION['u_id'];
// print_r($_POST);

if($_REQUEST['submit']=="Update"){
    $u_name=$_POST['user_name'];
    $u_phone=$_POST['user_mobile'];
    $u_email=$_POST['user_email'];
    $u_address=$_POST['user_address'];
    
    $u_profile=$_FILES['image-file'];

    $img_name=$u_profile['name'];
    $img_tpath=$u_profile['tmp_name'];
    $path="upload/user_profiles/";
   
    if($img_name!=""){
        move_uploaded_file($img_tpath,$path.$img_name);
        $where="u_id=".$id;
        $query="u_name='$u_name',u_phone='$u_phone',u_profile='$img_name',u_address='$u_address',u_email='$u_email'";
        $result=$obj->updaterow($conn,table1,$query,$where);

    }else{

        $where="u_id=".$id;
        $query="u_name='$u_name',u_phone='$u_phone',u_address='$u_address'";
        $result=$obj->updaterow($conn,table1,$query,$where);
    }

}

$where="u_id=".$id;
$fetch=$obj->selectone($conn,$table1,$where);

?>
<!DOCTYPE html>
<html>
	<?php
        include("linkfile.php");
    ?>
<body>
   <?php
    include("header.php");
   ?>
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row" id="main" >
                <div class="col-sm-12 col-md-12 well" id="content">
                    <h1>Profile</h1>
                </div>
            </div>
            <span class="text-center h3 col-md-12 text-success"><?php echo $result;?></span>
                <div class="row">
                    <form method="post" enctype="multipart/form-data">
                    <div class="col-md-offset-1 col-md-2">
                          <div class="imageupload panel panel-default">
                            <img src="upload\user_profiles\<?php echo $fetch['u_profile']; ?>" id="xyz" height="200" width="200" class="img-responsive">
                
                <div class="file-tab panel-body">
                    <label class="btn btn-primary btn-file">
                        <span>Browse</span>
                        <!-- The file is stored here. -->
                        <input type="file" name="image-file" class="hidden" id="uplod">
                    </label>
                    <button type="button" class="btn btn-danger">Delete image</button>
                </div>
                <div class="url-tab panel-body">
                    <div class="input-group">
                        <input type="text" class="form-control hasclear" placeholder="Image URL">
                        <div class="input-group-btn">
                            <button type="button" class="btn btn-default" id="submits">Submit</button>
                        </div>
                    </div>
                    <button type="button" class="btn btn-default">Remove</button>
                    <!-- The URL is stored here. -->
                    <input type="hidden" name="image-url">
                </div>
            </div>

                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                    </div>
                    <div class="col-md-offset-1 col-md-6">
                        <table class="table table-borderd">
                            <tr>
                                <th>NAME</th>
                                <td><input type="text" name="user_name" value="<?php echo $fetch['u_name'];?>" class="form-control"></td>
                            </tr>
                            <tr>
                                <th>ADDRESS</th>
                                <td><textarea rows="5" name="user_address" class="form-control"><?php echo $fetch['u_address'];?></textarea></td>
                            </tr>
                            <tr>
                                <th>MOBILE NUMBER</th>
                                <td><input type="text" name="user_mobile" value="<?php echo $fetch['u_phone'];?>" class="form-control"></td>
                            </tr>
                            <tr>
                                <th>EMAIL</th>
                                <td><input type="text" name="user_email" value="<?php echo $fetch['u_email'];?>" class="form-control"></td>
                            </tr>
                        </table>



                        <input type="submit" name="submit" id="submit" value="Update" class="btn btn-success">
                    </form>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
<?php
  include("footer.php");
?>
    <script src="js/bootstrap-imageupload.js"></script>
    <script type="text/javascript">
        $(function(){
            $('[data-toggle="tooltip"]').tooltip();
            $(".side-nav .collapse").on("hide.bs.collapse", function() {                   
                $(this).prev().find(".fa").eq(1).removeClass("fa-angle-right").addClass("fa-angle-down");
            });
            $('.side-nav .collapse').on("show.bs.collapse", function() {                        
                $(this).prev().find(".fa").eq(1).removeClass("fa-angle-down").addClass("fa-angle-right");        
            });



        })    
    </script>
    <script>
        var $imageupload = $('.imageupload');
        $imageupload.imageupload();

$("#submits").click(function(){
//         var i=$("#uplod").val();
//         alert(i);
 $("#xyz").addClass("hide");
});
    </script>
