<?php
require_once '../app/config.php';
require_once '../app/Database.php';
require_once '../models/Product.php';

$productModel = new Product();
$products = $productModel->getAll();

include '../views/index.php';
?>