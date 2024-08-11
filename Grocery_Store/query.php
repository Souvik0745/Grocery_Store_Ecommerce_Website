<?php
require('connection.inc.php');
require('functions.php');

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST['email']) && $_POST['email'] != "" && isset($_POST['mobile']) && $_POST['mobile'] != "" && isset($_POST['message']) && $_POST['message'] != "") {
    $email = get_safe_value($con, $_POST['email']);
    $mobile = get_safe_value($con, $_POST['mobile']);
    $message = get_safe_value($con, $_POST['message']);
    $added_on = date("Y-m-d H:i:s");
    
    // Log input values
    error_log("Email: $email, Mobile: $mobile, Message: $message, Added On: $added_on");

    $query = "INSERT INTO contact_us(email, mobile, message, added_on) VALUES ('$email', '$mobile', '$message', '$added_on')";
    
    if (mysqli_query($con, $query)) {
        echo "Thank you! Your query is successfully recorded!";
    } else {
        // Log SQL error
        error_log("SQL Error: " . mysqli_error($con));
        echo "Error: Internal Server Error. Try Again Later!";
    }
} else {
    echo "Some Required Details are Missing!";
}
?>