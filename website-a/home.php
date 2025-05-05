<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fairway Store</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }

        h1 {
            color: #007BFF;
            margin-bottom: 10px;
        }

        p {
            font-size: 18px;
            color: #555;
            margin-bottom: 20px;
        }

        a {
            color: #007BFF;
            text-decoration: none;
            font-size: 16px;
            margin: 0 10px;
        }

        a:hover {
            text-decoration: underline;
        }

        .floating-link {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #007BFF;
            color: white;
            padding: 12px 16px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: bold;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            z-index: 9999;
        }

        .floating-link:hover {
            background-color: #0056b3;
        }

        .links {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>Welcome to Fairway Boutique</h1>
    <p>Your trusted online thrift store.</p>
    <div class="links">
        <a href="register.php">Register</a> | 
        <a href="login.php">Login</a>
    </div>
    <a href="../website-b/admin-login.php" class="floating-link">Admin Portal</a>
</body>
</html>
