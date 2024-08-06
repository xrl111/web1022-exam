<?php
    require_once 'ConnectDB.PHP';

    class StudenClasses
    {
        public $connect;

        public function __construct()
        {
            $this -> connect = new ConnectDB();
        }

        public function getAllData()
        {
            $sql = 'SELECT * FROM student_classes';
            $this -> connect -> setQuery($sql);
            return $this -> connect -> loadData();
        }

        
        public function setInsertData($id,$id_class)
        {
            $sql = 'INSERT INTO student_classes VALUES (?,?)';
            $this -> connect -> setQuery($sql);
            $this -> connect -> execute([$id, $id_class]);
        }

        public function updateData($id_class, $id)
        {
            $sql = 'UPDATE student_classes SET name = ? WHERE id = ?';
            $this -> connect -> setQuery($sql);
            $this -> connect -> execute([$id_class, $id]);
        }


        public function deleteData($id,$id2)
        {
            $sql = 'DELETE FROM student WHERE id = ?;DELETE FROM student_classes WHERE student_class = ?;';
            $this -> connect -> setQuery($sql);
            $this -> connect -> execute([$id,$id2]);
        }
    }
?>