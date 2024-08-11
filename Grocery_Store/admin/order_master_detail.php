<?php

require('top.inc.php');

$order_id = get_safe_value($con, $_GET['id']);

if (isset($_POST['update_order_status'])) {

	$update_order_status = $_POST['update_order_status'];

	if ($update_order_status == '5') {

		if (mysqli_query($con, "update `orders` set order_status='$update_order_status',payment_status='Success' where id='$order_id'")) {
			// query executed successfully
		} else {
			echo "Internal Error: Unable to update order status";
		}

	} else {

		if (mysqli_query($con, "update `orders` set order_status='$update_order_status' where id='$order_id'")) {
			// query executed successfully
		} else {
			echo "Internal Error: Unable to update order status";
		}

	}

}

?>

<div class="content pb-0">

	<div class="orders">

		<div class="row">

			<div class="col-xl-12">

				<div class="card">

					<div class="card-body">

						<h4 class="box-title">Order Details </h4>

	</div>

					<div class="card-body--">

						<div class="table-stats order-table ov-h">

							<table class="table">

								<thead>

									<tr>

										<th class="product-thumbnail">Product Name</th>

										<th class="product-thumbnail">Product Image</th>

										<th class="product-name">Qty</th>

										<th class="product-price">Price</th>

										<th class="product-price">Total Price</th>

									</tr>

								</thead>

								<tbody>

								<?php

								$query = "SELECT order_detail.id, order_detail.qty, order_detail.price, product.name, product.image, `orders`.address, `orders`.city, `orders`.pincode 
										FROM order_detail 
										JOIN product ON order_detail.product_id = product.id 
										JOIN `orders` ON order_detail.order_id = `orders`.id 
										WHERE order_detail.order_id = '$order_id'";

								if ($res = mysqli_query($con, $query)) {
									$total_price = 0;
									$userInfo = mysqli_fetch_assoc(mysqli_query($con, "select * from `orders` where id='$order_id'"));

										$address = $userInfo['address'];

										$city = $userInfo['city'];

										$pincode = $userInfo['pincode'];
									while ($row = mysqli_fetch_assoc($res)) {
										$total_price += $row['qty'] * $row['price'];
									?>
										<tr>
											<td class="product-name"><?php echo $row['name']?></td>
											<td class="product-name"> <img src="<?php echo PRODUCT_IMAGE_SITE_PATH. $row['image']?>"></td>
											<td class="product-name"><?php echo $row['qty']?></td>
											<td class="product-name"><?php echo $row['price']?></td>
											<td class="product-name"><?php echo $row['qty'] * $row['price']?></td>
										</tr>
										<?php
									}
								?>
									<tr>
										<td colspan="3"></td>
										<td class="product-name">Total Price</td>
										<td class="product-name"><?php echo $total_price?></td>
									</tr>
								<?php
								} else {
									echo "Internal Error: Unable to retrieve order details";
								}

								?>

								</tbody>

							</table>

							<div id="address_details">

								<strong style="margin-left: 1rem;">Address:</strong>

								<?php echo $address?>, <?php echo $city?>, <?php echo $pincode?><br/><br/>

								<strong style="margin-left: 1rem;">Order Status:</strong>

								<?php

								$query = "select order_status.name from order_status, `orders` where `orders`.id='$order_id' and `orders`.order_status=order_status.id";

								if ($res = mysqli_query($con, $query)) {

									$order_status_arr = mysqli_fetch_assoc($res);

									echo $order_status_arr['name'];

								} else {

									echo "Internal Error: Unable to retrieve order status";

								}

								?>

								<div>

									<form style="margin-top: 0rem; padding: 1rem 1rem;" method="post">

										<select class="form-control" name="update_order_status" required>

											<option value="">Select Status</option>

											<?php

											$query = "select * from order_status";

											if ($res = mysqli_query($con, $query)) {

												while ($row = mysqli_fetch_assoc($res)) {

													if ($row['id'] == $categories_id) {

														echo "<option selected value=". $row['id']. ">". $row['name']. "</option>";

													} else {

														echo "<option value=". $row['id']. ">". $row['name']. "</option>";

													}

												}

											} else {

												echo "Internal Error: Unable to retrieve order status";

											}

											?>

										</select>

										<button style="margin-top: 1rem;" id="payment-button" name="submit" type="submit" class="btn btn-lg btn-info btn-block">

											<span id="payment-button-amount">Submit</span>

										</button>

									</form>

								</div>

							</div>

						</div>

					</div>

				</div>

			</div>

		</div>

	</div>

</div>

<?php

require('footer.inc.php');

?>