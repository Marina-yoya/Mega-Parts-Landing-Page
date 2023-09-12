<?php
require_once 'config.php';

session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

$query = "SELECT * FROM products";
$stmt = $db->prepare($query);
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="myProducts.css">
    <title>View All Products</title>
</head>
<body>
    <header>
        <div class="logo">
            <img src="./assets/Megaparts-Logo-Light-Large.png" class="img-fluid" alt="Responsive image">
        </div>
        <nav>
            <ul class="nav-links">
                <li><a href="profile.php">Add product</a></li>
                <li><a href="my_products.php">My Products</a></li>
                <li><a href="cart.php">My Cart</a></li> 
            </ul>
        </nav>
    </header>
    <div class="container">
    <?php foreach ($products as $product): ?>
    <div class="part-container">
        <img src="<?php echo $product['img_url']; ?>" alt="">
        <p class="part-description">
            <?php echo $product['part_description']; ?>
        </p>
        <div class="price">
            <span class="category">
                <?php echo $product['category']; ?>
            </span>
            <p class="sum">
                <?php echo number_format($product['price'], 2); ?>
            </p>
        </div>
        <?php if ($product['user_id'] !== $_SESSION['user_id']): ?>
            <form action="add_to_cart.php" method="post">
                <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
                <input type="number" name="quantity" value="1" min="1">
                <button type="submit">Add to Cart</button>
            </form>
        <?php endif; ?>
    </div>
<?php endforeach; ?>

    </div>
</body>
</html>
