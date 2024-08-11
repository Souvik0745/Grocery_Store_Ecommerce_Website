<?php require('top.php'); ?>

<style>
header {
    background-color: #343a40;
    color: #fff;
    padding: 30px;
    text-align: center;
    border-bottom: 5px solid #007bff;
}

.hero {
    max-width: 800px;
    margin: 0 auto;
    margin-top: 5rem;
    padding: 30px;
}

.hero img {
    width: 100%;
    height: auto;
    border-radius: 10px;
}

.hero h1 {
    font-size: 36px;
    font-weight: bold;
    margin-top: 30px;
}

main {
    display: flex;
    justify-content: center;
    padding: 30px;
}

article {
    max-width: 800px;
    margin: 0 auto;
    background-color: #fff;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
}

h2 {
    font-size: 24px;
    font-weight: bold;
    color: #130f40;
    margin-top: 0;
}

section {
    margin-bottom: 30px;
}

h3 {
    font-size: 20px;
    font-weight: bold;
    color: #130f40;
    margin-top: 0;
}

img {
    width: 100%;
    height: auto;
    border-radius: 10px;
    margin: 15px 0;
}

p {
    font-size: 16px;
    margin-bottom: 20px;
}
</style>

<body>
    <header>
        <div class="hero">
            <img src="image/img1.jpg" alt="Fresh Vegetables">
            <h1>Learn how to select the best vegetables for your meals</h1>
        </div>
    </header>
    <main>
        <article>
            <h2>5 Tips for Choosing the Freshest Products</h2>
            <p>Selecting the freshest vegetables can make a significant difference in your meals' taste and nutritional value. Here are five tips to help you choose the best produce:</p>
            <section>
                <h3>1. Check the Color</h3>
                <img src="image/img2.jpg" alt="Colorful Vegetables">
                <p>Vibrant colors often indicate freshness and high nutrient content. Look for deep, rich greens, reds, and yellows.</p>
            </section>
            <section>
                <h3>2. Feel the Texture</h3>
                <img src="image/img3.jpeg" alt="Feeling Vegetables">
                <p>Fresh vegetables should be firm and free from soft spots or bruises. Gently squeeze the vegetable to ensure it feels solid and fresh.</p>
            </section>
            <section>
                <h3>3. Smell the Produce</h3>
                <img src="image/img4.jpg" alt="Smelling Vegetables">
                <p>Fresh vegetables should have a mild, pleasant scent. Avoid produce with a strong, off-putting odor, which may indicate spoilage.</p>
            </section>
            <section>
                <h3>4. Look for Organic Options</h3>
                <img src="image/img5.jpg" alt="Organic Vegetables">
                <p>Organic vegetables are often fresher and contain fewer pesticides. Check for organic certification labels.</p>
            </section>
            <section>
                <h3>5. Seasonal and Local is Best</h3>
                <img src="image/img6.jpg" alt="Seasonal and Local Vegetables">
                <p>Buying seasonal and locally grown vegetables ensures you're getting produce at its peak freshness. Visit farmers' markets for the best selection.</p>
            </section>
        </article>
    </main>
</body>
<?php require('footer.php'); ?>