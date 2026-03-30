<?php
session_start();
include 'db.php';

if (!isset($_SESSION['customer_id'])) {
    header("Location: login.html");
    exit();
}

$customer_id = $_SESSION['customer_id'];
$book_id     = intval($_GET['book_id']);

// Check if cart exists for this customer
$cart_check = mysqli_query($conn, "SELECT cart_id FROM cart WHERE customer_id='$customer_id'");

if (mysqli_num_rows($cart_check) == 0) {
    // Create new cart
    mysqli_query($conn, "INSERT INTO cart (customer_id, created_date) VALUES ('$customer_id', CURDATE())");
    $cart_id = mysqli_insert_id($conn);
} else {
    $cart_row = mysqli_fetch_assoc($cart_check);
    $cart_id  = $cart_row['cart_id'];
}

// Check if book already in cart
$item_check = mysqli_query($conn, "SELECT * FROM cart_items WHERE cart_id='$cart_id' AND book_id='$book_id'");

if (mysqli_num_rows($item_check) > 0) {
    // Increase quantity
    mysqli_query($conn, "UPDATE cart_items SET quantity = quantity + 1 WHERE cart_id='$cart_id' AND book_id='$book_id'");
} else {
    // Add new item
    mysqli_query($conn, "INSERT INTO cart_items (cart_id, book_id, quantity) VALUES ('$cart_id', '$book_id', 1)");
}

header("Location: books.php?msg=Book added to cart!");
exit();
?>
