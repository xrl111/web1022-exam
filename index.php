<?php
session_start();
require_once "./admin/classes/Models/config.php";
require_once "./admin/classes/Models/MClass.php";
require_once './admin/classes/Controllers/CStudent.php';
if (!isLoggedIn()) {
    redirectToLogin();
}

// Kiểm tra vai trò người dùng
if (isAdmin()) {
    // Chuyển hướng đến trang admin nếu người dùng là admin
    $mClass = new Classes();
    $listClassName = $mClass -> getClassName();
    if(isset($listClassName))
    {
        foreach($listClassName as $className)
        {
            header('Location: admin/index.php?act=listClass&id='.$className -> className);
            exit();
        }
    }else
    {
        header('Location: admin/index.php?act=listClass');
        exit();
    }
}

if (!isStudent()) {
    // Nếu không phải là student và không phải là admin thì chuyển về trang login
    redirectToLogin();
} else if (!isset($_GET['act']) || $_GET['act'] === '/'|| $_GET['act'] === '') 
{
    header('Location: index.php?act=ManageInformation');
    exit();
}
// if (!isLoggedIn() || !isStudent()) {
//     redirectToLogin();
// }

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
