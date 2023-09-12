<?php
require_once 'config.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    $query = "INSERT INTO cart (user_id, product_id, quantity) VALUES (?, ?, ?)";
    $stmt = $db->prepare($query);
    $user_id = $_SESSION['user_id'];
    $stmt->execute([$user_id, $product_id, $quantity]);


    if ($stmt->rowCount() > 0) {
        header("Location: view_all_products.php");
        exit();
    } else {
        header("Location: view_all_products.php?error=1");
        exit();
    }
}

?>