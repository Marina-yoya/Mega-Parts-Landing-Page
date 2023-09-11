<?php
require_once 'config.php';

if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];

    $query = "DELETE FROM products WHERE product_id = ?";
    $stmt = $db->prepare($query);
    $stmt->execute([$product_id]);
    header("Location: my_products.php");
    exit();
} 
?>
