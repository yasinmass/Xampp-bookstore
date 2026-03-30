<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register - Bookstore</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; background: #f4f4f4; display: flex; justify-content: center; align-items: center; min-height: 100vh; }
        .card { background: white; padding: 40px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); width: 100%; max-width: 400px; }
        h2 { text-align: center; margin-bottom: 25px; color: #2c3e50; }
        label { display: block; margin-bottom: 5px; color: #555; font-size: 14px; }
        input { width: 100%; padding: 10px 14px; border: 1px solid #ddd; border-radius: 6px; font-size: 15px; margin-bottom: 18px; }
        input:focus { border-color: #2c3e50; outline: none; }
        button { width: 100%; padding: 12px; background: #2c3e50; color: white; border: none; border-radius: 6px; font-size: 16px; cursor: pointer; }
        button:hover { background: #f39c12; }
        .link { text-align: center; margin-top: 15px; font-size: 14px; }
        .link a { color: #2c3e50; text-decoration: none; font-weight: bold; }
        .msg { padding: 10px; border-radius: 5px; margin-bottom: 15px; text-align: center; font-size: 14px; }
        .error { background: #f8d7da; color: #721c24; }
        .logo { text-align: center; font-size: 28px; margin-bottom: 10px; }
    </style>
</head>
<body>
<div class="card">
    <div class="logo">📚</div>
    <h2>Create an Account</h2>

    <?php if (isset($_GET['error'])): ?>
        <div class="msg error"><?= htmlspecialchars($_GET['error']) ?></div>
    <?php endif; ?>

    <form action="register_process.php" method="POST">
        <label>Username</label>
        <input type="text" name="customer_name" placeholder="Choose a username" required>

        <label>Full Name</label>
        <input type="text" name="name" placeholder="Enter your full name" required>

        <label>Email</label>
        <input type="email" name="email" placeholder="Enter your email" required>

        <label>Password</label>
        <input type="password" name="password" placeholder="Create a password" required>

        <button type="submit">Register</button>
    </form>

    <div class="link">Already have an account? <a href="login.php">Login here</a></div>
</div>
</body>
</html>
