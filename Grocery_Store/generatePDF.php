<?php
include('dompdf/vendor/autoload.php');
require('connection.inc.php');
require('functions.php');

use Dompdf\Dompdf;

if(!$_SESSION['ADMIN_LOGIN']){
	if(!isset($_SESSION['USER_ID'])){
		die();
	}
}

$user_id=$_SESSION['USER_ID'];
$order_id=get_safe_value($con,$_GET['id']);
$orders=mysqli_query($con,"SELECT * FROM orders where `id` = '$order_id' AND `user_id` =' $user_id'");
if(mysqli_num_rows($orders)>=1){
    $orders=mysqli_fetch_assoc($orders);
}else{
    header('Location: index.php');
}
$payment_status=$orders['payment_status'];
$html='
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="admin/images/logo2.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Order Invoice</title>
    <style>
        body {
            background-color: #fff;
            margin: 0;
            padding: 0;
            font-family: "Poppins", sans-serif;
        }
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            margin: 0;
            padding: 0;
        }
        p {
            margin: 0;
            padding: 0;
        }
        .container {
            width: 90%;
            margin-right: auto;
            margin-left: auto;
        }
        .brand-section {
            background-color: #0d1033;
            padding: 10px 40px;
        }
        .logo {
            width: 50%;
        }
        .row {
            display: flex;
            flex-wrap: wrap;
        }
        .col-6 {
            width: 50%;
            flex: 0 0 auto;
        }
        .text-white {
            color: #fff;
        }
        .company-details {
            float: right;
            text-align: right;
        }
        .body-section {
            padding: 16px;
            border: 1px solid gray;
        }
        .heading {
            font-size: 20px;
            margin-bottom: 08px;
        }
        .sub-heading {
            color: #262626;
            margin-bottom: 05px;
        }
        table {
            background-color: #fff;
            width: 100%;
            border-collapse: collapse;
        }
        table thead tr {
            border: 1px solid #111;
            background-color: #f2f2f2;
        }
        table td {
            vertical-align: middle !important;
            text-align: center;
        }
        table th,
        table td {
            padding-top: 08px;
            padding-bottom: 08px;
        }
        .table-bordered {
            box-shadow: 0px 0px 5px 0.5px gray;
        }
        .table-bordered td,
        .table-bordered th {
            border: 1px solid #dee2e6;
        }
        .text-right {
            text-align: end;
        }
        .w-20 {
            width: 20%;
        }
        .float-right {
            float: right;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="brand-section">
            <div class="row">
                <div class="col-6">
                    <h1 class="text-white"><i class="fa fa-shopping-bag"></i> SD Store</h1>
                </div>
            </div>
        </div>

        <div class="body-section">
            <div class="row">
                <div class="col-6">
                    <p class="sub-heading">Full Name: '.$_SESSION['USER_NAME'].'</p>
                    <p class="sub-heading">Email Address: '.$_SESSION['USER_EMAIL'].'</p>
                    <p class="sub-heading">Phone Number: '.$_SESSION['USER_MOBILE'].'</p>
                    <p class="sub-heading">Address: '.$orders['address'].'</p>
                    <p class="sub-heading">Pincode: '.$orders['pincode'].'</p>
                    <p class="sub-heading">Order Date: '.$orders['added_on'].'</p>
                    <p class="sub-heading">Order ID: '.$orders['txnid'].'</p>
                </div>
            </div>
        </div>

        <div class="body-section">
            <h3 class="heading">Ordered Items</h3>
            <br>
            <table class="table-bordered">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th class="w-20">Price</th>
                        <th class="w-20">Quantity</th>
                        <th class="w-20">Product Total</th>
                    </tr>
                </thead>
                <tbody>';
if (isset($_SESSION['ADMIN_LOGIN'])) {
    $res = mysqli_query($con, "select distinct(order_detail.id) ,order_detail.*,product.name,product.image from order_detail,product ,`orders` where order_detail.order_id='$order_id' and order_detail.product_id=product.id");
} else {
    $uid = $_SESSION['USER_ID'];
    $res = mysqli_query($con, "select distinct(order_detail.id) ,order_detail.*,product.name,product.image from order_detail,product ,`orders` where order_detail.order_id='$order_id' and `orders`.user_id='$uid' and order_detail.product_id=product.id");
}

$total_price = 0;
if (mysqli_num_rows($res) == 0) {
    die();
}
while ($row = mysqli_fetch_assoc($res)) {
    $total_price = $total_price + ($row['qty'] * $row['price']);
    $pp = $row['qty'] * $row['price'];
                    $html.='<tr>
                        <td>'.$row['name'].'</td>
                        <td>'.$row['price'].'</td>
                        <td>'.$row['qty'].'</td>
                        <td>'.$pp.'</td>
                    </tr>';
        }
                   $html.='<tr>
                        <td colspan="3" class="text-right">Grand Total</td>
                        <td>'.$total_price.'</td>
                    </tr>';

            $html.='        
                </tbody>
            </table>
            <br>
            <h4>Payment Status:  '.strtoupper($payment_status).'</h4>
            <h4>Payment Mode: '.strtoupper($orders['payment_type']).'</h4>
        </div>
        <div class="body-section">
            <p>&copy; Copyright 2024 - SD Store. All rights reserved.</p>
        </div>
    </div>
</body>
</html>';
$dompdf = new Dompdf;
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
if(isset($_GET['action']) && $_GET['action']=='download'){
    $dompdf->stream('invoice.pdf',['Attachment' => 1]);
}else{
    $dompdf->stream('invoice.pdf',['Attachment' => 0]);
}
?>