<?php
class ShoppingListModel {
    public function getAllItems() {
        $db = Database::connect();

        $query = "SELECT * FROM products";
        $stmt = $db->prepare($query);
        $stmt->execute();
        $items = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $items;
    }

    public function addItem($name, $price, $image) {
        $db = Database::connect();

        // Insert the item into the database
        $query = "INSERT INTO products (name, price, image) VALUES (:name, :price, :image)";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':image', $image);
        $stmt->execute();

        // Move the uploaded image to the assets folder
        $targetDir = '../assets/';
        $targetFile = $targetDir . basename($image['name']);
        move_uploaded_file($image['tmp_name'], $targetFile);
    }
}
?>