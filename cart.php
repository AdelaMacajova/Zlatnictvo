<?php
include("partials/header.php");


$db = new Database();
$conn = $db->getConnection();
$product = new Product($db);
$auth = new Auth($db);
$auth->requireLogin();
$user_id = $auth->getUserId();
$auth->requireLogin();

$stmt = $conn->prepare("SELECT cart_items.product_id, cart_items.quantity FROM cart_items JOIN cart ON cart_items.cart_id = cart.cart_id WHERE cart.user_id = :user_id");
$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
$stmt->execute();
$cart_items = $stmt->fetchAll(PDO::FETCH_ASSOC);


$_SESSION['cart'] = [];
foreach ($cart_items as $item) {
    $_SESSION['cart'][$item['product_id']] = $item['quantity'];
}

if (isset($_GET['remove'])) {
    $product_id = (int)$_GET['remove'];

    $stmt = $conn->prepare("SELECT cart_id FROM cart WHERE user_id = :user_id");
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->execute();
    $cart = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($cart) {
        $cart_id = $cart['cart_id'];
        $stmt = $conn->prepare("DELETE FROM cart_items WHERE cart_id = :cart_id AND product_id = :product_id");
        $stmt->bindParam(':cart_id', $cart_id, PDO::PARAM_INT);
        $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
        $stmt->execute();
    }

    if (isset($_SESSION['cart'][$product_id])) {
        unset($_SESSION['cart'][$product_id]);
    }

    header('Location: cart.php');
    exit;
}

if (!isset($_GET['redirected'])) {
    header('Location: cart.php?redirected=1');
    exit;
}

$cart = $_SESSION['cart'] ?? [];
$total = 0;
?>
<br>
<h1 class="ml3">Your Cart</h1>

<?php if (empty($cart)): ?>
    <p class="ml3">Your cart is currently empty.</p>
    <a class="underline ml3 cart-btn1" href="shop.php">Back to Shop</a><br><br>
<?php else: ?>
    <table class="ml3">
        <tr>
            <th class="admin-table">Preview</th>
            <th class="admin-table">Product</th>
            <th class="admin-table">Quantity</th>
            <th class="admin-table">Price</th>
            <th class="admin-table">Subtotal</th>
            <th class="admin-table">Action</th>
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
            <td class="admin-table"><a href="cart.php?remove=<?php echo $product_id; ?>">Remove</a></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <br><p class="ml3 total">Total: <?php echo $total; ?>€</p><br><hr>
    <a class="underline ml3 cart-btn1" href="shop.php">Back to Shop</a><br><br>
    <a class="underline ml3 cart-btn2" href="checkout.php">Proceed to Checkout</a><br><br>
<?php endif; ?>

<?php
include("partials/footer.php");
?>