<?php
session_start();
// require_once "../config.php";
// Check if the user is logged in and is an admin
// require_once './classes/Controllers/CClass.php';
require_once './classes/Controllers/CClass.php';
require_once './classes/Controllers/CStudent.php';
require_once './classes/Models/MStudent.php';
require_once './classes/Controllers/CQuestion.php';

if(!isLoggedIn() || !isAdmin()) {
    redirectToLogin();
}
// $page = $_GET['page'] ?? "classes";
$act = $_GET['act'] ?? '/';
$cClass = new CClasses();
$cStu = new CStudents();
$cQues = new CQuestions();
switch($act)
{
    case 'listClass':
    {
        $cClass -> getAllData();
        break;
    }

    case 'listQuestion':
    {
        $cQues -> getAllData();
        break;
    }

    case 'AddStudent':
    {
        $cClass -> insertData();
        break;
    }

    case 'AddQuestion':
    {
        $cQues -> insertData();
        break;
    }

    case 'UpdateStudent':
    {
        $cClass -> uploadData();
        break;
    }

    case 'UpdateQuestion':
    {
        $cQues -> uploadData();
        break;
    }

    case 'DeleteStudent':
    {
        $cClass -> DeleteData();
        break;
    }

    case 'DeleteStudentSelected':
    {
        $cClass -> DeleteDataSelected();
        break;
    }

    case 'DeleteQuestion':
    {
        $cQues -> DeleteData();
        break;
    }   
    
    case 'DeleteQuestionSelected':
    {
        $cQues -> DeleteDataSelected();
        break;
    }

    case 'Login':
    {
        $cStu -> login();
        break;
    }
    case 'SetPoint':
    {
        $cClass -> SetPoint();
        break;
    }
    // case 'DiceGame':
    // {
    //     $cStu -> diceGame();
    //     break;
    // }
};
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="./styles/styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="tab-content active">
           
        </div>
    </div>
</body>
</html>

