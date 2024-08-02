<?php
    require_once 'ConnectDB.PHP';

    class Students
    {
        public $connect;

        public function __construct()
        {
            $this -> connect = new ConnectDB();
        }

        public function getAllData()
        {
            $sql = 'SELECT * FROM student';
            $this -> connect -> setQuery($sql);
            return $this -> connect -> loadData();
        }
        
        public function getAllDataById($id)
        {
            $sql = "SELECT * FROM student WHERE class = '" . $id . "'";
            $this -> connect -> setQuery($sql);
            return $this -> connect -> loadData();
        }

        public function getDataById($id)
        {
            $sql = "SELECT * FROM student WHERE id = ?";
            $this -> connect -> setQuery($sql);
            return $this -> connect -> loadData([$id],false);
        }

        public function getAllDataByLimit($id, $from ,$row)
        {
            $sql = "SELECT * FROM student WHERE class = '" . $id . "'" . " LIMIT " . (int)$from . ", " . (int)$row;
            $this -> connect -> setQuery($sql);
            return $this -> connect -> loadData();
        }
        
        public function setInsertData($id, $fullname, $name, $stu_code ,$password, $class, $result_1, $result_2, $result_3,$score,$time)
        {
            $sql = 'INSERT INTO student VALUES (?,?,?,?,?,?,?,?,?,?,?)';
            $this -> connect -> setQuery($sql);
            $this -> connect -> execute([$id, $fullname, $name, $stu_code ,$password, $class, $result_1, $result_2, $result_3,$score,$time]);
        }

        public function updateData($fullname, $name, $stu_code ,$password, $class, $result_1, $result_2, $result_3,$score,$time, $id)
        {
            $sql = 'UPDATE student SET fullname = ?, username = ?,student_code = ?,password=?, class = ?, result_1 = ?,result_2 = ?,result_3 = ?,score = ?, created_at = ? WHERE id = ?';
            $this -> connect -> setQuery($sql);
            $this -> connect -> execute([$fullname, $name, $stu_code ,$password, $class, $result_1, $result_2, $result_3,$score,$time, $id]);
        }

        public function deleteData($id,$id2)
        {
            $sql = 'DELETE FROM student_classes WHERE student_class = ?;DELETE FROM student WHERE id = ?;';
            $this -> connect -> setQuery($sql);
            $this -> connect -> execute([$id,$id2]);
        }
    }
?>