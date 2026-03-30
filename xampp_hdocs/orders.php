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
    <title>My Orders - Bookstore</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; background: #f4f4f4; }
        nav { background: #2c3e50; padding: 15px 30px; display: flex; justify-content: space-between; align-items: center; }
        nav .logo { color: white; font-size: 22px; font-weight: bold; }
        nav a { color: white; text-decoration: none; margin-left: 20px; }
        nav a:hover { color: #f39c12; }
        .container { max-width: 900px; margin: 30px auto; padding: 0 20px; }
        h2 { margin-bottom: 20px; color: #2c3e50; }
        .order-card { background: white; border-radius: 10px; padding: 20px; margin-bottom: 20px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
        .order-header { display: flex; justify-content: space-between; border-bottom: 1px solid #eee; padding-bottom: 10px; margin-bottom: 15px; }
        .order-id { font-weight: bold; color: #2c3e50; font-size: 16px; }
        .order-date { color: #999; font-size: 14px; }
        table { width: 100%; border-collapse: collapse; }
        th { background: #ecf0f1; padding: 8px 12px; text-align: left; font-size: 13px; }
        td { padding: 8px 12px; border-bottom: 1px solid #f4f4f4; font-size: 14px; }
        .total { text-align: right; margin-top: 10px; font-weight: bold; color: #27ae60; }
        .msg { padding: 10px 15px; border-radius: 5px; margin-bottom: 20px; background: #d4edda; color: #155724; }
        .empty { text-align: center; padding: 40px; color: #999; font-size: 18px; }
    </style>
</head>
<body>

<nav>
    <div class="logo">📚 Bookstore</div>
    <div>
        <span style="color:white;">Hello, <?= $_SESSION['customer_name'] ?>!</span>
        <a href="books.php">📖 Books</a>
        <a href="cart.php">🛒 Cart</a>
        <a href="logout.php">Logout</a>
    </div>
</nav>

<div class="container">
    <h2>📦 My Orders</h2>

    <?php if (isset($_GET['msg'])): ?>
        <div class="msg">✅ <?= htmlspecialchars($_GET['msg']) ?></div>
    <?php endif; ?>

    <?php
    $orders = mysqli_query($conn, "SELECT * FROM orders WHERE customer_id='$customer_id' ORDER BY order_date DESC");

    if (mysqli_num_rows($orders) == 0):
    ?>
        <div class="empty">No orders yet! <a href="books.php">Start Shopping</a></div>
    <?php else:
        while ($order = mysqli_fetch_assoc($orders)):
            $order_id = $order['order_id'];
            $items    = mysqli_query($conn, "SELECT oi.*, b.title, b.price FROM order_item oi JOIN book b ON oi.book_id = b.book_id WHERE oi.order_id='$order_id'");
            $total    = 0;
    ?>
        <div class="order-card">
            <div class="order-header">
                <span class="order-id">Order #<?= $order_id ?></span>
                <span class="order-date">📅 <?= $order['order_date'] ?></span>
            </div>
            <table>
                <tr>
                    <th>Book</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Subtotal</th>
                </tr>
                <?php while ($item = mysqli_fetch_assoc($items)):
                    $subtotal = $item['price'] * $item['quantity'];
                    $total   += $subtotal;
                ?>
                <tr>
                    <td><?= htmlspecialchars($item['title']) ?></td>
                    <td>₹<?= number_format($item['price'], 2) ?></td>
                    <td><?= $item['quantity'] ?></td>
                    <td>₹<?= number_format($subtotal, 2) ?></td>
                </tr>
                <?php endwhile; ?>
            </table>
            <div class="total">Total: ₹<?= number_format($total, 2) ?></div>
        </div>
    <?php endwhile; endif; ?>
</div>

</body>
</html>
