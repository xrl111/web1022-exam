<?php
session_start();
require_once "./admin/classes/Models/config.php";
require_once './admin/classes/Controllers/CStudent.php';
require_once './admin/classes/Controllers/CStudent.php';

if(!isLoggedIn() || !isStudent()) {
    redirectToLogin();
}
$act = $_GET['act'] ?? '/';
$cStu = new CStudents();
switch($act)
{
    case 'ManageInformation':
    {
        $cStu -> getDataByUsername();
        break;
    }
    case 'UpdateInformation':
    {
        $cStu -> updateFullname();
        break;
    }
    case 'ResetPassword':
    {
        $cStu -> resetPassword();
        break;
    }
    case 'DiceGame':
    {
        $cStu -> diceGame();
        break;
    }
    case 'LogicDiceGame':
    {
        $cStu -> LogicDiceGame();
        break;
    }
};
?>
