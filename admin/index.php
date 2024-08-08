<?php
session_start();
require_once "./classes/Models/config.php";
require_once './classes/Controllers/CClass.php';
require_once './classes/Controllers/CStudent.php';
require_once './classes/Models/MStudent.php';
require_once './classes/Models/MClass.php';
require_once './classes/Controllers/CQuestion.php';
require_once './classes/Controllers/CConfig.php';
require_once './classes/Controllers/Cgroup_question.php';
$act = $_GET['act'] ?? '/';
$cClass = new CClasses();
$mClass = new Classes();
$cStu = new CStudents();
$cQues = new CQuestions();
$cCfig = new CConfig();
$cGroup = new CGroups();
$requestUri = $_SERVER['REQUEST_URI'];
if(!isLoggedIn() || !isAdmin()) {
    redirectToLogin();
}else if (!isset($_GET['act']) || $_GET['act'] === '/' || $_GET['act'] === '') 
{
    $listClassName = $mClass -> getClassName();
    if(isset($listClassName))
    {
        foreach($listClassName as $className)
        {
            header('Location: index.php?act=listClass&id='.$className -> className);
            exit();
        }
    }else
    {
        header('Location: index.php?act=listClass');
        exit();
    }
}
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

    case 'ResetCurrentTurn':
    {
        $cClass -> resetCurrentTurn();
        break;
    }
    
    case 'AddClass':
    {
        $cClass -> insertClass();
        break;
    }

    case 'UpdateClass':
    {
        $cClass -> updateClass();
        break;
    }

    case 'showAllGroup':
    {
        $cGroup -> showAlltDataGroup();
        break;
    }

    case 'insertGroup':
    {
        $cGroup -> addGroups();
        break;
    }

    case 'editGroup':
    {
        $cGroup -> editGroup();
        break;
    }

    case 'delGroup':
    {
        $cGroup -> delGroup();
        break;
    }
    case 'Config':
    {
        $cCfig -> getDataConfig();
        break;
    }
    case 'UpdateConfig':
    {
        $cCfig -> updateConfig();
        break;
    }

    case 'RelationshipClassAndQuesGrp':
    {
        $cGroup -> getAllDataClassAndQuesGrp();
        break;
    }
    
    case 'InsertRelationship':
    {
        $cGroup -> insertRelationship();
        break;
    }

    case 'UpdateRelationship':
    {
        $cGroup -> updateRelationship();
        break;
    }
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
    <?php
        if(empty($_GET['act']))
        {
            ?>
                <h1>ĐÂY LÀ TRANG ADMIN</h1>
                <button><a href="?act=listClass&id=WD19320">QUẢN TRỊ</a> </button>
            <?php
        }
    ?>
</body>
</html>

