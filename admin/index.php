<?php
session_start();
require_once "./classes/Models/config.php";
require_once './classes/Controllers/CClass.php';
require_once './classes/Controllers/CStudent.php';
require_once './classes/Models/MStudent.php';
require_once './classes/Controllers/CQuestion.php';
require_once './classes/Controllers/Cgroup_question.php';

if(!isLoggedIn() || !isAdmin()) {
    redirectToLogin();
}
// $page = $_GET['page'] ?? "classes";
$act = $_GET['act'] ?? '/';
$cClass = new CClasses();
$cStu = new CStudents();
$cQues = new CQuestions();
$cGroup = new CGroups();
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

    // case 'UpdateScore':
    // {
    //     $cClass -> SetPointTest();
    //     break;
    // }

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

    case 'ResetCurrentTurn':
    {
        $cClass -> resetCurrentTurn();
        break;
    }
    
    // case 'DiceGame':
    // {
    //     $cStu -> diceGame();
    //     break;
    // }

    case 'showAllGroup':
        $cGroup -> showAlltDataGroup();
        break;

    case 'insertGroup':
        $cGroup -> addGroups();
        break;

        case 'editGroup':
            $cGroup -> editGroup();
            break;

            case 'delGroup':
                $cGroup -> delGroup();
                break;
};
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./styles/styles.css">
</head>
<body>
</body>
</html>

