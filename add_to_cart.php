<?php
include("partials/header.php");

$db = new Database();
$conn = $db->getConnection();
$auth = new Auth($db);
$user_id = $auth->getUserId();


$product_id = $_POST['product_id'];
if (!isset($_SESSION['cart'])){
    $_SESSION['cart'] = [];
}

if (isset($_SESSION['cart'][$product_id])){
    $_SESSION['cart'][$product_id]+=1;
} else{
    $_SESSION['cart'][$product_id] =1;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id'])){
    $product_id = (int)$_POST['product_id'];
    

    $stmt = $conn->prepare("SELECT cart_id FROM cart WHERE user_id = :user_id");
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->execute();
    $cart = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if (!empty($cart)){
    $cart_id = $cart['cart_id'];
    }else{
        $stmt = $conn->prepare("INSERT INTO cart (user_id) VALUES (:user_id)");
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();

        $stmt = $conn->prepare("SELECT cart_id FROM cart WHERE user_id = :user_id");
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();
        $cart = $stmt->fetch(PDO::FETCH_ASSOC);
        $cart_id = $cart['cart_id'];
    }

    $stmt = $conn->prepare("SELECT quantity FROM cart_items WHERE cart_id = :cart_id AND product_id = :product_id");
    $stmt->bindParam(':cart_id', $cart_id, PDO::PARAM_INT);
    $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
    $stmt->execute();
    $item = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($item){
        $stmt = $conn->prepare("UPDATE cart_items SET quantity = quantity +1 WHERE cart_id = :cart_id AND product_id = :product_id");
        $stmt->bindParam(':cart_id', $cart_id, PDO::PARAM_INT);
        $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
        $stmt->execute();
    } else{
        $stmt = $conn->prepare("INSERT INTO cart_items (cart_id, product_id, quantity) VALUES (:cart_id, :product_id, 1)");
        $stmt->bindParam(':cart_id', $cart_id, PDO::PARAM_INT);
        $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
        $stmt->execute();
    }
}

header('Location: cart.php');
exit;
?>
