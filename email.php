<?php 
if($_REQUEST['mail']=="submit"){

                        $to = "uddeshy2@gmail.com";


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
   
// More headers
$headers .= 'From: <sumersingh1997.ssh@gmail.com>' . "\r\n";


mail($to,$subject,$message,$headers);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form>
	<button type="submit" name="mail" value="submit"> send mail</button>
</form>
</body>
</html>