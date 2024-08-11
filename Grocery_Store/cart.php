<?php
require('top.php');
?>
<div style="margin-top: 90px; padding: 20px; background-color: #f9f9f9; margin-bottom: 20px;">
    <div style="max-width: 1200px; margin: 0 auto;">
        <div style="overflow-x: auto;">
            <div style="padding: 20px; background-color: #fff; border-radius: 5px;">
                <form action="#">
                    <?php if (empty($_SESSION['cart'])) { ?>
                        <p style="text-align: center; font-size: 2rem; color: #130f40; font-weight: 420;">Cart is empty.</br></br>
                            <a href="index.php" style="text-decoration: none; text-align: center; font-size: 1.4rem; padding: 10px 20px; background-color: green; color: #fff; border-radius: 4px;">Add some products</a></p>
                    <?php } else { ?>
                        <div style="width: 100%; overflow-x: auto;">
                            <table style="width: 100%; border-collapse: collapse; text-align: left;">
                                <thead style="background-color: green; color: #fff; font-size: 1.4rem;">
                                    <tr>
                                        <th style="padding: 10px; border: 1px solid #ddd;">Products</th>
                                        <th style="padding: 10px; border: 1px solid #ddd;">Name of products</th>
                                        <th style="padding: 10px; border: 1px solid #ddd;">Price</th>
                                        <th style="padding: 10px; border: 1px solid #ddd;">Quantity</th>
                                        <th style="padding: 10px; border: 1px solid #ddd;">Total</th>
                                        <th style="padding: 10px; border: 1px solid #ddd;">Remove</th>
                                    </tr>
                                </thead>
                                <tbody style="color: #130f40; font-size: 1.3rem;">
                                    <?php
                                    if (isset($_SESSION['cart'])) {
                                        foreach ($_SESSION['cart'] as $key => $val) {
                                            $productArr = get_product($con, '', '', $key);
                                            $pname = $productArr[0]['name'];
                                            $mrp = $productArr[0]['mrp'];
                                            $price = $productArr[0]['price'];
                                            $image = $productArr[0]['image'];
                                            $qty = $val['qty'];
                                            $price = floatval($price); // Ensure $price is a float
                                            $qty = intval($qty);
                                    ?>
                                            <tr>
                                                <td style="padding: 10px; border: 1px solid #ddd; text-align: center;"><a><img src="<?php echo PRODUCT_IMAGE_SITE_PATH . $image ?>" style="max-width: 100px;" /></a></td>
                                                <td style="padding: 10px; border: 1px solid #ddd; text-align: center;"><a><?php echo $pname ?></a>
                                                </td>
                                                <td style="padding: 10px; border: 1px solid #ddd; text-align: center;"><span><?php echo $price ?></span></td>
                                                <td style="padding: 10px; border: 1px solid #ddd; text-align: center;">
                                                    <input type="number" id="<?php echo $key ?>qty" value="<?php echo $qty ?>" style="width: 50px; padding: 5px; border: 1px solid #ddd; border-radius: 4px;">
                                                    <br /><a href="javascript:void(0)" onclick="manage_cart('<?php echo $key ?>','update')" style="color: #3498db; text-decoration: none; font-size: 14px;">Update</a>
                                                </td>
                                                <td style="padding: 10px; border: 1px solid #ddd; text-align: center;"><?php echo $qty * $price; ?></td>
                                                <td style="padding: 10px; border: 1px solid #ddd; text-align: center;"><a href="javascript:void(0)" onclick="manage_cart('<?php echo $key ?>','remove')" style="color: #e74c3c; text-decoration: none;"><i style="font-size: 1.7rem;" class="fa fa-trash" aria-hidden="true"></i></a></td>
                                            </tr>
                                    <?php }
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 20px;">
                            <div>
                                <a href="<?php echo SITE_PATH ?>" style="font-size: 1.3rem; padding: 10px 20px; background-color: #035afc; color: #fff; text-decoration: none; border-radius: 4px;">Continue Shopping</a>
                            </div>
                            <div>
                                <a href="<?php echo SITE_PATH ?>checkout.php" style="font-size: 1.3rem; padding: 10px 20px; background-color: green; color: #fff; text-decoration: none; border-radius: 4px;">Checkout</a>
                            </div>
                        </div>
                    <?php } ?>
                </form>
            </div>
        </div>
    </div>
</div>
<?php require('footer.php') ?>