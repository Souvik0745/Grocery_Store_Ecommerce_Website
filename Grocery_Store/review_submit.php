<?php
include('connection.inc.php');
if (isset($_SESSION['USER_LOGIN'])) {
    $user_id = $_SESSION['USER_ID'];
} else {
    header('Location: login.php');
    exit;
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST['rating']) || empty($_POST['review'])) {
        echo "<script>
            alert('Rating and review cannot be empty!');
            window.location.href = 'my_order.php';
            </script>";
        exit;
    }
    $rating = mysqli_real_escape_string($con, $_POST['rating']);
    $review = mysqli_real_escape_string($con, $_POST['review']);
    $product_id = mysqli_real_escape_string($con, $_POST['product_id']);
    $sql = "INSERT INTO reviews (user_id, order_id, product_id, rating, review) VALUES ($user_id, (SELECT id FROM orders WHERE user_id = $user_id LIMIT 1), $product_id, '$rating', '$review')";
    
    if (mysqli_query($con, $sql)) {
        header('Location: product.php?id=' . $product_id);
        exit;
    } else {
        echo "Error: " . mysqli_error($con);
    }
} else {
    header('Location: product.php?id=' . $_POST['product_id']);
    exit;
}
?>