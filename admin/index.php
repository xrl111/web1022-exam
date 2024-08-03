<?php
session_start();
require_once 'classes/model/Mconnect-DB.php';
require_once 'classes/model/list_question.php';
require_once 'classes/controller/Cquestions.php';
require_once 'classes/controller/Cquestion_Group.php';


// Check if the user is logged in and is an admin
// if (!isLoggedIn() || !isAdmin()) {
//     redirectToLogin();
// }


$page = $_GET['page'] ?? "classes";
// require_once "classes/controller/Cstudent.php";
// $ahihi = new svController();
// $ahihi -> listStu();
// $cPro = new ConnectDB();
// $hi = new questionController();
// $hi->listQuestion();
// $i = new questionController();
// $i -> insertQuestions();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="./styles/styles.css">
    <link rel="stylesheet" href="./styles/list_question.css">
    <link rel="stylesheet" href="./styles/edit_question.css">
    <link rel="stylesheet" href="./styles/Groups_question.css">
    <link rel="stylesheet" href="./styles/add_question.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <?php  require "./components/menu.php"; ?>
        <div class="tab-content active">

        </div>
    </div>
</body>
</html>

<?php

$act = isset($_GET['act']) ? $_GET['act'] : '/';

switch($act){

    case '/':
         require_once "question_groups.php";    
            break;

    case 'add':
        $cPro = new questionController();
        $cPro->insertQuestions();
            break;

    case 'list':
        $cPro = new questionController();
        $cPro->listQuestion();
            break;
    
    // case 'add_questionG':
    //     $cPro = new question_groups();
    //     $cPro->insertQuestionG();
    //         break;
    
            case 'edit':
                $cPro = new questionController();
                $cPro->editQuestion();
                    break;

                    case 'del':
                        $cPro = new questionController();
                        $cPro->delQuestion();
                            break;
}

?>
