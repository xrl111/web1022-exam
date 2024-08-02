<?php
    require_once 'classes/Models/Mclass.php';
    require_once 'classes/Models/Mstudent.php';
    class CClasses
    {
        public $connect;

        public function __construct()
        {
            $this -> connect = new Classes();
        }

        public function getAllData()
        {
            $cClas = new Classes();
            $cStu = new Students();
            $id = $_GET['id'] ?? 'WD19320';
            if (!isLoggedIn() || !isAdmin()) {
                redirectToLogin();
            }else
            {
                if(isset($id))
                {
                    $listClas = $cClas -> getAllData();
                    $page = isset($_GET['page']) ? $_GET['page'] : 1;
                    $per_Page = 10;
                    $from_Page = ($page - 1) * $per_Page;
                    $total_pages = ceil(count($cStu -> getAllDataById($id)) / $per_Page);
                    $listStu = $cStu -> getAllDataByLimit($id,$from_Page,$per_Page);
                    include_once 'classes.php';
                }
            }
        }

        public function insertData()
        {
            $cStu = new Students();
            if(isset($_POST['register-stu']))
            {
                if(empty($_POST['fullname']) || empty($_POST['username']) || empty($_POST['password']) ||empty($_POST['class']))
                {
                    return false;
                }else
                {
                    $cStu -> setInsertData(null,$_POST['fullname'],'username','student_code',$_POST['password'],$_POST['class'],null,null,null,null,null);
                    header('Location: ?act=listClass&id=WD19320');
                }
            }

            include_once 'registerStudent.php';
        }

        public function uploadData()
        {
            $cStu = new Students();
            $id = $_GET['id'];
            $listStu = $cStu -> getDataById($id);
            if(isset($id))
            {
                if(isset($_POST['update-stu']))
                {
                    $cStu -> updateData($_POST['fullname'],$_POST['username'],$_POST['student_code'],$_POST['password'],$_POST['class'],$_POST['result1'],$_POST['result2'],$_POST['result3'],$_POST['score'],null,$id);
                    header('Location: ?act=listClass&id=WD19320');
                }
                include_once 'updateStudent.php';
            }
        }

        public function DeleteData()
        {
            if(isset($_GET['id']))
            {
                $cStu = new Students();
                $id = $_GET['id'];
                $cStu -> deleteData($id,$id);
                header('Location: ?act=listClass&id=WD19320');
            }
        }

        public function DeleteDataSelected()
        {
            $cStu = new Students();
            if(isset($_POST['btn-delSelected']))
            {
                $deletedItems = isset($_POST['checkboxes']) ? $_POST['checkboxes'] : [];
                foreach($deletedItems as $deletedItem)
                {
                    $cStu -> deleteData($deletedItem,$deletedItem);
                    header('Location: ?act=listClass&id=WD19320');
                }
            }
        }
    }
?>