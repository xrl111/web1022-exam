<?php
    require_once 'ConnectDB.php';

    class Config
    {
        public $connect;

        public function __construct()
        {
            $this -> connect = new ConnectDB();
        }

        public function getAllDataById($id)
        {
            $sql = 'SELECT * FROM config WHERE id = ?';
            $this -> connect -> setQuery($sql);
            return $this -> connect -> loadData([$id],false);
        }

    }
?>