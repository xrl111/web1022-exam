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
            $id = $_GET['id'] ?? '';
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
                        $student_code = $stu -> student_code;
                        if(strtoupper($student_code) == strtoupper($idStu))
                        {
                            $emptyData = false;
                            $hidePag = true;
                            $listStu = $cStu -> getDataByStudentCode($stu -> student_code);
                            break;
                        }else
                        {
                            $emptyData = true;
                            $error = 'NO DATA';
                        }
                    }
                    include_once 'classes.php';
                }
            }else
            {
                $listClassName = $cClas -> getClassName();
                $listClas = $cClas -> getAllData();
                $hidePag = false;
                $page = isset($_GET['page']) ? $_GET['page'] : 1;
                $per_Page = 10;
                $from_Page = ($page - 1) * $per_Page;
                if(isset($id))
                {
                    foreach($listClassName as $classname)
                    {
                        if($classname -> className == $id)
                        {
                            $emptyData = false;
                            $total_pages = ceil(count($cStu -> getAllDataById($id)) / $per_Page); 
                            $listStu = $cStu -> getAllDataByLimit($id,$from_Page,$per_Page);
                            if(empty($listStu))
                            {
                                $emptyData = true;
                            }
                            break;
                        }else
                        {
                            $emptyData = true;
                            $error = 'NO DATA';
                            // var_dump($emptyData);
                        }
                    }
                    include_once 'classes.php';
                }else
                {
                    $emptyData = true;
                    $error = 'NO DATA';
                }
            }
        }

        public function resetCurrentTurn()
        {
            $cStu = new Students();
            $id = $_GET['id'];
            $StuId = $cStu -> getDataById($id);
            $cStu -> updateCurrentTurn($id);
            header('Location: ?act=listClass&id='. $StuId -> class);
        }

        public function insertClass()
        {
            $cClas = new Classes();
            $cQuesGrp = new QuestionsGroup();
            $listQuesGrp = $cQuesGrp -> getIdAndNameQuesGrp();
            $listClassName = $cClas -> getClassName();
            if(isset($_POST['register-clas']))
            {
                if(isset($_POST['nameClass']) && isset($_POST['startDay']) && isset($_POST['questionGroup']) && isset($_POST['endDay']))
                { 
                    $cClas -> setInsertData(null,$_POST['nameClass'],$_POST['questionGroup'],$_POST['created_at'],$_POST['startDay'],$_POST['endDay']);
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
                    // header('Location: ?act=listClass&id=');
                }
            }
            
            include_once 'registerClass.php';
        }

        public function updateClass()
        {
            $cClas = new Classes();
            $cQuesGrp = new QuestionsGroup();
            $id = $_GET['id'];
            $listClass = $cClas -> getDataByClassName($id);
            $listQuesGrp = $cQuesGrp -> getIdAndNameQuesGrp();
            if(isset($_POST['register-clas']))
            {
                $cClas -> updateData($_POST['className'],$_POST['questionGroup'],$_POST['created_at'],$_POST['startDay'],$_POST['endDay'],$id);
                header('Location: ?act=listClass&id='.$id);
            }
            include_once 'updateClass.php'; 
        }

        public function insertData()
        {
            $cClass = new Classes();
            $cStu = new Students();
            $listClass = $cClass -> getClassNameAndID();
            $listClassName = $cClass -> getClassName();
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
                    // header('Location: ?act=listClass&id=WD19320');
                }
            }
  
            include_once 'registerStudent.php';
        }

        public function uploadData()
        {
            $cStu = new Students();
            $cClass = new Classes();
            $id = $_GET['id'];
            $listStu = $cStu -> getDataById($id);
            $listClass = $cClass -> getClassNameAndID();
            $listClassName = $cClass -> getClassName();
            if(isset($id))
            {
                if(isset($_POST['update-stu']))
                {
                    if(isset($_POST['password']))
                    {
                        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                    }else
                    {
                        $password = $listStu -> password;
                    }

                    $cStu -> updateData($_POST['fullname'],$_POST['username'],$_POST['student_code'],$password,$_POST['class'],$_POST['result1'],$_POST['result2'],$_POST['result3'],$_POST['score'],null,$id);
                    
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
                        // header('Location: ?act=listClass&id=WD19320');
                    }else
                    {
                        // header('Location: ?act=listClass&id=WD19320');
                    }
                }else
                {
                    echo 'Chưa nhập dữ liệu';
                }
            }
            
        }

        

        public function DeleteData()
        {
            $cClass = new Classes();
            $listClassName = $cClass -> getClassName();
            if(isset($_GET['id']))
            {
                $cStu = new Students();
                $id = $_GET['id'];
                $cStu -> deleteData($id,$id);
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
        }

        public function DeleteDataSelected()
        {
            $cClass = new Classes();
            $cStu = new Students();
            if(isset($_POST['btn-delSelected']))
            {
                $deletedItems = isset($_POST['checkboxes']) ? $_POST['checkboxes'] : [];
                foreach($deletedItems as $deletedItem)
                {
                    $cStu -> deleteData($deletedItem,$deletedItem);
                    // header('Location: ?act=listClass&id=WD19320');
                }
            }
        }
    }
?>