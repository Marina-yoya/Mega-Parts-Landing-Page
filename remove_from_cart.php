<?php
session_start();
require_once 'config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['cart_id'])) {
    $cart_id = $_GET['cart_id'];
    $user_id = $_SESSION['user_id'];

    $query = "SELECT * FROM cart WHERE cart_id = ? AND user_id = ?";
    $stmt = $db->prepare($query);
    $stmt->execute([$cart_id, $user_id]);
    $cart_item = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($cart_item) {
        $query = "DELETE FROM cart WHERE cart_id = ?";
        $stmt = $db->prepare($query);
        $stmt->execute([$cart_id]);

        header("Location: cart.php");
        exit();
    }
}

header("Location: cart.php?error=1");
exit();
?>