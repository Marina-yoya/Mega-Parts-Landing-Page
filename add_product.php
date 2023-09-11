<?php
require_once 'config.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php"); 
        exit();
    }

    $user_id = $_SESSION['user_id'];

    $partName = $_POST['part_name'];
    $imgUrl = $_POST['img_url'];
    $partDescription = $_POST['part_description'];
    $category = $_POST['category'];
    $price = $_POST['price'];

    try {
        $db = new PDO("mysql:host=localhost;dbname=megaparts", "root");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }

    $query = "INSERT INTO products (user_id, part_name, img_url, part_description, category, price, created_at) VALUES (?, ?, ?, ?, ?, ?, NOW())";
    $stmt = $db->prepare($query);
    $stmt->execute([$user_id, $partName, $imgUrl, $partDescription, $category, $price]);

    if ($stmt->rowCount() > 0) {
        header("Location: my_products.php");
        exit();
    } else {
        echo "Error adding the product.";
    }
}
?>
