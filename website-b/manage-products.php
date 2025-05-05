<?php
include 'includes/db.php';
include 'includes/auth.php';
requireAdmin();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST['name'];
    $desc = $_POST['description'];
    $price = $_POST['price'];

    $imagePath = "";
    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        $targetDir = "uploads/";
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0755, true);
        }
        $imagePath = $targetDir . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath);
    }

    $stmt = $conn->prepare("INSERT INTO products (name, description, price, image) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssds", $name, $desc, $price, $imagePath);
    $stmt->execute();
    echo "<p class='success'>Product added!</p>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Products</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background-color: #f9f9f9;
        }

        h3 {
            margin-top: 40px;
            color: #333;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            max-width: 400px;
        }

        input[type="text"],
        input[type="number"],
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0 16px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #28a745;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background-color: #218838;
        }

        .product-card {
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 6px;
            padding: 16px;
            margin-bottom: 20px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            max-width: 400px;
        }

        .product-card img {
            max-width: 100%;
            height: auto;
            margin-bottom: 12px;
            border-radius: 4px;
        }

        .success {
            color: green;
            font-weight: bold;
        }
    </style>
</head>
<body>

<h2>Add Product</h2>
<form method="POST" enctype="multipart/form-data">
    Name: <input type="text" name="name" required>
    Desc: <input type="text" name="description">
    Price: <input type="number" name="price" step="0.01" required>
    Image: <input type="file" name="image" accept="image/*" required>
    <button type="submit">Add Product</button>
</form>

<h3>All Products</h3>
<?php
$result = $conn->query("SELECT * FROM products");
while ($row = $result->fetch_assoc()) {
    echo "<div class='product-card'>";
    if (!empty($row['image']) && file_exists($row['image'])) {
        echo "<img src='{$row['image']}' alt='Product Image'>";
    }
    echo "<strong>{$row['name']}</strong> - \${$row['price']}<br>";
    echo "<em>{$row['description']}</em>";
    echo "</div>";
}
?>

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
<a href="../website-a/home.php" class="floating-link">Customer Portal</a> 