<?php
session_start();
require_once "./config.php";

if (!isLoggedIn() || !$_SESSION['user_role'] === 'student') {
    redirectToLogin();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xúc Xắc Game</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Xúc Xắc Game</h1>
        <label for="totalNumber">Nhập số:</label>
        <input type="number" id="totalNumber" name="totalNumber" min="3">
        <button id="rollButton">Xoay Xúc Xắc</button>
        <div id="diceContainer">
            <div class="dice" id="dice1"></div>
            <div class="dice" id="dice2"></div>
            <div class="dice" id="dice3"></div>
        </div>
        <div id="result"></div>
        <div id="questions"></div>
    </div>
    <script src="script.js"></script>
</body>
</html>
