<?php
class Product {
    public function getAll() {
        $db = Database::connect();

        $query = "SELECT * FROM products";
        $stmt = $db->prepare($query);
        $stmt->execute();
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $products;
    }
}
?>