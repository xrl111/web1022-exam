<?php
    require_once 'classes/Models/Mclass.php';
    require_once 'classes/Models/Mstudent.php';
    require_once 'classes/Models/MConfig.php';
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
            }else if(isset($_POST['search']))
            {
                $listClas = $cClas -> getAllData();
                $listStuCode = $cStu -> getAllData();
                if(isset($_POST['idStu']))
                {
                    $idStu = $_POST['idStu'];
                    foreach($listStuCode as $stu)
                    {
                        if(strtolower($idStu) === strtolower($stu -> student_code))
                        {
                            $hidePag = true;
                            $listStu = $cStu -> getDataByStudentCode($idStu);
                            include_once 'classes.php';
                            break;
                        }else
                        {
                            header('Location: ?act=listClass&id=WD19320');
                            break;
                        }
                    }
                }
            }else
            {
                if(isset($id))
                {
                    $listClas = $cClas -> getAllData();
                    $hidePag = false;
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
                    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                    $current_turn = 0;
                    $cStu -> setInsertData(null,$_POST['fullname'],$_POST['username'],$_POST['student_code'],$password,$_POST['class'],null,null,null,null,null,$current_turn);
                    
                    // header('Location: ?act=listClass&id=WD19320');
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
                    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                    $cStu -> updateData($_POST['fullname'],$_POST['username'],$_POST['student_code'],$password,$_POST['class'],$_POST['result1'],$_POST['result2'],$_POST['result3'],$_POST['score'],null,$id);
                    header('Location: ?act=listClass&id=WD19320');
                }
            }
            include_once 'updateStudent.php';
        }
        
        public function SetPoint()
        {
            $cStu = new Students();
            $cCfig = new Config();
            $id = 1;
            $listCfig = $cCfig -> getAllDataById($id);
            $listStu = $cStu -> getAllData();
            if(isset($_POST['setPoint']))
            {
                if(isset($_POST['point']) && isset($_POST['id']))
                {
                    if($_POST['point'] <= $listCfig -> Totalscore && $_POST['point'] >= 0)
                    {
                        $cStu -> updateScore($_POST['point'], $_POST['id']);
                        header('Location: ?act=listClass&id=WD19320');
                    }else
                    {
                        header('Location: ?act=listClass&id=WD19320');
                    }
                }else
                {
                    echo 'Chưa nhập dữ liệu';
                }
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