<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard - Fairway Boutique</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background-color: #f9f9f9;
            color: #333;
        }

        h1 {
            color: #007BFF;
        }

        a {
            color: #007BFF;
            text-decoration: none;
            font-weight: bold;
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
            box-shadow: 0 4px 8px rgba(0,0,0,0.3);
            z-index: 9999;
        }

        .floating-link:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Welcome Admin</h1>
    <p>This is the admin control panel for Fairway Boutique.</p>
    <a href="admin-login.php">Admin Login</a>

    <a href="../website-a/home.php" class="floating-link">Customer Portal</a>
</body>
</html>
