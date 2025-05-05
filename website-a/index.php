<?php
include 'includes/auth.php';
include 'includes/db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Fairway Store</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            text-align: center;
            background-color: white;
            padding: 40px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            width: 100%;
            max-width: 600px;
        }

        h2 {
            color: #007BFF;
            margin-bottom: 20px;
        }

        a {
            color: #007BFF;
            text-decoration: none;
            font-size: 16px;
            margin: 10px;
        }

        a:hover {
            text-decoration: underline;
        }

        .message {
            font-size: 18px;
            color: #555;
        }

        .message a {
            font-weight: bold;
        }

        .message a:hover {
            color: #0056b3;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Welcome to Fairway Store</h2>
    <div class="message">
        <a href="products.php">Browse Products</a> | 
        <?php if (isLoggedIn()) echo '<a href="logout.php">Logout</a>'; ?>
    </div>
</div>

</body>
</html>


<style>
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
<a href="../website-b/admin-login.php" class="floating-link">Admin Portal</a>