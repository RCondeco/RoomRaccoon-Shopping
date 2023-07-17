<?php
class ShoppingListController {
    public function index() {
        $shoppingListModel = new ShoppingListModel();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['add'])) {
                // Handle add item form submission
                $name = $_POST['item'];
                $image = $_FILES['image'];

                $shoppingListModel->addItem($name, $image);

                exit();
            } elseif (isset($_POST['update'])) {
                // Handle update item form submission
                // ...
            } elseif (isset($_POST['delete'])) {
                // Handle delete item form submission
                // ...
            }
        }

        $items = $shoppingListModel->getAllItems();

        include '../views/index.php';
    }
}
?>