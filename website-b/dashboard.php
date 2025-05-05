<?php
include 'includes/auth.php';
requireAdmin();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background-color: #f4f4f4;
            color: #333;
        }

        h2 {
            color: #007BFF;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin: 12px 0;
        }

        a {
            text-decoration: none;
            color: white;
            background-color: #007BFF;
            padding: 10px 20px;
            border-radius: 6px;
            display: inline-block;
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<h2>Admin Dashboard</h2>
<ul>
  <li><a href="manage-products.php">Manage Products</a></li>
  <li><a href="manage-users.php">Manage Users</a></li>
  <li><a href="logout.php">Logout</a></li>
</ul>

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