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
            <img src="image/COVER3.jpeg" alt="Fresh Vegetables">
            <h1>Discover the advantages of incorporating organic foods into your diet</h1>
        </div>
    </header>
    <main>
        <article>
            <h2>Why Choose Organic?</h2>
            <p>Eating organic foods can have a significant impact on your health, the environment, and the economy. Here are some of the benefits of incorporating organic foods into your diet:</p>
            <section>
                <h3>1. Higher Nutrient Content</h3>
                <img src="image/b-i1.jpeg" alt="Colorful Vegetables">
                <p>Organic foods tend to have higher levels of essential vitamins, minerals, and antioxidants compared to conventionally grown produce.</p>
            </section>
            <section>
                <h3>2. Lower Pesticide Exposure</h3>
                <img src="image/b-i2.jpeg" alt="Feeling Vegetables">
                <p>Organic farming practices avoid the use of synthetic pesticides, reducing the risk of exposure to harmful chemicals.</p>
            </section>
            <section>
                <h3>3. Environmental Benefits</h3>
                <img src="image/b-i3.jpeg" alt="Smelling Vegetables">
                <p>Organic farming promotes sustainable agriculture practices, conserving water, reducing soil erosion, and preserving biodiversity.</p>
            </section>
            <section>
                <h3>4. Supports Local Communities</h3>
                <img src="image/b-i4.jpeg" alt="Organic Vegetables">
                <p>Buying organic produce from local farmers supports the local economy, promotes community development, and preserves rural livelihoods.</p>
            </section>
            <section>
                <h3>5. Better Taste and Texture</h3>
                <img src="image/b-i5.jpeg" alt="Seasonal and Local Vegetables">
                <p>Organic produce is often picked at the peak of freshness, resulting in better taste, texture, and overall eating experience.</p>
            </section>
        </article>
    </main>
</body>
<?php require('footer.php'); ?>