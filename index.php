<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pet Registry System</title>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&family=Playfair+Display:wght@600&display=swap" rel="stylesheet">
    <style>
        /* Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Quicksand', sans-serif;
            height: 100vh;
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
        }

        .container {
            background: rgba(255, 255, 255, 0.1);
            padding: 40px 60px;
            border-radius: 20px;
            text-align: center;
            box-shadow: 0 8px 20px rgba(0,0,0,0.4);
            backdrop-filter: blur(10px);
            width: 350px;
        }

        .paw {
            font-size: 50px;
            margin-bottom: 20px;
        }

        h1 {
            font-family: 'Playfair Display', serif;
            margin-bottom: 20px;
            font-size: 28px;
        }

        p {
            margin-bottom: 30px;
            font-size: 16px;
            color: #f0f0f0;
        }

        a {
            text-decoration: none;
        }

        button {
            width: 100%;
            padding: 12px 0;
            margin: 10px 0;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            background: #ffffff;
            color: #2575fc;
            transition: all 0.3s ease;
        }

        button:hover {
            background: #2575fc;
            color: #ffffff;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
        }

        @media (max-width: 400px) {
            .container {
                width: 90%;
                padding: 30px 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="paw">🐾</div>
        <h1>Pet Registry System</h1>
        <p>Welcome! Please choose an option:</p>
        
        <a href="register.php"><button>Create New Account</button></a>
        <a href="login_user.php"><button>User Login</button></a>
        <a href="login_admin.php"><button>Admin / Staff Login</button></a>
    </div>
</body>
</html>

