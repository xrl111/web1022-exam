<?php
    require_once 'classes/Models/Mclass.php';
    require_once 'classes/Models/Mstudent.php';
    require_once 'classes/Models/MConfig.php';
    require_once 'classes/Models/MQuestion.php';
    require_once 'classes/Models/MQuestionGroup.php';

    class CQuestions
    {
        public $connect;

        public function __construct()
        {
            $this -> connect = new Classes();
        }

        public function getAllData()
        {
            $cQues = new Questions();
            $cQuesGrp = new QuestionsGroup();
            $listQuesGrp = $cQuesGrp -> getAllQuestionsGroup();
            $listQues = $cQues -> getAllQuestions();
            $id = $_GET['id'] ?? '1';
            if (!isLoggedIn() || !isAdmin()) {
                redirectToLogin();
            }else if(isset($_POST['search']))
            {
                
                if(isset($_POST['idQues']))
                {
                    $idQues = $_POST['idQues'];
                    foreach($listQues as $ques)
                    {
                        if($idQues == $ques -> number)
                        {
                            $hidePag = true;
                            $listGrp = $cQues -> getAllQuestionsByNumber($idQues);           
                            include_once 'question_groups.php';
                            break;
                        }
                    }
                }
            }else
            {
                $hidePag = false;
                $page = isset($_GET['page']) ? $_GET['page'] : 1;
                $per_Page = 10;
                $from_Page = ($page - 1) * $per_Page;
                $total_pages = ceil(count($cQues -> getAllQuestionsById($id)) / $per_Page);
                $listGrp = $cQues -> getAllDataByLimit($id,$from_Page,$per_Page);
            }
            include_once 'question_groups.php';
        }

        public function insertData()
        {
            $cQues = new Questions();
            $cQuesGrp = new QuestionsGroup();
            $listQuesGrp = $cQuesGrp -> getAllQuestionsGroup();
            if(isset($_POST['register-ques']))
            {
                if(empty($_POST['number']) || empty($_POST['question']) || empty($_POST['answer']) ||empty($_POST['questionGroup']))
                {
                    return false;
                }else
                {
                    $cQues -> setInsertQuestions(null,$_POST['number'],$_POST['question'],$_POST['answer'], $_POST['questionGroup'],null);
                    header('Location: ?act=listQuestion&id=1');
                }
            }
            include_once 'registerQuestion.php';
        }

        public function uploadData()
        {
            $id = $_GET['id'];
            $cQues = new Questions();
            $cQuesGrp = new QuestionsGroup();
            $listQuesGrp = $cQuesGrp -> getAllQuestionsGroup();
            $listQues = $cQues -> getDataByIdQues($id);
            if(isset($id))
            {
                if(isset($_POST['update-ques']))
                {
                    $cQues -> updateQuestions($_POST['number'],$_POST['question'],$_POST['answer'],$_POST['questionGroup'],null,$id);
                    header('Location: ?act=listQuestion&id=1');
                }
            }
            include_once 'updateQuestion.php';
        }
        
        public function DeleteData()
        {
            if(isset($_GET['id']))
            {
                $cQues = new Questions();
                $id = $_GET['id'];
                $cQues -> deleteData($id);
                header('Location: ?act=listQuestion&id=1');
            }
        }

        public function DeleteDataSelected()
        {
            $cQues = new Questions();
            if(isset($_POST['btn-delSelected']))
            {
                $deletedItems = isset($_POST['checkboxes']) ? $_POST['checkboxes'] : [];
                foreach($deletedItems as $deletedItem)
                {
                    $cQues -> deleteData($deletedItem);
                    header('Location: ?act=listQuestion&id=1');
                }
            }
        }
    }
?>