<?php
// require_once "classes/model/list_question.php";
class question_groups{
    // public function listQuestion(){
    //     $Pro = new question_groupstions();
    //     $list = $Pro->allQuestion();

    //     include_once 'question_list.php';
    // }

    public function insertQuestionG() {
        if (isset($_POST['submit'])) {
            // Kiểm tra và lấy dữ liệu từ $_POST
            $name = isset($_POST['name']) ? $_POST['name'] : null;
    
                $hPro = new Questions();
                $addGr = $hPro->insertQuestionG(null, $name);
                var_dump($addGr);
        }
        include_once 'add_QuesGroup.php';
    }
    

//     public function editPro(){
//         if(isset($_GET['id'])){
//             $id = $_GET['id'];
//             $vPro = new services();
//             $idPro = $vPro->getIdDv($id);
//             if(isset($_POST['submit'])){
//                 $name = $_POST['name'];
//                 // $image = $_POST['image'];
//                 $description = $_POST['description'];
//                 $price = $_POST['price'];
//                 $duration = $_POST['duration'];
//                 // $image = NULL;
//     if($_FILES['image']['name'] != NULL){
//            $target_dir = 'images/';
//                 $name_img = time().$_FILES['image']['name'];
//                 $image = $target_dir.$name_img;
//                 move_uploaded_file($_FILES['image']['tmp_name'],$image);
//     } else{
//         $image = $idPro->image;
//     }
//                 $addPro = $vPro->updateSv($name,$image,$description,$price,$duration,$id);
//                 header('location: index.php');
    
//             }
//         }
//         include_once 'views/edit.php';
//     }
 }
?>