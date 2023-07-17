<?php
class ShoppingListModel {
    public function getAllItems() {
        $db = Database::connect();

        $query = "SELECT * FROM shopping_list";
        $stmt = $db->prepare($query);
        $stmt->execute();
        $items = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $items;
    }

    public function addItem($name, $image) {
        $db = Database::connect();

        // Insert the item into the database
        $query = "INSERT INTO shopping_list (name, image) VALUES (:name, :image)";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':image', $image);
        $stmt->execute();

        // Move the uploaded image to the assets folder
        $targetDir = '../assets/';
        $targetFile = $targetDir . basename($image['name']);
        move_uploaded_file($image['tmp_name'], $targetFile);
    }
}
?>
?>