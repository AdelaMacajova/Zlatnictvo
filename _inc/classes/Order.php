<?php
class Order {
    private $conn;

    public function __construct(Database $db) {
        $this->conn = $db->getConnection();
    }

    public function index() {
        $stmt = $this->conn->query("SELECT * FROM orders");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createOrder($user_id, $payment_method, $shipping_method, $cart) {
        $stmt = $this->conn->prepare("INSERT INTO orders (user_id, payment_method, shipping_method, created_at) VALUES (:user_id, :payment_method, :shipping_method, CURRENT_TIMESTAMP)");

        $stmt->execute([
        'user_id' => $user_id,
        'payment_method' => $payment_method,
        'shipping_method' => $shipping_method
        ]);

        $order_id = $this->conn->lastInsertId();
        $stmt_item = $this->conn->prepare("INSERT INTO order_items (order_id, product_id, quantity) VALUES (:order_id, :product_id, :quantity)");

    foreach ($cart as $product_id => $quantity) {
        $stmt_item->execute([
            'order_id' => $order_id,
            'product_id' => $product_id,
            'quantity' => $quantity
        ]);
    }
    return $order_id;
    }

    public function destroy($order_id) {
        $statement = $this->conn->prepare("DELETE FROM orders WHERE order_id = :order_id");
        $statement->bindParam(':order_id', $order_id, PDO::PARAM_INT);
        return $statement->execute();
    }
}
?>