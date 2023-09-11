<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="profile.css">
    <title>Add Product</title>
</head>

<body>

    <header>
        <div class="logo">
            <img src="./assets/Megaparts-Logo-Light-Large.png" class="img-fluid" alt="Responsive image">
        </div>
        <nav>
            <ul class="nav-links">
                <li><a href="my_products.php">My Products</a></li>
                <li><a href="view_all_products.php">View All Products</a></li>
            </ul>
        </nav>
    </header>
    <h2>Add Product</h2>
    <form action="add_product.php" method="POST" class="form-container">
        <label for="part_name" class="form-label">Product Name:</label>
        <input type="text" id="part_name" name="part_name" class="form-input" required>

        <label for="img_url" class="form-label">Image URL:</label>
        <input type="text" id="img_url" name="img_url" class="form-input" required>

        <label for="part_description" class="form-label">Description:</label>
        <input type="text" id="part_description" name="part_description" class="form-input" required>

        <label for="category" class="form-label">Category:</label>
        <input type="text" id="category" name="category" class="form-input" required>

        <label for="price" class="form-label">Price:</label>
        <input type="number" id="price" name="price" class="form-input" step="0.01" required>

        <input type="submit" value="Add Product" class="form-submit">
    </form>
</body>

</html>