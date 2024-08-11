<?php
include('top.php');

// Get the product ID from the URL parameter
$product_id = $_GET['id'];
if (isset($_SESSION['USER_LOGIN'])) {
  $user_id =  $_SESSION['USER_ID'];
} else {
?>
  <script>
    window.location.href = 'login.php';
  </script>
<?php
}
// Check if the user has purchased the product
$order_query = "SELECT * 
FROM orders 
WHERE user_id = $user_id
AND id IN (SELECT order_id FROM order_detail WHERE product_id = $product_id)";
$order_result = mysqli_query($con, $order_query);
if (mysqli_num_rows($order_result) == 0) {
  echo "<p style='margin-top: 15rem; text-align: center; font-size: 1.5rem; font-weight: bold;'>You have not purchased this product.</p>";
  exit;
}

// Display the product information
$product_query = "SELECT * FROM product WHERE id = $product_id";
$product_result = mysqli_query($con, $product_query);
$product = mysqli_fetch_assoc($product_result);

// Display the review form if the user has not reviewed the product yet
$review_query = "SELECT * FROM reviews WHERE user_id = $user_id AND product_id = $product_id";
$review_result = mysqli_query($con, $review_query);
if (mysqli_num_rows($review_result) == 0) {
?>
<h1 style="margin-top: 20rem; text-align: center;">Leave a Review for <?php echo $product['name'];?></h1>
<form style="margin-top: 4rem;" action="review_submit.php" method="post">
<div class="rating">
    <input type="radio" id="star5" name="rating" value="5">
    <label for="star5" title="5 stars">
      <i class="fa fa-star"></i>
    </label>
    <input type="radio" id="star4" name="rating" value="4">
    <label for="star4" title="4 stars">
      <i class="fa fa-star"></i>
    </label>
    <input type="radio" id="star3" name="rating" value="3">
    <label for="star3" title="3 stars">
      <i class="fa fa-star"></i>
    </label>
    <input type="radio" id="star2" name="rating" value="2">
    <label for="star2" title="2 stars">
      <i class="fa fa-star"></i>
    </label>
    <input type="radio" id="star1" name="rating" value="1">
    <label for="star1" title="1 star">
      <i class="fa fa-star"></i>
    </label>
  </div>
  <div class="review-form">
    <label for="review">Review:</label>
    <textarea id="review" name="review" maxlength="2000"></textarea><br><br>
    <input type="hidden" name="product_id" value="<?php echo $product_id;?>">
  </div>
  <div style="text-align: center; margin: 2rem 0;">
  <input style="padding: 1rem 2rem; color: #fff; background: #007bff; border-radius: 0.5rem;" type="submit" value="Submit Review">
  </div>
</form>
<?php
} else {
  echo "<p style='margin-top: 15rem; text-align: center; font-size: 1.5rem; font-weight: bold;'>You have already rated this product.</p>";
}
?>