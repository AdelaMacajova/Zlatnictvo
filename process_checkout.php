<?php
include("partials/header.php");
$db = new Database();

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    $user_id = null;
}

if (isset($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];
} else {
    $cart = [];
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $payment_method = $_POST['payment_method'];
    $shipping_method = $_POST['shipping_method'];

    $order = new Order($db);
    $order_id = $order->createOrder($user_id, $payment_method, $shipping_method, $cart);
    $_SESSION['cart'] = [];
    
    $stmt = $db->getConnection()->prepare("DELETE FROM cart_items WHERE cart_id = (SELECT cart_id FROM cart WHERE user_id = :user_id)");
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->execute();

    header('Location: order_successful.php?order_id=' . $order_id);
    exit;
}

include("partials/footer.php");
?>