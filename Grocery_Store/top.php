<?php
require('connection.inc.php');
require('functions.php');
require('add_to_cart.inc.php');
$cat_res = mysqli_query($con, "select * from categories where status=1 order by categories asc");
$cat_arr = array();
while ($row = mysqli_fetch_assoc($cat_res)) {
	$cat_arr[] = $row;
}
$obj = new add_to_cart();
$totalProduct = $obj->totalProduct();

$script_name = $_SERVER['SCRIPT_NAME'];
$script_name_arr = explode('/', $script_name);
$mypage = $script_name_arr[count($script_name_arr) - 1];
$meta_title = "SD Store";
if ($mypage == 'index.php') {
	$meta_title = 'SD Store - Home';
}
if ($mypage == 'categories.php') {
	$meta_title = 'SD Store - Categories';
}
if ($mypage == 'product.php') {
	$meta_title = 'SD Store - Product';
}
if ($mypage == 'about.php') {
	$meta_title = 'SD Store - About';
}
if ($mypage == 'blogs.php') {
	$meta_title = 'SD Store - Blogs';
}
if ($mypage == 'login.php') {
	$meta_title = 'SD Store - Login';
}
if ($mypage == 'register.php') {
	$meta_title = 'SD Store - Register';
}
if ($mypage == 'geneatePDF.php') {
	$meta_title = 'SD Store - Invoice';
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $meta_title ?></title>
	<link rel="icon" type="image/icon" href="admin/images/logo2.png">
	<!--Font awesome-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
	<!--Font awesome-->
	<!--CSS link-->
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<!--CSS link-->
	<!--responsive meta tag-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!--responsive meta tag-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<style>
  .dropdown2 {
    position: absolute;
    background-color: #f9f9f9;
    padding: 10px;
    display: none;
  }
  .dropdown2 li {
    margin: 0;
    padding: 10px;
    border-bottom: 1px solid #ccc;
  }
  .dropdown2 li:last-child {
    border-bottom: none;
  }
  .account .dropdown2 a {
    font-size: 1.5rem;
    color: #333;
    text-decoration: none;
  }
  @media only screen and (max-width: 768px) {
    .dropdown2 {
      font-size: 1.4rem;
    }
  }
  @media only screen and (max-width: 480px) {
    .dropdown2 {
      font-size: 1.2rem;
    }
  }
  .account:hover + .dropdown2 {
    display: block;
  }
</style>
</head>

<body>
	<!--Header-->
	<header class="header">
		<a href="index.php" class="logo"><i class="fa fa-shopping-bag"></i> SD Store</a>
		<nav class="navbar">
			<ul>
				<li><a class="navlink" href="index.php">Home</a></li>
				<li><a class="navlink">Categories ▾</a>
					<ul class="dropdown">
						<?php
						foreach ($cat_arr as $list) {
						?>
							<li><a class="navlink1" href="categories.php?id=<?php echo $list['id'] ?>"><?php echo $list['categories'] ?></a></li>
						<?php
						}
						?>
					</ul>
				</li>
				<li><a class="navlink" href="about.php">About Us</a></li>
				<li><a class="navlink" href="blogs.php">Blogs</a></li>
			</ul>
		</nav>
		<div class="buttons">
			<div class="icons">
				<div class="fa fa-bars" id="menu-btn"></div>
				<div class="fa fa-search" id="search-btn"></div>
				<div id="cart-btn" onclick="window.location='cart.php'">
					<a class="cart-bg" href="cart.php"><i class="fa fa-shopping-cart"></i></a>
					<a><span class="sh_cart"><?php echo $totalProduct ?></span></a>
				</div>
				<?php if (isset($_SESSION['USER_LOGIN'])) { ?>
					<ul>
					<li>
						<a class="account"><?php echo trim(substr($_SESSION['USER_NAME'], 0, strpos($_SESSION['USER_NAME'], ' '))) ?>▾</a>
						<ul class="dropdown2">
						<li><a href="profile.php">Profile</a></li>
						<li><a href="my_order.php">My Orders</a></li>
						<li><a href="logout.php">Logout</a></li>
						</ul>
					</li>
					</ul>
				<?php } else {
				echo '<a style="margin-left: 1rem;" href="login.php">Login</a>';
				} ?>
			</div>
		</div>
		<form action="search.php" class="search-form">
			<input type="search" id="search-box" name="str" placeholder="search here...">
			<button type="submit" class="fa fa-search"></button>
		</form>
	</header>
	<!--Header-->