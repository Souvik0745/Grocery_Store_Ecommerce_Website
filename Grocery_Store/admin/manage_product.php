<?php

require('connection.inc.php');
require('functions.inc.php');
if(!isset($_SESSION['ADMIN_LOGIN'])){
   header('location:login.php');
	die();
}

$categories_id='';

$name='';

$mrp='';

$price='';

$qty='';

$image='';

$ingredients='';

$description='';

$meta_title	='';

$meta_desc	='';

$meta_keyword='';

$best_seller='';



$msg='';

$image_required='required';

if(isset($_GET['id']) && $_GET['id']!=''){

	$image_required='';

	$id=get_safe_value($con,$_GET['id']);

	$res=mysqli_query($con,"select * from product where id='$id'");

	if (!$res) {
		echo "Internal Error: Unable to retrieve product";
		die();
	}

	$check=mysqli_num_rows($res);

	if($check>0){

		$row=mysqli_fetch_assoc($res);

		$categories_id=$row['categories_id'];

		$name=$row['name'];

		$mrp=$row['mrp'];

		$price=$row['price'];

		$qty=$row['qty'];

		$ingredients=$row['ingredients'];

		$description=$row['description'];

		$meta_title=$row['meta_title'];

		$meta_desc=$row['meta_desc'];

		$meta_keyword=$row['meta_keyword'];

		$best_seller=$row['best_seller'];

	}else{

		header('location:product.php');

		die();

	}

}



if(isset($_POST['submit'])){

	$categories_id=get_safe_value($con,$_POST['categories_id']);

	$name=get_safe_value($con,$_POST['name']);

	$mrp=get_safe_value($con,$_POST['mrp']);

	$price=get_safe_value($con,$_POST['price']);

	$qty=get_safe_value($con,$_POST['qty']);

	$ingredients=get_safe_value($con,$_POST['ingredients']);

	$description=get_safe_value($con,$_POST['description']);

	$meta_title=get_safe_value($con,$_POST['meta_title']);

	$meta_desc=get_safe_value($con,$_POST['meta_desc']);

	$meta_keyword=get_safe_value($con,$_POST['meta_keyword']);

	$best_seller=get_safe_value($con,$_POST['best_seller']);

	

	$res=mysqli_query($con,"select * from product where name='$name'");

	if (!$res) {
		echo "Internal Error: Unable to check for duplicate product";
		die();
	}

	$check=mysqli_num_rows($res);

	if($check>0){

		if(isset($_GET['id']) && $_GET['id']!=''){

			$getData=mysqli_fetch_assoc($res);

			if($id==$getData['id']){

			

			}else{

				$msg="Product already exist";

			}

		}else{

			$msg="Product already exist";

		}

	}

	

	if(isset($_GET['id']) && $_GET['id']==0){

		if($_FILES['image']['type']!='image/png' && $_FILES['image']['type']!='image/jpg' && $_FILES['image']['type']!='image/jpeg'){

			$msg="Please select only png,jpg and jpeg image formate";

		}

	}else{

		if($_FILES['image']['type']!=''){

				if($_FILES['image']['type']!='image/png' && $_FILES['image']['type']!='image/jpg' && $_FILES['image']['type']!='image/jpeg'){

				$msg="Please select only png,jpg and jpeg image formate";

			}

		}

	}

	

	if($msg==''){

		if(isset($_GET['id']) && $_GET['id']!=''){

			if($_FILES['image']['name']!=''){

				$image=rand(111111111,999999999).'_'.$_FILES['image']['name'];

				move_uploaded_file($_FILES['image']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$image);

				$update_sql="update product set categories_id='$categories_id',name='$name',mrp='$mrp',price='$price',qty='$qty',ingredients='$ingredients',description='$description',meta_title='$meta_title',meta_desc='$meta_desc',meta_keyword='$meta_keyword',image='$image',best_seller='$best_seller' where id='$id'";

				if (!mysqli_query($con, $update_sql)) {
					echo "Internal Error: Unable to update product";
					die();
				}

			}else{

				$update_sql="update product set categories_id='$categories_id',name='$name',mrp='$mrp',price='$price',qty='$qty',ingredients='$ingredients',description='$description',meta_title='$meta_title',meta_desc='$meta_desc',meta_keyword='$meta_keyword',best_seller='$best_seller' where id='$id'";

				if (!mysqli_query($con, $update_sql)) {
					echo "Internal Error: Unable to update product";
					die();
				}

			}

		}else{

			$image=rand(111111111,999999999).'_'.$_FILES['image']['name'];

			move_uploaded_file($_FILES['image']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$image);

			$insert_sql="insert into product(categories_id,name,mrp,price,qty,ingredients,description,meta_title,meta_desc,meta_keyword,status,image,best_seller) values('$categories_id','$name','$mrp','$price','$qty','$ingredients','$description','$meta_title','$meta_desc','$meta_keyword',1,'$image','$best_seller')";

			if (!mysqli_query($con, $insert_sql)) {
				echo "Internal Error: Unable to insert product";
				die();
			}

		}

		header('location:product.php');

		die();

	}

}

?>
<!doctype html>
<html class="no-js" lang="">
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Dashboard Page</title>
      <link rel="icon" type="image/icon" href="images/logo2.png">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="assets/css/normalize.css">
      <link rel="stylesheet" href="assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="assets/css/font-awesome.min.css">
      <link rel="stylesheet" href="assets/css/themify-icons.css">
      <link rel="stylesheet" href="assets/css/pe-icon-7-filled.css">
      <link rel="stylesheet" href="assets/css/flag-icon.min.css">
      <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
      <link rel="stylesheet" href="assets/css/style.css">
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
   </head>
   <body>
      <aside id="left-panel" class="left-panel">
         <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
               <ul class="nav navbar-nav">
                  <li class="menu-title">Menu</li>
                  <li class="menu-item-has-children dropdown">
                     <a href="categories.php" > Categories Manager</a>
                  </li>
                  <li class="menu-item-has-children dropdown">
                     <a href="product.php" > Products Manager</a>
                  </li>
				  <li class="menu-item-has-children dropdown">
                     <a href="order_master.php" > Order Master</a>
                  </li>
				  <li class="menu-item-has-children dropdown">
                     <a href="users.php" > Users</a>
                  </li>
				  <li class="menu-item-has-children dropdown">
                     <a href="contact_us.php" > Contact Us</a>
                  </li>
				  
               </ul>
            </div>
         </nav>
      </aside>
      <div id="right-panel" class="right-panel">
         <header id="header" class="header">
            <div class="top-left">
               <div class="navbar-header">
                  <a class="navbar-brand" href="index.php"><img src="images/logo.png" alt="Logo"></a>
                  <a class="navbar-brand hidden" href="index.php"><img src="images/logo2.png" alt="Logo"></a>
                  <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
               </div>
            </div>
            <div class="top-right">
               <div class="header-menu">
                  <div class="user-area dropdown float-right">
                     <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Admin ▾</a>
                     <div class="user-menu dropdown-menu">
                        <a class="nav-link" href="logout.php"><i class="fa fa-power-off"></i>Logout</a>
                     </div>
                  </div>
               </div>
            </div>
         </header>

<div class="content pb-0">

            <div class="animated fadeIn">

               <div class="row">

                  <div class="col-lg-12">

                     <div class="card">

                        <div class="card-header"><strong>Product</strong><small> Form</small></div>

                        <form method="post" enctype="multipart/form-data">

							<div class="card-body card-block">

							   <div class="form-group">

									<label for="categories" class=" form-control-label">Categories</label>

									<select class="form-control" name="categories_id">

										<option>Select Category</option>

										<?php

										$res=mysqli_query($con,"select id,categories from categories order by categories asc");

										while($row=mysqli_fetch_assoc($res)){

											if($row['id']==$categories_id){

												echo "<option selected value=".$row['id'].">".$row['categories']."</option>";

											}else{

												echo "<option value=".$row['id'].">".$row['categories']."</option>";

											}

											

										}

										?>

									</select>

								</div>

								<div class="form-group">

									<label for="categories" class=" form-control-label">Product Name</label>

									<input type="text" name="name" placeholder="Enter product name" class="form-control" required value="<?php echo $name?>">

								</div>

								<div class="form-group">

									<label for="categories" class=" form-control-label">Best Seller</label>

									<select class="form-control" name="best_seller" required>

										<option value=''>Select</option>

										<?php

										if($best_seller==1){

											echo '<option value="1" selected>Yes</option>

												<option value="0">No</option>';

										}elseif($best_seller==0){

											echo '<option value="1">Yes</option>

												<option value="0" selected>No</option>';

										}else{

											echo '<option value="1">Yes</option>

												<option value="0">No</option>';

										}

										?>

									</select>

								</div>

								<div class="form-group">

									<label for="categories" class=" form-control-label">MRP</label>

									<input type="text" name="mrp" placeholder="Enter product mrp" class="form-control" required value="<?php echo $mrp?>">

								</div>

								<div class="form-group">

									<label for="categories" class=" form-control-label">Price</label>

									<input type="text" name="price" placeholder="Enter product price" class="form-control" required value="<?php echo $price?>">

								</div>

								<div class="form-group">

									<label for="categories" class=" form-control-label">Qty</label>

									<input type="text" name="qty" placeholder="Enter qty" class="form-control" required value="<?php echo $qty?>">

								</div>

								<div class="form-group">

									<label for="categories" class=" form-control-label">Image</label>

									<input type="file" name="image" class="form-control" <?php echo  $image_required?>>

								</div>

								<div class="form-group">

									<label for="categories" class=" form-control-label">Ingredients/Nutrition</label>

									<textarea name="ingredients" placeholder="Enter product ingredients/nutrition" class="form-control" required><?php echo $ingredients?></textarea>

								</div>

								<div class="form-group">

									<label for="categories" class=" form-control-label">Description</label>

									<textarea name="description" placeholder="Enter product description" class="form-control" required><?php echo $description?></textarea>

								</div>

								<div class="form-group">

									<label for="categories" class=" form-control-label">Meta Title</label>

									<textarea name="meta_title" placeholder="Enter product meta title" class="form-control"><?php echo $meta_title?></textarea>

								</div>

								<div class="form-group">

									<label for="categories" class=" form-control-label">Meta Description</label>

									<textarea name="meta_desc" placeholder="Enter product meta description" class="form-control"><?php echo $meta_desc?></textarea>

								</div>

								<div class="form-group">

									<label for="categories" class=" form-control-label">Meta Keyword</label>

									<textarea name="meta_keyword" placeholder="Enter product meta keyword" class="form-control"><?php echo $meta_keyword?></textarea>

								</div>

							   <button id="payment-button" name="submit" type="submit" class="btn btn-lg btn-info btn-block">

							   <span id="payment-button-amount">Submit</span>

							   </button>

							   <div class="field_error"><?php echo $msg?></div>

							</div>

						</form>

                     </div>

                  </div>

               </div>

            </div>

         </div>

<?php require('footer.inc.php'); ?>