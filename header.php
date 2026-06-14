<?php if (session_status() === PHP_SESSION_NONE) session_start(); ?>
<!DOCTYPE html>
<html lang="ka">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boxing World</title>
    <link rel="stylesheet" href="css/style.css?v=100">
</head>
<body>
<nav class="navbar">
    <a class="logo" href="index.php">🥊 Boxing World</a>
    <div class="nav-links">
        <a href="index.php">მთავარი</a>
        <a href="fighters.php">მოკრივეები</a>
        <a href="matches.php">ბრძოლები</a>
        <a href="news.php">სიახლეები</a>
        <a href="contact.php">კონტაქტი</a>
        <?php if(isset($_SESSION['user'])): ?>
            <?php if(isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                <a href="admin/dashboard.php">Admin</a>
            <?php endif; ?>
            <a href="logout.php">გასვლა</a>
        <?php else: ?>
            <a href="login.php">შესვლა</a>
            <a href="register.php">რეგისტრაცია</a>
        <?php endif; ?>
    </div>
</nav>
