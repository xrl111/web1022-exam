<?php
// require_once "classes/model/list_question.php";
class questionController{
    public function listQuestion(){
        $Pro = new Questions();
        $list = $Pro->allQuestion();

        include_once 'question_list.php';
    }

    public function insertQuestions() {
        if (isset($_POST['submit'])) {
            // Kiểm tra và lấy dữ liệu từ $_POST
            $number = isset($_POST['number']) ? $_POST['number'] : null;
            $question = isset($_POST['question']) ? $_POST['question'] : null;
            $answer = isset($_POST['answer']) ? $_POST['answer'] : null;
            $question_groups = isset($_POST['question_groups']) ? $_POST['question_groups'] : null;
            $created_at = date('Y-m-d H:i:s');
    
                $hPro = new Questions();
                $addPro = $hPro->insertQuestion(null, $number, $question, $answer, $question_groups, null);
                header('location: index.php?act=list');
                exit();
        }
        include_once 'add_question.php';
    }
    

    public function editQuestion(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $vPro = new Questions();
            $idPro = $vPro->getIdQuestion($id);
            if (isset($_POST['submit'])) {
                // Kiểm tra và lấy dữ liệu từ $_POST
            $number = isset($_POST['number']) ? $_POST['number'] : null;
            $question = isset($_POST['question']) ? $_POST['question'] : null;
            $answer = isset($_POST['answer']) ? $_POST['answer'] : null;
            $question_groups = isset($_POST['question_groups']) ? $_POST['question_groups'] : null;
            $created_at = date('Y-m-d H:i:s');
        
                    $editPro = $vPro->updateQuestion($number, $question, $answer, $question_groups,$created_at,$id);
                    header('location: index.php?act=list');
            }
        }
        include_once 'edit_Question.php';
    }

    public function delQuestion(){
        if(isset($_GET['id'])){
        $id = $_GET['id'];
        $vPro = new Questions();
        $idPro = $vPro->getIdQuestion($id);
        $list = $vPro->delQuestion($id);
        header('location: index.php?act=list');
        exit();
    }
 }
}
?>