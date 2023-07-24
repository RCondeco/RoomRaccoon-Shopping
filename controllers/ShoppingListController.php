<?php
class ShoppingListController {
    public function index() {
        $shoppingListModel = new ShoppingListModel();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['add'])) {
                // Handle add item form submission
                $name = $_POST['item'];
                $price = $_POST['price'];

                $shoppingListModel->addItem($name, $price);
				$_SESSION['success_message'] = "Item added successfully.";
                // Redirect to avoid form resubmission on page refresh
                header("Location: http://rraccoon-shopping.rf.gd/RoomRaccoon-Shopping/public/index.php");
                exit();
            } elseif (isset($_POST['update'])) {
                // Handle update item form submission
                $name = $_POST['edit_item'];
                $price = $_POST['edit_price'];
				$checked = $_POST['check_item'];
				$item_id = $_POST['update'];

				$shoppingListModel->updateItem($name, $price,$checked,$item_id); 
				$_SESSION['success_message'] = "Item updated successfully.";
				
				header("Location: http://rraccoon-shopping.rf.gd/RoomRaccoon-Shopping/public/index.php");
				exit();
            } elseif (isset($_POST['delete'])) {
                // Handle delete item form submission
				$item_id = $_POST['delete'];
				
				$shoppingListModel->deleteItem($item_id);
				$_SESSION['success_message'] = "Item deleted successfully.";
				
				header("Location: http://rraccoon-shopping.rf.gd/RoomRaccoon-Shopping/public/index.php");
				exit();
            }
        }

        $items = $shoppingListModel->getAllItems();

        include '../views/index.php';
    }
}
?>