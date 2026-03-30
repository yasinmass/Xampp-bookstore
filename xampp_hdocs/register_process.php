<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customer_name = mysqli_real_escape_string($conn, $_POST['customer_name']);
    $name          = mysqli_real_escape_string($conn, $_POST['name']);
    $email         = mysqli_real_escape_string($conn, $_POST['email']);
    $password      = md5($_POST['password']);

    // Check if email already exists
    $check = mysqli_query($conn, "SELECT * FROM customer WHERE email='$email'");
    if (mysqli_num_rows($check) > 0) {
        header("Location: register.html?error=Email already exists");
        exit();
    }

    $sql = "INSERT INTO customer (customer_name, name, email, password) 
            VALUES ('$customer_name', '$name', '$email', '$password')";

    if (mysqli_query($conn, $sql)) {
        header("Location: login.html?success=Registration successful! Please login.");
        exit();
    } else {
        header("Location: register.html?error=Registration failed");
        exit();
    }
}
?>
