<?php
include 'includes/db.php';
include 'includes/auth.php';

if (!isLoggedIn()) {
    header("Location: login.php"); 
    exit;
}

$result = $conn->query("SELECT * FROM products");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Product List</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: 30px auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            color: #007BFF;
            margin-bottom: 20px;
        }

        .product-list {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }

        .product-item {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            padding: 15px;
            width: 30%;
            margin: 15px 0;
            text-align: center;
            transition: transform 0.3s;
        }

        .product-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0,0,0,0.2);
        }

        .product-item img {
            width: 100%;
            height: auto;
            border-radius: 8px;
            margin-bottom: 15px;
        }

        .product-name {
            font-size: 1.2em;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .product-price {
            font-size: 1.1em;
            color: #28a745;
        }

        .product-description {
            font-size: 0.95em;
            color: #555;
        }

        .message {
            text-align: center;
            font-size: 1.2em;
            margin-top: 20px;
        }

        .message a {
            color: #007BFF;
            text-decoration: none;
        }

        .message a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Available Products</h2>
    <div class="product-list">
        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="product-item">
                <img src="<?= $row['image'] ? $row['image'] : 'default-image.jpg' ?>" alt="Product Image">
                <div class="product-name"><?= $row['name'] ?></div>
                <div class="product-price">$<?= number_format($row['price'], 2) ?></div>
                <div class="product-description"><?= htmlspecialchars($row['description']) ?></div>
            </div>
        <?php endwhile; ?>
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
