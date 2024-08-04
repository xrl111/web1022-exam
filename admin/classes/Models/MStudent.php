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

        public function getDataByStudentCode($id)
        {
            $sql = "SELECT * FROM student WHERE student_code = ?";
            $this -> connect -> setQuery($sql);
            return $this -> connect -> loadData([$id]);
        }
        
        public function getAllDataById($id)
        {
            $sql = "SELECT * FROM student WHERE class = '" . $id . "'";
            $this -> connect -> setQuery($sql);
            return $this -> connect -> loadData();
        }

        public function getDataFromUser($user)
        {
            $sql = "SELECT * FROM student WHERE username = ? ";
            $this -> connect -> setQuery($sql);
            return $this -> connect -> loadData([$user],false);
        }

        public function getResultFromUser($user)
        {
            $sql = "SELECT result_1,result_2,result_3  FROM student WHERE username = ? ";
            $this -> connect -> setQuery($sql);
            return $this -> connect -> loadData([$user],false);
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
        
        public function setInsertData($id, $fullname, $name, $stu_code ,$password, $class, $result_1, $result_2, $result_3,$score,$time,$current_turn)
        {
            $sql = 'INSERT INTO student VALUES (?,?,?,?,?,?,?,?,?,?,?,?)';
            $this -> connect -> setQuery($sql);
            $this -> connect -> execute([$id, $fullname, $name, $stu_code ,$password, $class, $result_1, $result_2, $result_3,$score,$time,$current_turn]);
        }

        public function updateData($fullname, $name, $stu_code ,$password, $class, $result_1, $result_2, $result_3,$score,$time, $id)
        {
            $sql = 'UPDATE student SET fullname = ?, username = ?,student_code = ?,password=?, class = ?, result_1 = ?,result_2 = ?,result_3 = ?,score = ?, created_at = ? WHERE id = ?';
            $this -> connect -> setQuery($sql);
            $this -> connect -> execute([$fullname, $name, $stu_code ,$password, $class, $result_1, $result_2, $result_3,$score,$time, $id]);
        }

        public function updateResult($result_1, $result_2, $result_3, $username)
        {
            $sql = 'UPDATE student SET result_1 = ?,result_2 = ?,result_3 = ? WHERE username = ?';
            $this -> connect -> setQuery($sql);
            $this -> connect -> execute([$result_1, $result_2, $result_3,$username]);
        } 

        public function updateScore($score, $id)
        {
            $sql = 'UPDATE student SET score = ? WHERE id = ?';
            $this -> connect -> setQuery($sql);
            $this -> connect -> execute([$score, $id]);
        }

        public function updateTurn($current_turn,$username)
        {
            $sql = 'UPDATE student SET current_turn = ? WHERE username = ?';
            $this -> connect -> setQuery($sql);
            $this -> connect -> execute([$current_turn,$username]);
        }

        public function updatePassword($password, $username)
        {
            $sql = 'UPDATE student SET password = ? WHERE username = ?';
            $this -> connect -> setQuery($sql);
            $this -> connect -> execute([$password, $username]);
        }

        public function updateFullname($fullname, $username)
        {
            $sql = 'UPDATE student SET fullname = ? WHERE username = ?';
            $this -> connect -> setQuery($sql);
            $this -> connect -> execute([$fullname, $username]);
        }

        public function deleteData($id,$id2)
        {
            $sql = 'DELETE FROM student_classes WHERE student_class = ?;DELETE FROM student WHERE id = ?;';
            $this -> connect -> setQuery($sql);
            $this -> connect -> execute([$id,$id2]);
        }
    }
?>