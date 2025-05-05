<?php
session_start();
include 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email = '$email' AND role = 'admin'";
    $result = $conn->query($query);

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role'] = $user['role'];
            header("Location: dashboard.php"); 
            exit;
        } else {
            $error = "Incorrect password!";
        }
    } else {
        $error = "No admin found with that email!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 50px;
            color: #333;
        }

        h2 {
            color: #007BFF;
            text-align: center;
        }

        form {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            max-width: 400px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .password-toggle {
            margin-top: -10px;
            margin-bottom: 15px;
            font-size: 14px;
        }

        button {
            background-color: #007BFF;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
            width: 100%;
        }

        button:hover {
            background-color: #0056b3;
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

        p {
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>Admin Login</h2>
    <?php if (isset($error)) echo "<p style='color: red;'>$error</p>"; ?>
    <form method="POST" action="">
        <label for="email">Email:</label>
        <input type="email" name="email" required>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
        <div class="password-toggle">
            <input type="checkbox" onclick="togglePassword()"> Show Password
        </div>

        <button type="submit">Login</button>
    </form>

    <a href="../website-a/home.php" class="floating-link">Customer Portal</a> 

    <script>
        function togglePassword() {
            var passInput = document.getElementById("password");
            passInput.type = passInput.type === "password" ? "text" : "password";
        }
    </script>
</body>
</html>

