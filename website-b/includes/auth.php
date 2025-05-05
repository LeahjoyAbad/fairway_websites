<?php
session_start();

function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

function isAdmin() {
    return isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
}

function requireLogin() {
    if (!isLoggedIn()) {
        header("Location: /website-a/login.php");
        exit;
    }
}

function requireAdmin() {
    if (!isAdmin()) {
        header("Location: /website-a/index.php");
        exit;
    }
}
?>