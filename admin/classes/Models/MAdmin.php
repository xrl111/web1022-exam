<?php
    require_once 'ConnectDB.PHP';

    class Admin
    {
        public $connect;

        public function __construct()
        {
            $this -> connect = new ConnectDB();
        }

        public function getDataFromUser($user)
        {
            $sql = "SELECT * FROM admin WHERE username = ? ";
            $this -> connect -> setQuery($sql);
            return $this -> connect -> loadData([$user],false);
        }
    }
?>