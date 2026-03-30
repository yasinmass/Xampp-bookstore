<?php
session_start();
include 'db.php';

if (!isset($_SESSION['customer_id'])) {
    header("Location: login.html");
    exit();
}

$customer_id = $_SESSION['customer_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Cart - Bookstore</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; background: #f4f4f4; }
        nav { background: #2c3e50; padding: 15px 30px; display: flex; justify-content: space-between; align-items: center; }
        nav .logo { color: white; font-size: 22px; font-weight: bold; }
        nav a { color: white; text-decoration: none; margin-left: 20px; }
        nav a:hover { color: #f39c12; }
        .container { max-width: 900px; margin: 30px auto; padding: 0 20px; }
        h2 { margin-bottom: 20px; color: #2c3e50; }
        table { width: 100%; border-collapse: collapse; background: white; border-radius: 10px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
        th { background: #2c3e50; color: white; padding: 12px 15px; text-align: left; }
        td { padding: 12px 15px; border-bottom: 1px solid #eee; }
        tr:last-child td { border-bottom: none; }
        .total { text-align: right; margin-top: 20px; font-size: 20px; font-weight: bold; color: #27ae60; }
        .btn { display: inline-block; padding: 10px 20px; background: #27ae60; color: white; border-radius: 5px; text-decoration: none; margin-top: 15px; }
        .btn:hover { background: #219a52; }
        .btn-red { background: #e74c3c; }
        .btn-red:hover { background: #c0392b; }
        .empty { text-align: center; padding: 40px; color: #999; font-size: 18px; }
    </style>
</head>
<body>

<nav>
    <div class="logo">📚 Bookstore</div>
    <div>
        <span style="color:white;">Hello, <?= $_SESSION['customer_name'] ?>!</span>
        <a href="books.php">📖 Books</a>
        <a href="orders.php">📦 My Orders</a>
        <a href="logout.php">Logout</a>
    </div>
</nav>

<div class="container">
    <h2>🛒 My Cart</h2>

    <?php
    $sql = "SELECT ci.*, b.title, b.price, a.author_name 
            FROM cart_items ci 
            JOIN cart c ON ci.cart_id = c.cart_id
            JOIN book b ON ci.book_id = b.book_id
            JOIN author a ON b.author_id = a.author_id
            WHERE c.customer_id = '$customer_id'";
    $result = mysqli_query($conn, $sql);
    $total  = 0;

    if (mysqli_num_rows($result) == 0):
    ?>
        <div class="empty">🛒 Your cart is empty! <a href="books.php">Browse Books</a></div>
    <?php else: ?>
    <table>
        <tr>
            <th>#</th>
            <th>Book Title</th>
            <th>Author</th>
            <th>Price</th>
            <th>Qty</th>
            <th>Subtotal</th>
            <th>Action</th>
        </tr>
        <?php $i = 1; while ($row = mysqli_fetch_assoc($result)):
            $subtotal = $row['price'] * $row['quantity'];
            $total   += $subtotal;
        ?>
        <tr>
            <td><?= $i++ ?></td>
            <td><?= htmlspecialchars($row['title']) ?></td>
            <td><?= htmlspecialchars($row['author_name']) ?></td>
            <td>₹<?= number_format($row['price'], 2) ?></td>
            <td><?= $row['quantity'] ?></td>
            <td>₹<?= number_format($subtotal, 2) ?></td>
            <td><a href="remove_from_cart.php?book_id=<?= $row['book_id'] ?>" class="btn btn-red" style="padding:5px 10px;font-size:12px;">Remove</a></td>
        </tr>
        <?php endwhile; ?>
    </table>

    <div class="total">Total: ₹<?= number_format($total, 2) ?></div>
    <a href="place_order.php" class="btn">✅ Place Order</a>
    <?php endif; ?>
</div>

</body>
</html>
