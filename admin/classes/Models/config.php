<?php
<<<<<<<< HEAD:admin/classes/model/config.php
const DB_HOST = 'localhost:3307';
========
const DB_HOST = 'localhost:3306';
>>>>>>>> 19d69e2d1d5fe8eef3883d23b07cbfb8da8f960e:admin/classes/Models/config.php
const DB_USERNAME = 'root';
const DB_PASSWORD = "";
const DB_CHARSET = 'utf8';
const DB_NAME = "dice_game";
const BASE_URL = "http://localhost/web1022-exam";

function getDbConnection() {
    $conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

function isAdmin() {
    return isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin';
}

function isStudent() {
    return isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'student';
}

function redirectToLogin() {
    header("Location: login.php");
    exit();
}
function redirectTo($site) {
    header("Location: $site");
    exit();
}
?>
