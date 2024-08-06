<?php
    $current_url = $_SERVER['REQUEST_URI'];
    // Kiểm tra URL và thực hiện require_once tương ứng
    if (strpos($current_url, '/web1022-exam/index.php') !== false || strpos($current_url, '/web1022-exam/login.php') !== false) 
    {
        require_once './admin/classes/Models/MStudent.php';
        require_once './admin/classes/Models/MAdmin.php';
        require_once './admin/classes/Models/MConfig.php';
        require_once './admin/classes/Models/MQuestion.php';
        require_once './admin/classes/Models/MClass.php';
    }else if (strpos($current_url, '/web1022-exam/admin/index.php?act=listClass&id=WD19320') !== false || strpos($current_url, '/web1022-exam/admin/index.php?act=DiceGame') !== false) {
        require_once 'classes/Models/MStudent.php';
        require_once 'classes/Models/MClass.php';
        require_once 'classes/Models/MAdmin.php';
        require_once 'classes/Models/MConfig.php';
        require_once 'classes/Models/MQuestion.php';
    }else
    {
        // echo $current_url;
    }
    
        // Thực hiện hành động khác nếu cần

    // require_once 'classes/Models/MStudent.php';
    // require_once 'classes/Models/MAdmin.php';
    class CStudents
    {
        public $connect;

        public function __construct()
        {
            $this -> connect = new Students();
        }

        public function getAllData()
        {
            if (!isLoggedIn() || !isAdmin()) {
                redirectToLogin();
            }else
            {
                $cStu = new Students();
                $listClas = $cStu -> getAllData();
                include_once 'classes.php';
            }
        }

        public function login()
        {
            if(isset($_POST['login']))
            {
                echo '1';
                session_start();
                $cStu = new Students();
                $cAdm = new Admin();
                $username = trim($_POST['username']?? "");
                $password = trim($_POST['password']?? "");
                $error = '';
    
                if(empty($username) || empty($password)|| ($username === "" || $password ===""))
                {
                    $error = 'Please fill in both fields.';
                    return $error;
                }else
                {
                    $listStu = $cStu -> getDataFromUser($username);
                    $listAd = $cAdm -> getDataFromUser($username); 
    
                    if ($listAd && password_verify($password, $listAd -> password)) 
                    {
                        $_SESSION['user_id'] = $listAd -> id;
                        $_SESSION['username'] = $listAd -> username;
                        $_SESSION['user_role'] = 'admin';
                        header("Location: ./admin/index.php?act=listClass&id=WD19320");
                        exit();
                    }
    
                    if ($listStu && password_verify($password, $listStu -> password) ) 
                    {
                        $_SESSION['user_id'] = $listStu -> id;
                        $_SESSION['username'] = $listStu -> username;
                        $_SESSION['fullname'] = $listStu -> fullname;
                        $_SESSION['user_role'] = 'student';   
                        header("Location: index.php?act=ManageInformation");
                        exit();
                    }
    
                    $error = 'Invalid username or password.';
                    return $error;
                }
            }
        }

        public function getDataByUsername()
        {
            if (!isLoggedIn() || !isStudent()) {
                redirectToLogin();
            }else if(isStudent())
            {
                // session_start();
                $cStu = new Students();
                $cClas = new Classes();
                $listStu = $cStu -> getDataFromUser($_SESSION['username']);
                $nameClass = 'WD19320';
                $listDay = $cClas -> getDayExam($nameClass);
                $currentDate = date('Y-m-d');
                include_once 'manageInformation.php';
            }
        }

        public function updateFullname()
        {
            if (!isLoggedIn() || !isStudent()) {
                redirectToLogin();
            }else
            {
                $cStu = new Students();
                if(isset($_POST['update']))
                {
                    if(isset($_POST['fullname']))
                    {
                        $cStu -> updateFullname($_POST['fullname'],$_SESSION['username']);
                    }
                }
                include_once 'updateInformation.php';
            }
        }

        public function resetPassword()
        {
            if (!isLoggedIn() || !isStudent()) {
                redirectToLogin();
            }else
            {
                $cStu = new Students();
                if(isset($_POST['reset']))
                {
                    if(isset($_POST['password']) && isset($_POST['confirmPass']) && $_POST['password'] === $_POST['confirmPass'] )
                    {
                        $password = password_hash($_POST['confirmPass'], PASSWORD_DEFAULT);
                        $cStu -> updatePassword($password,$_SESSION['username']);
                    }
                }
                include_once 'resetPassword.php';
            }
        }

        public function diceGame()
        {
            $cCfig = new Config();
            $cStu = new Students();
            $cQues = new Questions();
            if (!isLoggedIn()) {
                redirectToLogin();
            }else if(isStudent())
            {
                $id = 1;
                $listCfig = $cCfig -> getAllDataById($id);
                $listStu = $cStu -> getDataFromUser($_SESSION['username']);
                $current_turn = $listStu -> current_turn;
                $listResult = $cStu -> getResultFromUser($_SESSION['username']);
                $question1 = $cQues -> getResultByNumber($listResult -> result_1);
                $question2 = $cQues -> getResultByNumber($listResult -> result_2);
                $question3 = $cQues -> getResultByNumber($listResult -> result_3);
                $limit = $listCfig -> limit;
                $checkLock = false;
                $totalOfQues = count($cQues -> getAllQuestions());
                $buttonHidden = false;
                if(isset($_POST['lock']))
                {
                    $checkLock = true;
                }else if(isset($_POST['unlock']))
                {
                    $checkLock = false;
                }
                if(isset($_POST['reset']))  
                {
                    $current_turn = 0;
                    $cStu -> updateTurn($current_turn,$_SESSION['username']);
                    $buttonHidden = false;
                }else
                {
                    if($current_turn >= $limit)
                    {
                        $buttonHidden = true;
                        $checkLock = true;
                    }else
                    {
                        $buttonHidden = false;
                    }
                }

                include_once 'diceGame.php';
            }
        }

        public function LogicDiceGame() 
        {
            $cCfig = new Config();
            $cStu = new Students();
            $listStu = $cStu -> getDataFromUser($_SESSION['username']);
            $current_turn = $listStu -> current_turn;
            $cStu -> updateResult($_POST['content1'],$_POST['content2'],$_POST['content3'],$_SESSION['username']);
                if($_SERVER['REQUEST_METHOD'] === 'POST')
                {
                    $current_turn++;
                    $cStu -> updateTurn($current_turn,$_SESSION['username']);
                    echo $current_turn;
                }

            header('Location: ?act=DiceGame');
        }

    }
?>