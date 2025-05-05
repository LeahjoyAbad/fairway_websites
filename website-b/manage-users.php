<?php
include 'includes/db.php';
include 'includes/auth.php';
requireAdmin();
?>

<!DOCTYPE html>
<html>
<head>
    <title>User List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background-color: #f2f2f2;
        }

        h2 {
            color: #333;
        }

        .user-card {
            background-color: #fff;
            padding: 15px 20px;
            margin-bottom: 12px;
            border-left: 5px solid #007BFF;
            border-radius: 5px;
            box-shadow: 0 1px 4px rgba(0,0,0,0.1);
            max-width: 400px;
        }

        .user-card strong {
            color: #007BFF;
        }
    </style>
</head>
<body>

<h2>User Accounts</h2>

<?php
$result = $conn->query("SELECT id, email, role FROM users");
while ($row = $result->fetch_assoc()) {
    echo "<div class='user-card'>";
    echo "<strong>Email:</strong> {$row['email']}<br>";
    echo "<strong>Role:</strong> {$row['role']}";
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