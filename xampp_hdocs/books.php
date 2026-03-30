<?php
session_start();
include 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Books - Bookstore</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; background: #f4f4f4; }
        nav { background: #2c3e50; padding: 15px 30px; display: flex; justify-content: space-between; align-items: center; }
        nav .logo { color: white; font-size: 22px; font-weight: bold; }
        nav a { color: white; text-decoration: none; margin-left: 20px; }
        nav a:hover { color: #f39c12; }
        .container { max-width: 1200px; margin: 30px auto; padding: 0 20px; }
        h2 { margin-bottom: 20px; color: #2c3e50; }
        .books-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(220px, 1fr)); gap: 20px; }
        .book-card { background: white; border-radius: 10px; padding: 20px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
        .book-card h3 { font-size: 16px; margin-bottom: 8px; color: #2c3e50; }
        .book-card p { font-size: 13px; color: #666; margin-bottom: 5px; }
        .price { font-size: 18px; font-weight: bold; color: #27ae60; margin: 10px 0; }
        .btn { display: inline-block; padding: 8px 16px; background: #2c3e50; color: white; border: none; border-radius: 5px; cursor: pointer; text-decoration: none; font-size: 14px; }
        .btn:hover { background: #f39c12; }
        .msg { padding: 10px 15px; border-radius: 5px; margin-bottom: 20px; }
        .success { background: #d4edda; color: #155724; }
        .error { background: #f8d7da; color: #721c24; }
    </style>
</head>
<body>

<nav>
    <div class="logo">📚 Bookstore</div>
    <div>
        <?php if (isset($_SESSION['customer_id'])): ?>
            <span style="color:white;">Hello, <?= $_SESSION['customer_name'] ?>!</span>
            <a href="cart.php">🛒 Cart</a>
            <a href="orders.php">📦 My Orders</a>
            <a href="logout.php">Logout</a>
        <?php else: ?>
            <a href="login.html">Login</a>
            <a href="register.html">Register</a>
        <?php endif; ?>
    </div>
</nav>

<div class="container">
    <h2>📖 All Books</h2>

    <?php if (isset($_GET['msg'])): ?>
        <div class="msg success"><?= htmlspecialchars($_GET['msg']) ?></div>
    <?php endif; ?>
    <?php if (isset($_GET['error'])): ?>
        <div class="msg error"><?= htmlspecialchars($_GET['error']) ?></div>
    <?php endif; ?>

    <div class="books-grid">
        <?php
        $sql    = "SELECT b.*, a.author_name FROM book b JOIN author a ON b.author_id = a.author_id";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)):
        ?>
        <div class="book-card">
            <h3><?= htmlspecialchars($row['title']) ?></h3>
            <p>✍️ <?= htmlspecialchars($row['author_name']) ?></p>
            <p>📘 ISBN: <?= htmlspecialchars($row['ISBN']) ?></p>
            <div class="price">₹<?= number_format($row['price'], 2) ?></div>
            <?php if (isset($_SESSION['customer_id'])): ?>
                <a href="add_to_cart.php?book_id=<?= $row['book_id'] ?>" class="btn">🛒 Add to Cart</a>
            <?php else: ?>
                <a href="login.html" class="btn">Login to Buy</a>
            <?php endif; ?>
        </div>
        <?php endwhile; ?>
    </div>
</div>

</body>
</html>
