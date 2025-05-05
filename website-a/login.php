<?php
include 'includes/db.php';
include 'includes/auth.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    $stmt = $conn->prepare("SELECT id, role, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($id, $role, $hashed_password);
    if ($stmt->fetch() && password_verify($password, $hashed_password)) {
        $_SESSION['user_id'] = $id;
        $_SESSION['role'] = $role;
        header("Location: index.php");
    } else {
        echo "<p style='color: red;'>Invalid login.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            background-color: white;
            padding: 30px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            border-radius: 8px;
            width: 100%;
            max-width: 400px;
        }

        h2 {
            text-align: center;
            color: #007BFF;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #555;
        }

        input[type="email"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        button {
            background-color: #007BFF;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 5px;
            width: 100%;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #0056b3;
        }

        .message {
            text-align: center;
            margin-top: 20px;
            font-size: 16px;
        }

        .message a {
            color: #007BFF;
            text-decoration: none;
        }

        .message a:hover {
            text-decoration: underline;
        }

        .error {
            color: red;
            font-size: 14px;
            margin-top: 10px;
            text-align: center;
        }

        .show-password {
            position: absolute;
            right: 10px;
            top: 10px;
            cursor: pointer;
        }

        .show-password:focus {
            outline: none;
        }
    </style>
</head>
<body>

<div class="login-container">
    <h2>Login</h2>
    <form method="POST">
        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <label for="password">Password:</label>
        <div style="position: relative;">
            <input type="password" name="password" id="password" required><br>
            <span class="show-password" onclick="togglePassword()">👁️</span>
        </div>

        <button type="submit">Login</button>
    </form>

    <div class="message">
        <p>Don't have an account? <a href="register.php">Register here</a></p>
    </div>

    <?php if (isset($error)) { echo "<p class='error'>$error</p>"; } ?>
</div>

<script>
    function togglePassword() {
        var passwordField = document.getElementById("password");
        var passwordIcon = document.querySelector(".show-password");

        if (passwordField.type === "password") {
            passwordField.type = "text";
            passwordIcon.innerHTML = "🙈";  
        } else {
            passwordField.type = "password";
            passwordIcon.innerHTML = "👁️";  
        }
    }
</script>

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