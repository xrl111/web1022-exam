<?php
    require_once 'ConnectDB.php';

    class Config
    {
        public $connect;

        public function __construct()
        {
            $this -> connect = new ConnectDB();
        }

        public function getAllData()
        {
            $sql = 'SELECT * FROM config';
            $this -> connect -> setQuery($sql);
            return $this -> connect -> loadData([],false);
        }

        public function getAllDataById($id)
        {
            $sql = 'SELECT * FROM config WHERE id = ?';
            $this -> connect -> setQuery($sql);
            return $this -> connect -> loadData([$id],false);
        }

        public function updateData($limit,$totalScore,$rate1,$rate2,$id)
        {
            $sql = 'UPDATE `config` SET `limit` = ?, `Totalscore` = ?,`rate1` = ?, `rate2` = ? WHERE `id` = ?';
            $this -> connect -> setQuery($sql);
            return $this -> connect -> execute([$limit,$totalScore,$rate1,$rate2,$id]);
        }

    }
?>