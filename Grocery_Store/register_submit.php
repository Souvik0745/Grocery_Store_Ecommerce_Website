<?php
require('connection.inc.php');
require('functions.php');

$name=get_safe_value($con,$_POST['name']);
$email=get_safe_value($con,$_POST['email']);
$mobile=get_safe_value($con,$_POST['mobile']);
$password=get_safe_value($con,$_POST['password']);

$check_user=mysqli_num_rows(mysqli_query($con,"select * from users where email='$email'"));
if($check_user>0){
	echo "Email ID Already Exists!";
}else{
	$added_on=date('Y-m-d h:i:s');
	if (mysqli_query($con,"insert into users(name,email,mobile,password,added_on) values('$name','$email','$mobile','$password','$added_on')")) {
        echo "You Have Registered Successfully! Please login!";
    } else {
        echo "Error: Internal Server Error. Try Again Later!";
    }
}
?>