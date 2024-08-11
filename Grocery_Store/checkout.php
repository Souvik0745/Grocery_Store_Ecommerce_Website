<?php
require('top.php');
if (!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0) {
?>
    <script>
        window.location.href = 'index.php';
    </script>
    <?php
}

$cart_total = 0;

if (isset($_POST['submit'])) {
    $address = get_safe_value($con, $_POST['address']);
    $city = get_safe_value($con, $_POST['city']);
    $pincode = get_safe_value($con, $_POST['pincode']);
    $payment_type = get_safe_value($con, $_POST['payment_type']);
    $user_id = $_SESSION['USER_ID'];

    foreach ($_SESSION['cart'] as $key => $val) {
        $productArr = get_product($con, '', '', $key);
        $price = $productArr[0]['price'];
        $qty = $val['qty'];
        $cart_total += ($price * $qty);
    }

    $total_price = $cart_total;
    $payment_status = ($payment_type == 'cod') ? 'Paid' : 'Unpaid';
    $order_status = '1';
    $added_on = date('Y-m-d h:i:s');
    $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);

    mysqli_query($con, "INSERT INTO `orders`(user_id, address, city, pincode, payment_type, payment_status, order_status, added_on, total_price, txnid) VALUES('$user_id', '$address', '$city', '$pincode', '$payment_type', '$payment_status', '$order_status', '$added_on', '$total_price', '$txnid')");

    $order_id = mysqli_insert_id($con);

    foreach ($_SESSION['cart'] as $key => $val) {
        $productArr = get_product($con, '', '', $key);
        $price = $productArr[0]['price'];
        $qty = $val['qty'];

        mysqli_query($con, "INSERT INTO `order_detail`(order_id, product_id, qty, price) VALUES('$order_id', '$key', '$qty', '$price')");
    }

    if ($payment_type == 'razorpay') {
        $USER_EMAIL = $_SESSION['USER_EMAIL'];
        $USER_MOBILE = $_SESSION['USER_MOBILE'];
        $amount = $total_price * 100;
        $script = '
        <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
        <script>
        var options = {
            "key": "rzp_test_lm3AH6KIyt8ODh",
            "amount": "' . $amount . '",
            "currency": "INR",
            "description": "SD Store",
            "image": "admin/images/logo2.png",
            "prefill":
                {
                    "name": "' . $_SESSION['USER_NAME'] . '",
                    "email": "' . $USER_EMAIL . '",
                    "contact": ' . $USER_MOBILE . ',
                },
    "handler": function (response) {
       $.ajax({
                               type:"post",
                               url:"payment_process.php",
                               data:"payment_id="+response.razorpay_payment_id+"&txn_id=' . $txnid . '",
                               success:function(result){
                               console.log(result);
                               if(result === "Success"){
                                   window.location.href="thank_you.php";
                                }
                                else{
                                   window.location.href="index.php";
                               }
                            }
                           });
    },
    "modal": {
      "ondismiss": function () {
        if (confirm("Are you sure, you want to close the form?")) {
          txt = "You pressed OK!";
          console.log("Checkout form closed by the user");
        } else {
          txt = "You pressed Cancel!";
          console.log("Complete the Payment")
        }
      }
    }
  };
    var rzp1 = new Razorpay(options);
  rzp1.open();
    e.preventDefault();
</script>';
        echo $script;
    } else {
        unset($_SESSION['cart']);
    ?>
        <script>
            window.location.href = 'thank_you.php';
        </script>
<?php
    }
}
?>
<div style="padding: 20px; margin-top: 100px;">
    <div style="width: 100%; margin: 0 auto;">
        <div style="display: flex; flex-wrap: wrap;">
            <div style="margin-left: auto; margin-right: auto; flex: 1 0 95%; max-width: 95%;">
                <div style="padding: 20px; border: 1px solid #ddd;">
                    <div>
                        <div style="margin-bottom: 20px;">
                            <div id="checkout-method" style="font-weight: bold; margin-bottom: 10px;">
                                <h1 style="background: #e6e6e6; height: 65px; line-height: 65px; display: flex; align-items: center; padding: 0 30px;">Checkout Method</h1>
                                <div style="margin-top: 10px;">
                                    <div>
                                        <div>
                                            <div>
                                                <form id="login-form" method="post" style="margin-bottom: 20px;">
                                                    <h2 style="margin-bottom: 10px;">Login</h2>
                                                    <div style="margin-bottom: 10px;">
                                                        <input type="text" name="login_email" id="login_email" placeholder="Your Email*" style="width: 100%; padding: 10px; border: 1px solid #ddd;">
                                                        <span id="login_email_error" style="color: red;"></span>
                                                    </div>
                                                    <div style="margin-bottom: 10px;">
                                                        <input type="password" name="login_password" id="login_password" placeholder="Your Password*" style="width: 100%; padding: 10px; border: 1px solid #ddd;">
                                                        <span id="login_password_error" style="color: red;"></span>
                                                    </div>
                                                    <button type="button" style="padding: 10px 20px; background-color: #007bff; color: #fff; border: none; cursor: pointer;" onclick="user_login()">Login</button>
                                                </form>
                                                <div class="form-output login_msg" style="margin-top: 2.5rem; padding-bottom: 1rem;">
                                                    <p class="form-messege field_error" style="color: red; font-size: 12px;"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div>
                                                <form action="#">
                                                    <h2 style="margin-bottom: 10px;">Register</h2>
                                                    <div style="margin-bottom: 10px;">
                                                        <input type="text" name="name" id="name" placeholder="Your Name*" style="width: 100%; padding: 10px; border: 1px solid #ddd;">
                                                        <span id="name_error" style="color: red;"></span>
                                                    </div>
                                                    <div style="margin-bottom: 10px;">
                                                        <input type="text" name="email" id="email" placeholder="Your Email*" style="width: 100%; padding: 10px; border: 1px solid #ddd;">
                                                        <span id="email_error" style="color: red;"></span>
                                                    </div>
                                                    <div style="margin-bottom: 10px;">
                                                        <input type="text" name="mobile" id="mobile" placeholder="Your Mobile*" style="width: 100%; padding: 10px; border: 1px solid #ddd;">
                                                        <span id="mobile_error" style="color: red;"></span>
                                                    </div>
                                                    <div style="margin-bottom: 10px;">
                                                        <input type="password" name="password" id="password" placeholder="Your Password*" style="width: 100%; padding: 10px; border: 1px solid #ddd;">
                                                        <span id="password_error" style="color: red;"></span>
                                                    </div>
                                                    <button type="button" style="padding: 10px 20px; background-color: #007bff; color: #fff; border: none; cursor: pointer;" onclick="user_register()">Register</button>
                                                </form>
                                                <h3 style="margin-top: 2rem; color: red;">Login/Register to continue your ordering process!</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="address-info" style="font-size: 1.2rem; font-weight: bold; margin-bottom: 10px;">
                                <h2 style="margin-bottom: 10px; background: #e6e6e6; height: 65px; line-height: 65px; display: flex;align-items: center; padding: 0 30px;">Address Information</h2>
                                <form method="post">
                                    <div style="margin-top: 10px;">
                                        <div>
                                            <div style="display: flex; flex-wrap: wrap;">
                                                <div style="flex: 1 0 100%; max-width: 100%; margin-bottom: 10px;">
                                                    <div>
                                                        <input type="text" name="address" placeholder="Street Address" required style="width: 100%; padding: 10px; border: 1px solid #ddd;">
                                                    </div>
                                                </div>
                                                <div style="flex: 1 0 50%; max-width: 50%; margin-bottom: 10px;">
                                                    <div>
                                                        <input type="text" name="city" placeholder="City" required style="width: 100%; padding: 10px; border: 1px solid #ddd;">
                                                    </div>
                                                </div>
                                                <div style="flex: 1 0 50%; max-width: 50%; margin-bottom: 10px;">
                                                    <div>
                                                        <input type="text" name="pincode" placeholder="Postal Code/ ZIP" required style="width: 100%; padding: 10px; border: 1px solid #ddd;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="payment-info" style="font-size: 1.2rem; font-weight: 450; margin-bottom: 10px;">
                                        <h2 style="margin-bottom: 10px; background: #e6e6e6; height: 65px; line-height: 65px; display: flex;align-items: center; padding: 0 30px;">Payment Information</h2>
                                        <div style="margin-top: 10px;">
                                            <div>
                                                <div style="margin-bottom: 10px; display: flex; align-items: center;">
                                                    <input type="radio" name="payment_type" value="COD" required>
                                                    <label style="margin-left: .5rem;">Cash on Delivery</label>
                                                </div>
                                                <div style="margin-bottom: 10px; display: flex; align-items: center;">
                                                    <input type="radio" name="payment_type" value="razorpay" required>
                                                    <label style="margin-left: .5rem;">Razorpay</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" name="submit" style="padding: 10px 20px; background-color: #007bff; color: #fff; border: none; cursor: pointer;">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div style="margin-left: auto; margin-right: auto; flex: 1 0 95%; max-width: 95%; padding: 20px; border: 1px solid #ddd; margin-top: 20px;">
                <div>
                    <h2 style="font-weight: bold; margin-bottom: 10px;">Your Order</h2>
                    <div style="margin-bottom: 20px;">
                        <?php
                        $cart_total = 0;
                        foreach ($_SESSION['cart'] as $key => $val) {
                            $productArr = get_product($con, '', '', $key);
                            $pname = $productArr[0]['name'];
                            $mrp = $productArr[0]['mrp'];
                            $price = $productArr[0]['price'];
                            $image = $productArr[0]['image'];
                            $qty = $val['qty'];
                            $cart_total = $cart_total + ($price * $qty);
                        ?>
                            <div style="display: flex; align-items: center; margin-bottom: 10px;">
                                <div style="flex: 0 0 50px; max-width: 50px; margin-right: 10px;">
                                    <img src="<?php echo PRODUCT_IMAGE_SITE_PATH . $image ?>" alt="Product Image" style="width: 100%;">
                                </div>
                                <div style="flex: 1 0 auto;">
                                    <a style="display: block; font-weight: bold; font-size: 1.3rem; margin-bottom: 5px;"><?php echo "$pname x $qty" ?></a>
                                    <span style="color: #007bff; font-size: 1.2rem;">Product Total: ₹<?php echo $price * $qty ?></span>
                                    <a href="javascript:void(0)" onclick="manage_cart('<?php echo $key ?>','remove')" style="color: red; text-decoration: none;"><i style="font-size: 1.5rem; margin-left: 1rem;" class="fa fa-trash"></i></a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div style="font-weight: bold; font-size: 1.5rem;">
                        Order total
                        <span style="float: right;"><?php echo "₹ $cart_total" ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var userLoggedIn = <?php echo isset($_SESSION['USER_LOGIN']) ? 'true' : 'false'; ?>;
        var checkoutMethod = document.getElementById("checkout-method");
        var addressInfo = document.getElementById("address-info");
        var paymentInfo = document.getElementById("payment-info");

        if (userLoggedIn) {
            checkoutMethod.style.display = "none";
            addressInfo.style.display = "block";
            paymentInfo.style.display = "block";
        } else {
            checkoutMethod.style.display = "block";
            addressInfo.style.display = "none";
            paymentInfo.style.display = "none";
        }
    });
</script>

<?php require('footer.php') ?>