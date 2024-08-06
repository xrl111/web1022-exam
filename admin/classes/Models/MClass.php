<?php
    require_once 'ConnectDB.php';

    class Classes
    {
        public $connect;

        public function __construct()
        {
            $this -> connect = new ConnectDB();
        }

        public function getAllData()
        {
            $sql = 'SELECT * FROM classes';
            $this -> connect -> setQuery($sql);
            return $this -> connect -> loadData();
        }

        
        public function setInsertData($id, $className, $question_group, $time)
        {
            $sql = 'INSERT INTO classes VALUES (?,?,?,?)';
            $this -> connect -> setQuery($sql);
            $this -> connect -> execute([$id, $className, $question_group, $time]);
        }

        public function updateData($className, $question_group, $time, $id)
        {
            $sql = 'UPDATE classes SET className = ?, question_group = ?, created_at = ? WHERE id = ?';
            $this -> connect -> setQuery($sql);
            $this -> connect -> execute([$className, $question_group, $time, $id]);
        }
        public function deleteData($id,$id2)
        {
            $sql = 'DELETE FROM student_classes WHERE student_class = ?;DELETE FROM classes WHERE id = ?;';
            $this -> connect -> setQuery($sql);
            $this -> connect -> execute([$id,$id2]);
        }
    }
?>