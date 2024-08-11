<?php

require('top.inc.php');



$sql="select * from users order by id desc";

if($res=mysqli_query($con,$sql)){
	// query executed successfully
}else{
	echo "Internal Error: Unable to retrieve users";
}

?>

<div class="content pb-0">

	<div class="orders">

	   <div class="row">

		  <div class="col-xl-12">

			 <div class="card">

				<div class="card-body">

				   <h4 class="box-title">Order Master </h4>

				</div>

				<div class="card-body--">

				   <div class="table-stats order-table ov-h">

					  <table class="table">

							<thead>

								<tr>

									<th class="product-thumbnail">Order ID</th>

									<th class="product-name"><span class="nobr">Order Date</span></th>

									<th class="product-price"><span class="nobr"> Address </span></th>

									<th class="product-stock-stauts"><span class="nobr"> Payment Type </span></th>

									<th class="product-stock-stauts"><span class="nobr"> Payment Status </span></th>

									<th class="product-stock-stauts"><span class="nobr"> Order Status </span></th>

									<th class="product-stock-stauts"><span class="nobr"> Transaction ID </span></th>

								</tr>

							</thead>

							<tbody>

								<?php

								$query="select `orders`.*,order_status.name as order_status_str from `orders`,order_status where order_status.id=`orders`.order_status"; 

								if($res=mysqli_query($con,$query)){
									if(mysqli_num_rows($res) > 0) { 
										while($row=mysqli_fetch_assoc($res)){

										?>

										<tr>

											<td class="product-add-to-cart"><a href="order_master_detail.php?id=<?php echo $row['id']?>"> <?php echo $row['id']?></a></td>

											<td class="product-name"><?php echo $row['added_on']?></td>

											<td class="product-name">

											<?php echo $row['address']?><br/>

											<?php echo $row['city']?><br/>

											<?php echo $row['pincode']?>

											</td>

											<td class="product-name"><?php echo $row['payment_type']?></td>

											<td class="product-name"><?php echo $row['payment_status']?></td>

											<td class="product-name"><?php echo $row['order_status_str']?></td>

											<td class="product-name"><?php echo $row['txnid']?></td>

										</tr>

										<?php }?>
									<?php }else{?>
										<tr>
											<td colspan="7">No orders found</td>
										</tr>
									<?php }
								}else{
									echo "Internal Error: Unable to retrieve orders";
								}

								?>

							</tbody>

							

						</table>

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