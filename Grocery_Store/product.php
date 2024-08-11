<?php
include('top.php');
if (isset($_GET['id'])) {
    $product_id = mysqli_real_escape_string($con, $_GET['id']);
    if ($product_id > 0) {
        $get_product = get_product($con, '', '', $product_id);
        if (empty($get_product)) {
            // If the product ID does not exist, redirect to index page
            ?>
            <script>
                window.location.href = 'index.php';
            </script>
            <?php
            exit;
        }
    } else {
        ?>
        <script>
            window.location.href = 'index.php';
        </script>
    <?php
    }
} else {
    ?>
    <script>
        window.location.href = 'index.php';
    </script>
<?php
}
// Query to retrieve the reviews and average rating
$review_sql = "SELECT r.review, r.rating, u.name 
                FROM reviews r 
                JOIN users u ON r.user_id = u.id 
                WHERE r.product_id = $product_id";
$review_result = mysqli_query($con, $review_sql);

// Calculate the average rating
$avg_rating_sql = "SELECT AVG(r.rating) AS avg_rating 
                    FROM reviews r 
                    WHERE r.product_id = $product_id";
$avg_rating_result = mysqli_query($con, $avg_rating_sql);
$avg_rating = mysqli_fetch_assoc($avg_rating_result)['avg_rating'];

// Calculate the number of whole stars and half stars
$whole_stars = floor($avg_rating);
$half_stars = ceil($avg_rating - $whole_stars);
?>
<style>
    .container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

.row {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
}

.col-md-6 {
    flex: 1 1 50%;
    padding: 20px;
    box-sizing: border-box;
}

.product-image {
    text-align: center;
}

.product-image img {
    max-width: 100%;
    height: auto;
}

.average-rating {
    font-size: 24px;
    margin-bottom: 10px;
}

@media (max-width: 992px) {
    .col-md-6 {
        flex: 1 1 100%;
    }
}

@media (max-width: 768px) {
    .product-image {
        margin-bottom: 20px;
    }
}

@media (max-width: 480px) {
    .product-image img {
        width: 100%;
        height: auto;
    }
}
</style>
<!-- Start Product Details Area -->
<section style="margin-top: 50px; padding: 50px 0; background-color: #fff;">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="product-image">
                    <img src="<?php echo PRODUCT_IMAGE_SITE_PATH . $get_product['0']['image'] ?>" alt="full-image" style="max-width: 100%; height: auto;">
                </div>
            </div>
            <div class="col-md-6">
                <h2 style="font-size: 28px; margin-bottom: 10px;"><?php echo $get_product['0']['name'] ?></h2>
                <span>
                    <div class="average-rating">
                        <?php
                        // Calculate the average rating
                        $avg_rating_sql = "SELECT AVG(r.rating) AS avg_rating, COUNT(r.id) AS total_reviews 
                                            FROM reviews r 
                                            WHERE r.product_id = $product_id";
                        $avg_rating_result = mysqli_query($con, $avg_rating_sql);
                        $avg_rating_data = mysqli_fetch_assoc($avg_rating_result);
                        $avg_rating = $avg_rating_data['avg_rating'];
                        $total_reviews = $avg_rating_data['total_reviews'];
                        // Display the average rating in star form
                        for ($i = 0; $i < 5; $i++) {
                            if ($i < floor($avg_rating)) {
                                echo "<i class='fa fa-star' style='color: #ffcc00;'></i>";
                            } elseif ($i == floor($avg_rating) && $avg_rating - floor($avg_rating) > 0) {
                                echo "<i class='fa fa-star-half-o' style='color: #ffcc00;'></i>";
                            } else {
                                echo "<i class='fa fa-star-o' style='color: #ffcc00;'></i>";
                            }
                        }
                        echo " (". number_format($avg_rating, 1). "/5)  ($total_reviews)";
                        ?>
                    </div>
                </span>
                <ul style="list-style: none; padding: 0; margin-bottom: 20px;">
                    <li style="font-size: 24px;">MRP: ₹<?php echo $get_product['0']['mrp'] ?></li>
                    <li style="padding-left: 2rem; font-size: 24px; color: green;">PRICE: ₹<?php echo $get_product['0']['price'] ?></li>
                </ul>
                <p style="margin-bottom: 20px; font-size: 1.3rem;"><span style="font-weight: bold;">Ingredients:</span> <?php echo $get_product['0']['ingredients'] ?></p>
            <div style="margin-bottom: 20px; font-size: 1.3rem;">
                <p><span style="font-weight: bold;">Availability:</span> In Stock</p>
            </div>
            <div style="margin-bottom: 20px; font-size: 1.3rem;">
                <p><span style="font-weight: bold;">Qty:</span>
                    <select id="qty">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10</option>
                    </select>
                </p>
            </div>
            <div style="margin-bottom: 35px; font-size: 1.3rem;">
                <p><span style="font-weight: bold;">Categories:</span></p>
                <ul style="list-style: none; padding: 0;">
                    <li><a href="categories.php?id=<?php echo $get_product['0']['categories_id'] ?>" style="text-decoration: none; color: #3498db;"><?php echo $get_product['0']['categories'] ?></a></li>
                </ul>
            </div>
            <a href="javascript:void(0)" onclick="manage_cart('<?php echo $get_product['0']['id'] ?>','add')" class="btn-2">Add to cart</a>
            <form action="reviews.php?id=<?php echo $get_product['0']['id'] ?>" method="post">
                <button class="btn-3" type="submit">Rate this Product</button>
            </form>
        </div>
    </div>
</section>

<section style="padding: 50px 0; background-color: #f7f7f7; font-size: 1.3rem;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div style="border-bottom: 1px solid #ddd; padding-bottom: 10px; margin-bottom: 20px;">
                    <ul style="list-style: none; padding: 0; margin: 0;">
                        <li style="display: inline; margin-right: 20px;"><a href="#" style="text-decoration: none; color: #333; font-weight: bold;">Description</a></li>
                    </ul>
                </div>
                <div>
                    <div>
                        <div>
                            <div style="margin-bottom: 4rem; padding: 20px; background-color: #fff; border: 1px solid #ddd;">
                                <?php echo $get_product['0']['description'] ?>
                            </div>
                        </div>
                        <h3>Reviews:</h3></br>
                        <ul>
                            <?php
                            // Query to retrieve the reviews and ratings
                            $rating_sql = "SELECT rating, COUNT(*) as count 
                                            FROM reviews 
                                            WHERE product_id = $product_id 
                                            GROUP BY rating";
                            $rating_result = mysqli_query($con, $rating_sql);

                            $ratings = [0, 0, 0, 0, 0];
                            while ($rating = mysqli_fetch_assoc($rating_result)) {
                                $ratings[$rating['rating']] = $rating['count'];
                            }

                            // Query to retrieve the total number of reviews
                            $total_reviews_sql = "SELECT COUNT(*) as count FROM reviews WHERE product_id = $product_id";
                            $total_reviews_result = mysqli_query($con, $total_reviews_sql);
                            $total_reviews = mysqli_fetch_assoc($total_reviews_result)['count'];

                            if ($total_reviews > 0) {
                                // Display the number of ratings for each star level
                                echo "<ul style='list-style: none; padding: 0; margin: 0;'>";
                                for ($i = 5; $i >= 1; $i--) {
                                    $count = $ratings[$i];
                                    $width = $count > 0? ($count / $total_reviews) * 100 : 0;
                                    $color = '';
                                    switch ($i) {
                                        case 1:
                                            $color = 'red';
                                            break;
                                        case 2:
                                            $color = '#FFBF00';
                                            break;
                                        default:
                                            $color = '#4CAF50';
                                    }
                                    echo "<li style='display: block; margin-right: 10px; max-width: 14%;'>";
                                    echo "<span style='font-size: 14px;'>". $i. " stars: ". $count. "</span>";
                                    echo "<div class='loading-bar'>";
                                    echo "<div class='loading-bar-inner' style='width: ". $width. "%; background-color: ". $color. ";'></div>";
                                    echo "</div>";
                                    echo "</li>";
                                }
                                echo "</ul>";
                            }
                            // Query to retrieve the reviews
                            $review_sql = "SELECT r.review, r.rating, u.name 
                                            FROM reviews r 
                                            JOIN users u ON r.user_id = u.id 
                                            WHERE r.product_id = $product_id
                                            ORDER BY r.id DESC
                                            LIMIT 3";
                            $review_result = mysqli_query($con, $review_sql);

                            if (mysqli_num_rows($review_result) > 0) {
                                while ($review = mysqli_fetch_assoc($review_result)) {
                                    echo "<br><li>";
                                    echo "<strong>". $review['name']. "</strong>";
                                    echo "<p>". $review['review']. "</p>";
                                    //echo "<p>Rating: ". $review['rating']. "/5</p>";
                                    echo "</li></br>";
                                }
                            } else {
                                echo "<li style='font-weight: 400; margin-top: 2rem;'>No reviews yet.</li>";
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Product Description -->
<?php require('footer.php') ?>