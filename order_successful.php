<?php
include("partials/header.php");

if (!isset($_GET['order_id'])) {
    echo "<br><p class='ml3 total'>No order information available.</p><br><br>";
    include("partials/footer.php");
    exit;
}
$order_id = htmlspecialchars($_GET['order_id']);
?>

<br>
<h1 class="ml3">Order finished successfully.</h1>
<p class="ml3 total">Your order number: <?php echo $order_id; ?></p>
<a class="ml3 underline cart-btn1" href="shop.php">Back to shop</a><br><br>
<?php
include("partials/footer.php");
?>