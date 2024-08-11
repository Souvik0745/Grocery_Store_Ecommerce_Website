<?php
require('top.php');

$str = mysqli_real_escape_string($con, $_GET['str']);
if ($str != '') {
    $get_product = get_product($con, '', '', '', $str);
} else {
?>
    <script>
        window.location.href = 'index.php';
    </script>
<?php
}
?>
<style>
    body {

        background-color: #eee;
        line-height: 1.6;
    }
    .container {
        max-width: 1170px;
        margin: 0 auto;
        padding: 20px;
    }
    .product-header {
        background: #fff;
        padding: 20px;
        margin-top: 8rem;
        margin-bottom: 10px;
        border-radius: .5rem;
    }
    .product-grid {
        display: flex;
        flex-wrap: wrap;
        margin-top: 2rem;
        justify-content: center;
        background-color: #fff;
        padding: 10px;
        box-shadow: var(--box-shadow);
        border-radius: .5rem;
    }
    .product-header span {
        color: #333;
        font-weight: bold;
        font-size: 2.5rem;
    }
    .product-list {
        display: contents;
        margin-top: 20px;
        margin-left: auto;
        margin-right: auto;
    }
    .product-item {
        width: auto;
        padding: 10px;
        margin: 8px;
        box-sizing: border-box;
        border: 1px solid #e1e1e1;
        border-radius: .5rem;
    }
    .product-image {
        margin-bottom: 15px;
    }
    .product-image img {
        width: 100%;
        height: auto;
    }
    .product-info {
        text-align: center;
    }
    .product-info h4 {
        font-size: 16px;
        margin-bottom: 10px;
    }
    .product-info h4 a {
        color: #130f40;
    }
    .product-info ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    .product-info li {
        color: #999;
        font-size: 14px;
    }
    .product-info li:nth-child(2) {
        color: #333;
    }
    .btn {
        background-color: green;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    .btn:hover {
        background-color: #035400;
    }

    @media (max-width: 992px) {
        .product-item {
            width: 33.33%;
        }

        .product-header {
            margin-top: 6.7rem;
        }
    }

    @media (max-width: 768px) {
        .product-item {
            width: 50%;
        }

        .product-header {
            margin-top: 6rem;
        }
    }

    @media (max-width: 480px) {
        .product-item {
            width: 100%;
            display: block;
        }

        .product-header {
            margin-top: 5rem;
        }
    }
</style>
<section>
    <div class="container">
        <div class="product-header">
            <span><?php echo "Showing results for '$str'" ?></span>
        </div>
        <div class="product-grid">
            <?php if (count($get_product) > 0) { ?>
                <div class="product-list">
                    <?php foreach ($get_product as $list) { ?>
                        <div class="product-item">
                            <div class="product-image">
                                <a href="product.php?id=<?php echo $list['id'] ?>">
                                    <img src="<?php echo PRODUCT_IMAGE_SITE_PATH . $list['image'] ?>" alt="product images">
                                </a>
                            </div>
                            <div class="product-info">
                                <h4><a href="product.php?id=<?php echo $list['id'] ?>"><?php echo $list['name'] ?></a></h4>
                                <ul>
                                    <li>MRP: ₹<?php echo $list['mrp'] ?></li></br>
                                    <li>PRICE: ₹<?php echo $list['price'] ?></li>
                                </ul>
                                <ul>
                                    <li><a class="btn" href="javascript:void(0)" onclick="manage_cart('<?php echo $list['id'] ?>','add')">Add to Cart</i></a></li>
                                </ul>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php } else {
                echo "<p style='font-size: 1.7rem; font-weight: 400;'>Data not found!</p>";
            } ?>
        </div>
    </div>
</section>
<input type="hidden" id="qty" value="1" />
<?php require('footer.php') ?>