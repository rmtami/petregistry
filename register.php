<?php
include "db_connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $contact = $_POST["contact"];

    $stmt = $conn->prepare("INSERT INTO users (name, email, password, contact) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $password, $contact);

    if ($stmt->execute()) {
        echo "<script>alert('✅ Registration successful! Please login.'); window.location='login.php';</script>";
    } else {
        echo "❌ Error: " . $stmt->error;
    }
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Registration</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    background: linear-gradient(135deg, #0a0f1f, #1a2a4f, #223b70);
    text-align: center;
    padding: 50px;
    min-height: 100vh;
    margin: 0;
    display: flex;
    justify-content: center;
    align-items: center;
}

.container {
    background: #2a5d9f; /* professional blue card */
    padding: 30px 40px;
    border-radius: 15px;
    box-shadow: 0px 6px 15px rgba(0,0,0,0.4);
    display: inline-block;
    color: white;
    width: 350px;
}

h2 {
    color: #fff;
    margin-bottom: 20px;
}

.paw {
    font-size: 50px;
    margin-bottom: 10px;
}

input {
    width: 90%;
    padding: 12px;
    margin: 10px 0;
    border: none;
    border-radius: 8px;
    outline: none;
    font-size: 14px;
}

button {
    background: #ffffff;
    color: #2a5d9f;
    border: none;
    padding: 12px 25px;
    margin: 10px 0;
    border-radius: 8px;
    font-size: 16px;
    cursor: pointer;
    transition: 0.3s;
    width: 100%;
    font-weight: bold;
}

button:hover {
    background: #dce7f9;
}
/* Place the back button outside the card */
.back-btn {
    position: absolute;
    top: 30px;
    left: 30px;
    width: 45px;
    height: 45px;
    border-radius: 50%;
    background: linear-gradient(135deg, #2a5d9f, #1c3e6e);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 18px;
    text-decoration: none;
    box-shadow: 0px 4px 12px rgba(0,0,0,0.3);
    transition: all 0.3s ease;
}

.back-btn:hover {
    background: linear-gradient(135deg, #1c3e6e, #2a5d9f);
    transform: scale(1.1) translateX(-3px);
    box-shadow: 0px 6px 16px rgba(0,0,0,0.4);
}

/* Use an arrow icon effect */
.back-btn::before {
    content: "←";
    font-size: 20px;
    font-weight: bold;
}

    </style>
</head>
<body>
    <a href="index.php" class="back-btn"></a>
    <div class="container">
        <div class="paw">🐾</div>
        <h2>User Registration</h2>
        <form method="POST" action="register.php">
            <input type="text" name="name" placeholder="Full Name" required><br>
            <input type="email" name="email" placeholder="Email" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <input type="text" name="contact" placeholder="Contact Number" required><br>
            <button type="submit">Register</button>
        </form>
    </div>
</body>

</html>
