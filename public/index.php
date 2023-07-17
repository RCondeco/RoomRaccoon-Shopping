<?php
require_once '../app/config.php';
require_once '../app/Database.php';
require_once '../models/ShoppingListModel.php';
require_once '../controllers/ShoppingListController.php';

$shoppingListController = new ShoppingListController();
$shoppingListController->index();
?>