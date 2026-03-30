<?php
session_start();
include 'db.php';

if (!isset($_SESSION['customer_id'])) {
    header("Location: login.html");
    exit();
}

$customer_id = $_SESSION['customer_id'];
$book_id     = intval($_GET['book_id']);

$cart_result = mysqli_query($conn, "SELECT cart_id FROM cart WHERE customer_id='$customer_id'");
$cart        = mysqli_fetch_assoc($cart_result);
$cart_id     = $cart['cart_id'];

mysqli_query($conn, "DELETE FROM cart_items WHERE cart_id='$cart_id' AND book_id='$book_id'");

header("Location: cart.php?msg=Item removed");
exit();
?>
