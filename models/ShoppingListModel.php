<?php
class ShoppingListModel {
    public function getAllItems() {
        $db = Database::connect();

        $query = "SELECT * FROM products Where uID = :uid ";
        $stmt = $db->prepare($query);
		$stmt->bindParam(':uid', $_COOKIE['uid']);
        $stmt->execute();
        $items = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $items;
    }

    public function addItem($name, $price) {
        $db = Database::connect();

        // Insert the item into the database
        $query = "INSERT INTO products (name, price, uID) VALUES (:name, :price, :udi)";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':price', $price);
		$stmt->bindParam(':udi', $_COOKIE['uid']);
        $stmt->execute();
    }
	public function updateItem($name, $price,$checked, $item_id) {
        $db = Database::connect();

        // Update the item into the database
        $query = "UPDATE products SET name=:name, price=:price, checked=:checked WHERE uID = :uID AND id=:id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':checked', $checked);
		$stmt->bindParam(':uID', $_COOKIE['uid']);
		$stmt->bindParam(':id', $item_id);
        $stmt->execute();
    }
	public function deleteItem($item_id) {
        $db = Database::connect();
        // Delete the item from the database
        $query = "DELETE FROM products WHERE uID=:uid AND id=:id";
        $stmt = $db->prepare($query);
		$stmt->bindParam(':uid', $_COOKIE['uid']);
		$stmt->bindParam(':id', $item_id);
        $stmt->execute();
    }
}
?>