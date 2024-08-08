<?php
    require_once 'classes/Models/Mclass.php';
    require_once 'classes/Models/Mstudent.php';
    require_once 'classes/Models/MConfig.php';
    require_once 'classes/Models/MQuestion.php';
    require_once 'classes/Models/MQuestionGroup.php';

    class CGroups
    {
        public $connect;

        public function __construct()
        {
            $this -> connect = new Classes();
        }

       public function showAlltDataGroup(){
            $cPro = new QuestionsGroup();
          $iPro =  $cPro->getAllQuestionsGroup();
                // var_dump($iPro);
                // die();
            include_once 'showAllQuestion.php';
       }

       public function addGroups(){
        if(isset($_POST['submit'])){
           $name = $_POST['name'];

           $cPro = new QuestionsGroup();
           $vPro = $cPro -> setInsertQuestionGroups(null,$name);
        }
        include_once 'add_groupQuestion.php';
    }


    public function editGroup(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $cPro = new QuestionsGroup();
            $bPro = $cPro->getAllQuestionGroupById($id);
            if(isset($_POST['submit'])){
                $name = $_POST['name'];
     
                $vPro = $cPro -> setInsertQuestionGroups($name,$id);
             }
        }
        include_once 'editGroup.php';
    }

    public function delGroup(){
        if(isset($_GET['id'])){
        $id = $_GET['id'];
        $jPro = new QuestionsGroup();
        $hPro = $jPro->deleteData($id);
        header('location: ?act=showAllGroup');
        }
    }

    public function getAllDataClassAndQuesGrp()
    {
        $cClass = new Classes();
        $cQuesGrp = new QuestionsGroup();
        $listClassQuesGrp = $cQuesGrp -> getDataClassandQuesGrp();
        if(isset($listClassQuesGrp) && $listClassQuesGrp !== '')
        {
            $emptyData = false;
            $listClassQuesGrp = $cQuesGrp -> getDataClassandQuesGrp();
        }else
        {
            $emptyData = true;
            $error = 'NO DATA';
        }
        include_once 'Relationship_Class_QuesGrp.php';
    }

    public function insertRelationship()
    {
        $cClass = new Classes();
        $cQuesGrp = new QuestionsGroup();
        $listClass = $cClass -> getClassNameAndID();
        $listQues = $cQuesGrp -> getIdAndNameQuesGrp();
        $check = false;
        if(isset($_POST['add_rela']))
        {
            if(isset($_POST['quesGrp']) && isset($_POST['classes']))
            {   
                $check = false;
                $cQuesGrp -> setInsertRelationShip($_POST['classes'],$_POST['quesGrp']);
                header('Location: ?act=RelationshipClassAndQuesGrp');
            }else
            {   
                $check = true;
                $error = 'Xin hãy nhập đủ thông tin';
            }
        }

        include_once 'addRelationship_Class_QuesGrp.php';
    }

    public function updateRelationship()
    {
        $cClass = new Classes();
        $cQuesGrp = new QuestionsGroup();
        $listClass = $cClass -> getClassNameAndID();
        $listQues = $cQuesGrp -> getIdAndNameQuesGrp();
        $check = false;
        if(isset($_GET['idClass']) && isset($_GET['idGrp']))
        {
            $listClasQuesGrp = $cQuesGrp -> getIdAndNameQuesGrpByID($_GET['idClass'],$_GET['idGrp']);
            // var_dump($listClasQuesGrp);
            // die();
            if(isset($_POST['update_rela']))
            {
                if(isset($_POST['quesGrp']) && isset($_POST['classes']))
                {
                    $cQuesGrp -> updateRelationshipClassQuesGrp($_POST['classes'],$_POST['quesGrp'],$_GET['idClass'],$_GET['idGrp']);
                    header('Location: ?act=RelationshipClassAndQuesGrp');
                }else
                {
                    $check = true;
                    $error = 'Xin hãy nhập đủ thông tin';
                }
            }
        }
        include_once 'updateRelationship_Class_QuesGrp.php';
    }
}
?>