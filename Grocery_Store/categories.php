<?php 
require('top.php');
if(!isset($_GET['id']) && $_GET['id']!=''){
	?>
	<script>
	window.location.href='index.php';
	</script>
	<?php
}
$cat_id=mysqli_real_escape_string($con,$_GET['id']);
$price_high_selected="";
$price_low_selected="";
$new_selected="";
$old_selected="";
$sort_order="";
if(isset($_GET['sort'])){
	$sort=mysqli_real_escape_string($con,$_GET['sort']);
	if($sort=="price_high"){
		$sort_order=" order by product.price desc ";
		$price_high_selected="selected";	
	}if($sort=="price_low"){
		$sort_order=" order by product.price asc ";
		$price_low_selected="selected";
	}if($sort=="new"){
		$sort_order=" order by product.id desc ";
		$new_selected="selected";
	}if($sort=="old"){
		$sort_order=" order by product.id asc ";
		$old_selected="selected";
	}
}
if($cat_id>0){
	$get_product=get_product($con,'',$cat_id,'','',$sort_order);
}else{
	?>
	<script>
	window.location.href='index.php';
	</script>
	<?php
}										
?>
<!--Category section--> 
        <section class="categories" id="categories">
        <div class="product-category">
            <div class="subheading">
                <h2 class="h2"><?php 
				$id = $_GET['id'];
				$sql = "SELECT categories FROM categories WHERE id = '$id'";
				$res = mysqli_query($con,$sql);
				if ($res) {
					$category = $res->fetch_assoc();
					echo $category['categories'];
				} else {
					echo "Error: ". $mysqli->error;
				}
				?></h2>
            </div>
        </div>
					<?php if(count($get_product)>0){?>
                            <div class="sort-section">
								<select onchange="sort_product_drop('<?php echo $cat_id?>','<?php echo SITE_PATH?>')" id="sort_product_id">
                                    <option value="">Default softing</option>
                                    <option value="price_low" <?php echo $price_low_selected?>>Sort by price low to high</option>
                                    <option value="price_high" <?php echo $price_high_selected?>>Sort by price high to low</option>
                                    <option value="new" <?php echo $new_selected?>>Sort by new first</option>
									<option value="old" <?php echo $old_selected?>>Sort by old first</option>
                                </select>
                            </div>
                            <!-- Start Product View -->
                            <div class="box-container">
                                        <?php
										foreach($get_product as $list){
										?>
										<!-- Start Single Category -->
                                        <div class="box">
                                            <a href="product.php?id=<?php echo $list['id']?>">
                                            <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$list['image']?>" alt="product images">
                                            </a>
								            <div>
                                                <h3><a style="font-size:1.7rem;color:var(--darkGrey);" href="product-details.html"><?php echo $list['name']?></a></h3>
                                                <ul style="font-size:1.5rem;color:var(--lightColor);">
                                                    <li style="padding:.7rem 0;">MRP: <?php echo $list['mrp']?>₹/-INR</li><br>
                                                    <li>Price: <?php echo $list['price']?>₹/-INR</li>
                                                </ul>
												<ul>
													<li><a class="btn" href="javascript:void(0)" onclick="manage_cart('<?php echo $list['id']?>','add')">Add to Cart</i></a></li>
												</ul>
                            	            </div>
                                        </div>
										<?php } ?>
							   </div>
					<?php } else { 
						echo "Data not found!";
					} ?>
            </div>
        </section>
<!--Category section-->   
<input type="hidden" id="qty" value="1"/>  
<?php require('footer.php'); ?>