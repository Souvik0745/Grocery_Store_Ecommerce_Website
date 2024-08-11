<?php
require('connection.inc.php');
if (isset($_POST['payment_id']) && $_POST['payment_id'] != '' && isset($_POST['txn_id']) && $_POST['txn_id'] != '') {
    $p_id = $_POST['payment_id'];
    $t_id = $_POST['txn_id'];
    if (mysqli_query($con, "update `orders` set payment_status='Paid', mihpayid='$p_id' where txnid='$t_id'")) {
        if (isset($_SESSION['cart'])) {
            unset($_SESSION['cart']);
        }
        echo "Success";
        exit();
    } else {
        echo "Failed";
    }
} else {
    echo "Failed";
}