<?php

class Product {

    private $db;

    public function __construct(Database $database){
        $this->db = $database->getConnection();
    }

    public function index() {
        $stmt = $this->db->query("SELECT * FROM products");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function store($name, $url, $material, $type, $price) {
        $stmt = $this->db->prepare("INSERT INTO products (name, url, material, type, price) VALUES (:name, :url, :material, :type, :price)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':url', $url);
        $stmt->bindParam(':material', $material);
        $stmt->bindParam(':type', $type);
        $stmt->bindParam(':price', $price);
        return $stmt->execute();
    }

    public function destroy($product_id) {
        $stmt = $this->db->prepare("DELETE FROM products WHERE product_id = :product_id");
        return $stmt->execute([":product_id" => $product_id]);
    }
    public function show($product_id){
        $stmt = $this->db->prepare("SELECT * FROM products WHERE product_id = :product_id");
        $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function edit($product_id, $name, $url, $material, $type, $price) {
        $stmt = $this->db->prepare("UPDATE products SET name = :name, url = :url, material = :material, type = :type, price = :price WHERE product_id = :product_id");
        $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':url', $url, PDO::PARAM_STR);
        $stmt->bindParam(':material', $material, PDO::PARAM_STR);
        $stmt->bindParam(':type', $type, PDO::PARAM_STR);
        $stmt->bindParam(':price', $price, PDO::PARAM_INT);
        return $stmt->execute();
    }
}