<?php
include("partials/header.php");

$db = new Database();
$product = new Product($db);
$auth = new Auth($db);
$auth->requireLogin();

$cart = $_SESSION['cart'] ?? [];
if (empty($cart)){
    echo '<p class="ml3">Your cart is currently empty.</p>';
    echo '<a class="underline ml3 cart-btn1" href="shop.php">Back to Shop</a><br><br>';
}else{
    echo '<h1 class="ml3">Your Order</h1>';
}
$total=0;
?>

<table class="ml3">
    <tr>
        <th class="admin-table">Preview</th>
        <th class="admin-table">Product</th>
        <th class="admin-table">Quantity</th>
        <th class="admin-table">Price</th>
        <th class="admin-table">Subtotal</th>
    </tr>
    <?php foreach ($cart as $product_id => $quantity): 
        $item = $product->show($product_id); 
        $subtotal = $item['price'] * $quantity;
        $total += $subtotal;
    ?>
    <tr>
        <td class="admin-table"><?php echo '<div class="product-icon"><img src="'.$item['url'].'"></div>'?></td>
        <td class="admin-table"><?php echo $item['name']; ?></td>
        <td class="admin-table"><?php echo $quantity; ?></td>
        <td class="admin-table"><?php echo $item['price']; ?>€</td>
        <td class="admin-table"><?php echo $subtotal; ?>€</td>
    </tr>
    <?php endforeach; ?>
</table>
<br>
<p class="ml3 total">Total: <?php echo $total; ?>€</p><br><hr>
<form class="ml3 contact-admin" action="process_checkout.php" method="POST">
    <input type="text" name="fullname" placeholder="Full Name" required><br>
    <input type="email" name="email" placeholder="Email Address" required><br>
    <select name="country" required>
        <option value="" disabled selected>Select Country</option>
        <option value="SK">Slovakia</option>
        <option value="CZ">Czech Republic</option>
        <option value="UK">United Kingdom</option>
    </select><br>
    <input type="text" name="state" placeholder="State/Province" required><br>
    <input type="text" name="city" placeholder="City" required><br>
    <input type="text" name="street" placeholder="Street Address" required><br>
    <input type="text" name="zip" placeholder="ZIP Code" required><br>

    <select name="payment_method" required>
        <option value="" disabled selected>Select Payment Method</option>
        <option value="cash">Cash on Delivery</option>
    </select><br>
        <select name="shipping_method" required>
        <option value="" disabled selected>Select Shipping Method</option>
        <option value="courier">Courier</option>
        <option value="postal">Postal Service</option>
        <option value="pickup">Pickup</option>
    </select><br><br>
    <input type="hidden" name="total" value="<?php echo $total; ?>">
    <button type="submit">Place Order</button>
</form>
<br>
<?php
include ("partials/footer.php");
?>