<?php
	require('top.php');
?>
<section id="blogs" class="blogs" style="margin-top: 60px; padding: 50px 0; background-color: #f9f9f9;">
    <h1 style="text-align: center; font-size: 30px; color: #130f40; margin-bottom: 20px;">Blogs</h1>
    <div class="box-container">
        <div class="box">
            <img src="image/blog-1.jpg" alt="Fresh products" style="width: 100%; height: auto;">
            <div class="blog-content" style="padding: 20px;">
                <h3 style="font-size: 24px; color: #333;">5 Tips for Choosing the Freshest Products</h3>
                <p style="font-size: 16px; color: #777;">Learn how to select the best vegetables for your meals.</p>
                <button class="btn-4" onclick="document.location='post1.php'">Read More</button>
            </div>
        </div>
        <div class="box">
            <img src="image/blog-2.jpg" alt="Healthy recipes" style="width: 100%; height: auto;">
            <div style="padding: 20px;">
                <h3 style="font-size: 24px; color: #333;">10 Healthy Recipes for Busy Weeknights</h3>
                <p style="font-size: 16px; color: #777;">Quick and nutritious meal ideas to make your weeknights easier.</p>
                <button class="btn-4" onclick="document.location='post2.php'">Read More</button>
            </div>
        </div>
        <div class="box">
            <img src="image/blog-3.jpg" alt="Organic foods" style="width: 100%; height: auto;">
            <div style="padding: 20px;">
                <h3 style="font-size: 24px; color: #333;">The Benefits of Eating Organic Foods</h3>
                <p style="font-size: 16px; color: #777;">Discover the advantages of incorporating organic foods into your diet.</p>
                <button class="btn-4" onclick="document.location='post3.php'">Read More</button>
            </div>
        </div>
    </div>
</section>
<?php require('footer.php'); ?>