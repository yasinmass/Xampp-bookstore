<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email    = mysqli_real_escape_string($conn, $_POST['email']);
    $password = md5($_POST['password']);

    $sql    = "SELECT * FROM customer WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['customer_id']   = $row['customer_id'];
        $_SESSION['customer_name'] = $row['customer_name'];
        header("Location: books.php");
        exit();
    } else {
        header("Location: login.html?error=Invalid email or password");
        exit();
    }
}
?>
