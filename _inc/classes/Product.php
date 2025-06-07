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

    public function store($name, $url, $category, $price) {
        $stmt = $this->db->prepare("INSERT INTO products (name, url, category, price) VALUES (:name, :url, :category, :price)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':url', $url);
        $stmt->bindParam(':category', $category);
        $stmt->bindParam(':price', $price);
        return $stmt->execute();
    }

    public function destroy($id) {
        $stmt = $this->db->prepare("DELETE FROM products WHERE ID = :id");
        return $stmt->execute([$id]);
    }
    public function show($id){
        $stmt = $this->db->prepare("SELECT * FROM products WHERE ID = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function edit($id, $name, $url, $category, $price) {
        $stmt = $this->db->prepare("UPDATE products SET name = :name, url = :url, category = :category, price = :price WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':url', $url, PDO::PARAM_STR);
        $stmt->bindParam(':category', $category, PDO::PARAM_STR);
        $stmt->bindParam(':price', $price, PDO::PARAM_INT);
        return $stmt->execute();
    }
}