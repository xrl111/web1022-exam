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
           header('location: ?act=showAllGroup');
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
                header('location: ?act=showAllGroup');
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
}
?>