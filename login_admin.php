<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin / Staff Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #0a0f1f, #1a2a4f, #223b70);
            text-align: center;
            margin: 0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        /* Floating graphic back button */
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
            font-size: 20px;
            text-decoration: none;
            box-shadow: 0px 4px 12px rgba(0,0,0,0.3);
            transition: all 0.3s ease;
        }
        .back-btn:hover {
            background: linear-gradient(135deg, #1c3e6e, #2a5d9f);
            transform: scale(1.1) translateX(-3px);
            box-shadow: 0px 6px 16px rgba(0,0,0,0.4);
        }

        /* Card */
        .container {
            background: #2a5d9f;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0px 6px 15px rgba(0,0,0,0.4);
            display: inline-block;
            width: 350px;
            color: white;
        }

        h2 {
            margin-bottom: 20px;
            font-weight: bold;
            color: #fff;
        }

        .paw {
            font-size: 50px;
            margin-bottom: 15px;
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
            padding: 12px 20px;
            margin-top: 15px;
            border-radius: 8px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
            font-weight: bold;
            transition: all 0.3s;
        }
        button:hover {
            background: #dce7f9;
        }
    </style>
</head>
<body>
    <a href="index.php" class="back-btn">←</a>

    <div class="container">
        <div class="paw">🐾</div>
        <h2>Admin / Staff Login</h2>
        <form method="POST" action="login_admin.php">
            <input type="email" name="email" placeholder="Email" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>


