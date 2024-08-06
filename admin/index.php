<?php
session_start();
require_once "../config.php";


// Check if the user is logged in and is an admin
if (!isLoggedIn() || !isAdmin()) {
    redirectToLogin();
}
$page = $_GET['page'] ?? "classes";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="./styles/styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./styles/styles.css">
</head>
<body>
    <div class="container">
        <?php  require "./components/menu.php"; ?>
        <div class="tab-content active">
            <?= require_once "$page.php"; ?>
        </div>
    </div>
</body>
</html>