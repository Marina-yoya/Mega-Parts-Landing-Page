<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = $_POST['product_id'];
    $part_name = $_POST['part_name'];
    $img_url = $_POST['img_url'];
    $part_description = $_POST['part_description'];
    $category = $_POST['category'];
    $price = $_POST['price'];

    $query = "UPDATE products SET part_name = ?, img_url = ?, part_description = ?, category = ?, price = ? WHERE product_id = ?";
    $stmt = $db->prepare($query);
    $stmt->execute([$part_name, $img_url, $part_description, $category, $price, $product_id]);

    header("Location: my_products.php");
    exit();
}

if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];

    $query = "SELECT * FROM products WHERE product_id = ?";
    $stmt = $db->prepare($query);
    $stmt->execute([$product_id]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="profile.css">
    <title>Edit Product</title>
</head>

<body>
    <header>
        <div class="logo">
            <img src="./assets/Megaparts-Logo-Light-Large.png" class="img-fluid" alt="Responsive image">
        </div>
        <nav>
            <ul class="nav-links">
                <li><a href="profile.php">Add product</a></li>
                <li><a href="view_all_products.php">View All Products</a></li>
            </ul>
        </nav>
    </header>
    <h2>Edit Product</h2>

    <form action="edit_product.php" method="POST" class="form-container">
        <input type="hidden" name="product_id" class="form-input" value="<?php echo $product['product_id']; ?>">
        <label for="part_name" class="form-label">Product Name:</label>
        <input type="text" id="part_name" name="part_name" class="form-input"
            value="<?php echo $product['part_name']; ?>" required>

        <label for="img_url" class="form-label">Image URL:</label>
        <input type="text" id="img_url" name="img_url" class="form-input" value="<?php echo $product['img_url']; ?>"
            required>

        <label for="part_description" class="form-label">Description:</label>
        <input type="text" id="part_description" name="part_description" class="form-input"
            value="<?php echo $product['part_description']; ?>" required>

        <label for="category" class="form-label">Category:</label>
        <input type="text" id="category" name="category" class="form-input" value="<?php echo $product['category']; ?>"
            required>

        <label for="price" class="form-label">Price:</label>
        <input type="number" id="price" name="price" class="form-input" step="0.01"
            value="<?php echo $product['price']; ?>" required>

        <input type="submit" value="Save Changes" class="form-submit">
    </form>

</body>

</html>