<?php
include("partials/header.php");

$db = new Database();
$product = new Product($db);
$auth = new Auth($db);
$auth->requireLogin();

$cart = $_SESSION['cart'] ?? [];
if (isset($_GET['remove'])) {
    unset($_SESSION['cart'][$_GET['remove']]);
    header('Location: cart.php');
    exit;
}
$total = 0;
?>
<br>
<a class="ml3" style="text-decoration:underline!important;" href="checkout.php">Proceed to Checkout</a>
<h1 class="ml3">Your Cart</h1>

<?php if (empty($cart)): ?>
    <p class="ml3">Your cart is currently empty.</p>
<?php else: ?>
    <table class="ml3">
        <tr>
            <th class="admin-table"></th>
            <th class="admin-table">Name</th>
            <th class="admin-table">Quantity</th>
            <th class="admin-table">Price</th>
            <th class="admin-table">Subtotal</th>
            <th class="admin-table">Action</th>
        </tr>
        <?php foreach ($cart as $id => $quantity): 
            $item = $product->show($id); 
            $subtotal = $item['price'] * $quantity;
            $total += $subtotal;
        ?>
        <tr>
            <td class="admin-table"><?php echo '<div class="product-icon"><img src="'.$item['url'].'"></div>'?></td>
            <td class="admin-table"><?php echo $item['name']; ?></td>
            <td class="admin-table"><?php echo $quantity; ?></td>
            <td class="admin-table"><?php echo $item['price']; ?>€</td>
            <td class="admin-table"><?php echo $subtotal; ?>€</td>
            <td class="admin-table"><a href="cart.php?remove=<?php echo $id; ?>">Remove</a></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <p class="ml3"><strong>Total: <?php echo $total; ?>€</strong></p>
    <a class="ml3" style="text-decoration:underline!important;" href="shop.php">Return</a><br><br>
<?php endif; ?>

<?php
include("partials/footer.php");
?>
