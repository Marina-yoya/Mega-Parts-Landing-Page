<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
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

    
    $query = "INSERT INTO products (part_name, img_url, part_description, category, price, created_at) VALUES (?, ?, ?, ?, ?, NOW())";
    $stmt = $db->prepare($query);
    $stmt->execute([$partName, $imgUrl, $partDescription, $category, $price]);

    
    if ($stmt->rowCount() > 0) {
        echo "Product added successfully.";
    } else {
        echo "Error adding the product.";
    }
}
?>
