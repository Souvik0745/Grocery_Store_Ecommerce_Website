<?php
  require('top.php');
?>

<!--About Section-->
	<section class="about" id="about">
		<h1 class="h1">About Us</h1>
		<p>Shopping with us is a breeze. Our website allow you to easily browse our catalog, <br>add items to your cart, and schedule deliveries at your convenience.</p>
		<button onclick="document.location='register.php'" class="btn">Sign Up Now</a>
	</section>

	<section class="team">
    <h1 class="heading">Our Team</h1>
    <div class="team-cards">
      <div class="card">
        <div class="card-img">
          <img src="image/john.png">
        </div>
        <div class="card-info">
          <h2 class="card-name">John Doe</h2>
          <p class="card-role">CEO and Founder</p>
          <ul class="t-social">
            <li>
              <a href="https://www.facebook.com/">
                <i class="fa fa-facebook"></i>
              </a>
            </li>
            <li>
              <a href="https://wa.me/1234567890">
                <i class="fa fa-whatsapp"></i>
              </a>
            </li>
            <li>
              <a href="mailto:john@example.com">
                <i class="fa fa-at"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
      <div class="card">
        <div class="card-img">
          <img src="image/jane.png">
        </div>
        <div class="card-info">
          <h2 class="card-name">Jane Smith</h2>
          <p class="card-role">Co-Founder</p>
          <ul class="t-social">
            <li>
              <a href="https://www.facebook.com/">
                <i class="fa fa-facebook"></i>
              </a>
            </li>
            <li>
              <a href="https://wa.me/9876543210">
                <i class="fa fa-whatsapp"></i>
              </a>
            </li>
            <li>
              <a href="mailto:jane@example.com">
                <i class="fa fa-at"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
      <div class="card">
        <div class="card-img">
          <img src="image/justin.png">
        </div>
        <div class="card-info">
          <h2 class="card-name">Justin Langer</h2>
          <p class="card-role">Web Designer</p>
          <ul class="t-social">
            <li>
              <a href="https://www.facebook.com/">
                <i class="fa fa-facebook"></i>
              </a>
            </li>
            <li>
              <a href="https://wa.me/1234509876">
                <i class="fa fa-whatsapp"></i>
              </a>
            </li>
            <li>
              <a href="mailto:justin@example.com">
                <i class="fa fa-at"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>
	<!--About Section-->

  <?php require('footer.php'); ?>