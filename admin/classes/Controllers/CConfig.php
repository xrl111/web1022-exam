<?php
    require_once __DIR__ . '/../Models/MStudent.php';
    require_once __DIR__ . '/../Models/MClass.php';
    require_once __DIR__ . '/../Models/MAdmin.php';
    require_once __DIR__ . '/../Models/MConfig.php';
    require_once __DIR__ . '/../Models/MQuestion.php';
    class CConfig
    {
        public $connect;

        public function __construct()
        {
            $this -> connect = new Config();
        }

        public function getDataConfig()
        {
            if (!isLoggedIn() || !isAdmin()) {
                redirectToLogin();
            }else
            {
                $cCfig = new Config();
                $listCfig = $cCfig -> getAllData();
                if(isset($listCfig) || $listCfig !== '')
                {
                    $emptyData = false;
                }else
                {
                    $emptyData = true;
                    $error = 'NO DATA';
                }
                include_once 'config.php';
            }
        }

        public function updateConfig()
        {
            if (!isLoggedIn() || !isAdmin()) {
                redirectToLogin();
            }else
            {
                $cCfig = new Config();
                $id = isset($_GET['id']) ? $_GET['id'] :  '';
                $listCfig = $cCfig -> getAllData();
                if(isset($id) && $id !== '')
                {
                    $check = true;
                    if(isset($_POST['register-cfig']))
                    {
                        if(isset($_POST['limit']) && isset($_POST['totalScore']))
                        {
                            $check = true;
                            $cCfig -> updateData($_POST['limit'],$_POST['totalScore'],$_POST['rate1'],$_POST['rate2'],$id);
                            header('Location: ?act=Config');
                        }else
                        {
                            $check = false;
                            $error = 'Chưa nhập đầy đủ thông tin';
                        }
                    }
                }else
                {
                    $check = false;
                    $error = 'Không có id của config';
                }
                include_once 'updateConfig.php';
            }
        }

    }
?>