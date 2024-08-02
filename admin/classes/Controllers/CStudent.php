<?php
    require_once 'classes/Models/MStudent.php';
    class CClasses
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
    }
?>