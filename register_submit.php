<?php
session_start();
require('config.php');
require('functions.inc.php');
$name=get_safe_value($conn,$_POST['name']);
$email=get_safe_value($conn,$_POST['email']);
$mobile=get_safe_value($conn,$_POST['mobile']);
$address=get_safe_value($conn,$_POST['address']);
$password=get_safe_value($conn,$_POST['password']);
$check_user=mysqli_num_rows(mysqli_query($conn,"select * from users where email='$email'"));
if($check_user>0){
	echo "email_present";
}else{
	$added=date('Y-m-d h:i:s');
	mysqli_query($conn,"insert into users(name,email,mobile,address,password,added)values('$name','$email','$mobile','$address','$password','$added')");
	echo "insert";
    
}

?>