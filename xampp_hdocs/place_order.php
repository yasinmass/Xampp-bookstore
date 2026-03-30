<?php
session_start();
include 'db.php';

if (!isset($_SESSION['customer_id'])) {
    header("Location: login.html");
    exit();
}

$customer_id = $_SESSION['customer_id'];

// Get cart
$cart_result = mysqli_query($conn, "SELECT cart_id FROM cart WHERE customer_id='$customer_id'");
if (mysqli_num_rows($cart_result) == 0) {
    header("Location: cart.php");
    exit();
}
$cart = mysqli_fetch_assoc($cart_result);
$cart_id = $cart['cart_id'];

// Get cart items
$items = mysqli_query($conn, "SELECT * FROM cart_items WHERE cart_id='$cart_id'");
if (mysqli_num_rows($items) == 0) {
    header("Location: cart.php");
    exit();
}

// Create order
mysqli_query($conn, "INSERT INTO orders (order_date, customer_id) VALUES (CURDATE(), '$customer_id')");
$order_id = mysqli_insert_id($conn);

// Add order items
while ($item = mysqli_fetch_assoc($items)) {
    $book_id  = $item['book_id'];
    $quantity = $item['quantity'];
    mysqli_query($conn, "INSERT INTO order_item (order_id, book_id, quantity) VALUES ('$order_id', '$book_id', '$quantity')");
}

// Clear cart
mysqli_query($conn, "DELETE FROM cart_items WHERE cart_id='$cart_id'");

header("Location: orders.php?msg=Order placed successfully!");
exit();
?>
