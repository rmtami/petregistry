<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header("Location: user_dashboard.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>User Login - Pet Registry</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600&family=Roboto:wght@300;400&display=swap" rel="stylesheet">
<style>
body {
    font-family: 'Roboto', sans-serif;
    background: linear-gradient(135deg, #0a0f1f, #1a2a4f, #223b70);
    margin: 0;
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    color: #fff;
}

/* Login box */
.login-container {
    background: rgba(42, 93, 159, 0.95);
    padding: 40px;
    border-radius: 20px;
    box-shadow: 0px 6px 20px rgba(0,0,0,0.6);
    width: 380px;
    text-align: center;
    color: #fff;
}

h2 {
    font-family: 'Poppins', sans-serif;
    font-weight: 600;
    font-size: 24px;
    margin-bottom: 25px;
    color: #fff;
}
.paw {
    font-size: 55px;
    margin-bottom: 15px;
}

/* Input fields */
input[type="email"], input[type="password"] {
    width: 100%;
    padding: 12px;
    margin: 12px 0;
    border: none;
    border-radius: 10px;
    font-size: 14px;
    outline: none;
    background: #1a2a4f;
    color: #fff;
    box-shadow: inset 0 2px 6px rgba(0,0,0,0.3);
}
input::placeholder {
    color: #bfcde6;
}

/* Login button */
.login-btn {
    background: #ffffff;
    color: #2a5d9f;
    border: none;
    padding: 12px 20px;
    margin-top: 15px;
    border-radius: 10px;
    cursor: pointer;
    font-weight: bold;
    font-size: 15px;
    transition: 0.3s;
    width: 100%;
}
.login-btn:hover {
    background: #dce7f9;
}
</style>
</head>
<body>
<div class="login-container">
    <div class="paw">🐾</div>
    <h2>User Login</h2>
    <form method="POST" action="process_user_login.php">
        <input type="email" name="email" placeholder="Enter your email" required>
        <input type="password" name="password" placeholder="Enter your password" required>
        <button type="submit" class="login-btn">Login</button>
    </form>
</div>
</body>
</html>
