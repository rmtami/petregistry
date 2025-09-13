<?php
session_start();
include "db_connect.php"; // make sure this file connects $conn to your DB

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Prepare and execute query
    $stmt = $conn->prepare("SELECT id, password FROM users WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        // Verify password
        if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['id'];
            header("Location: dashboard_user.php");
            exit();
        } else {
            $_SESSION['error'] = "❌ Invalid email or password.";
            header("Location: login_user.php");
            exit();
        }
    } else {
        $_SESSION['error'] = "❌ User not found.";
        header("Location: login_user.php");
        exit();
    }

    $stmt->close();
}
?>

