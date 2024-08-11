<?php
require('top.php');
if (!isset($_SESSION['USER_LOGIN'])) {
?>
    <script>
        window.location.href = 'login.php';
    </script>
<?php
}
$order_id = get_safe_value($con, $_GET['id']);

// Check if the order ID exists in the database
$res = mysqli_query($con, "select * from `orders` where id='$order_id' and user_id='".$_SESSION['USER_ID']."'");
if (mysqli_num_rows($res) == 0) {
    ?>
    <script>
        window.location.href = 'index.php';
    </script>
    <?php
    exit;
}
?>
<div style="padding-top: 100px; background-color: #f7f7f7; margin-bottom: 30px;">
    <div style="width: 100%; margin: 0 auto; background: white;">
        <div style="display: flex;">
            <div style="width: 100%;">
                <div style="margin: 0 auto;">
                    <form action="#">
                        <div style="overflow-x: auto;">
                            <table style="width: 100%; border-collapse: collapse;">
                                <thead style="font-size: 1.4rem;">
                                    <tr>
                                        <th style="color: white; background: green; border: 1px solid white; padding: 8px;">Product ID</th>
                                        <th style="color: white; background: green; border: 1px solid white; padding: 8px;">Product Name</th>
                                        <th style="color: white; background: green; border: 1px solid white; padding: 8px;">Product Image</th>
                                        <th style="color: white; background: green; border: 1px solid white; padding: 8px;">Qty</th>
                                        <th style="color: white; background: green; border: 1px solid white; padding: 8px;">Price</th>
                                        <th style="color: white; background: green; border: 1px solid white; padding: 8px;">Total Price</th>
                                    </tr>
                                </thead>
                                <tbody style="text-align: center;">
                                    <?php
                                    $uid = $_SESSION['USER_ID'];
                                    $res = mysqli_query($con, "select distinct(order_detail.id) ,order_detail.*,product.name,product.image from order_detail,product ,`orders` where order_detail.order_id='$order_id' and `orders`.user_id='$uid' and order_detail.product_id=product.id");
                                    $total_price = 0;
                                    while ($row = mysqli_fetch_assoc($res)) {
                                        $total_price += ($row['qty'] * $row['price']);
                                    ?>
                                        <tr>
                                            <td style="font-size: 1.4rem; border: 1px solid #ddd; padding: 8px;"><?php echo $row['id'] ?></td>
                                            <td style="font-size: 1.4rem; border: 1px solid #ddd; padding: 8px;"><?php echo $row['name'] ?></td>
                                            <td style="font-size: 1.4rem; border: 1px solid #ddd; padding: 8px;"><img src="<?php echo PRODUCT_IMAGE_SITE_PATH . $row['image'] ?>" style="max-width: 100px;"></td>
                                            <td style="font-size: 1.4rem; border: 1px solid #ddd; padding: 8px;"><?php echo $row['qty'] ?></td>
                                            <td style="font-size: 1.4rem; border: 1px solid #ddd; padding: 8px;"><?php echo $row['price'] ?>₹</td>
                                            <td style="font-size: 1.4rem; border: 1px solid #ddd; padding: 8px;"><?php echo $row['qty'] * $row['price'] ?>₹</td>
                                        </tr>
                                    <?php } ?>
                                    <tr>
                                        <td colspan="5" style="font-size: 1.4rem; border: 1px solid #ddd; padding: 8px;">Order Total</td>
                                        <td style="font-size: 1.4rem; border: 1px solid #ddd; padding: 8px;"><?php echo $total_price ?>₹</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require('footer.php')?>