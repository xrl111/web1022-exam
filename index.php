<?php
session_start();
// require_once "./admin/classes/model/config.php";
require_once "model/inf_user.php";
require_once "controller/edit_information.php";

$hi = new ConnectDB();

if (!isLoggedIn() || !$_SESSION['user_role'] === 'student') {
    redirectToLogin();
}

$user_name = '';
if (isset($_SESSION['username'])) {
  $user_name = $_SESSION['username'];
}

$user_id = '';
if (isset($_SESSION['user_id'])) {
  $user_id = $_SESSION['user_id'];
}
$act = isset($_GET['act']) ? $_GET['act'] : '/';


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xúc Xắc Game</title>
    <link rel="stylesheet" href="styles.css">
</head>
<?php

switch($act){

    case '/':
         require_once "trangchu.php"; 
        break;

        case 'suathongtin':
            $ui = new user();
            $ui->update();
            break;

}
?>
</html>



