<?php
session_start();
require_once 'config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$query = "SELECT cart.cart_id, products.*, cart.quantity FROM cart
          INNER JOIN products ON cart.product_id = products.product_id
          WHERE cart.user_id = ?";
$stmt = $db->prepare($query);
$stmt->execute([$_SESSION['user_id']]);
$cart_items = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="cart.css">
    <title>Shopping Cart</title>
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
                <li><a href="view_all_products.php">View All Products</a></li>
            </ul>
        </nav>
    </header>
    <h2>My Shopping Cart</h2>
    <table>
        <tr>
            <th>Product Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
            <th>Action</th>
        </tr>
        <?php foreach ($cart_items as $item): ?>
            <tr>
                <td>
                    <?php echo $item['part_description']; ?>
                </td>
                <td>$
                    <?php echo number_format($item['price'], 2); ?>
                </td>
                <td>
                    <?php echo $item['quantity']; ?>
                </td>
                <td>$
                    <?php echo number_format($item['price'] * $item['quantity'], 2); ?>
                </td>
                <td>
                    <a href="remove_from_cart.php?cart_id=<?php echo $item['cart_id']; ?>">Remove</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

</body>

</html>