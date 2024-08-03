<?php
require_once 'Mconnect-DB.php';
class Questions{
    public $connect;
    public function __construct(){
        $this->connect = new ConnectDB;
    }
    public function allQuestion(){
        $sql = 'SELECT * FROM questions';
        $this->connect->setQuery($sql);
        return $this->connect->loadData();
    }

    public function getIdQuestion($id){
        $sql = 'SELECT * FROM questions WHERE id= ?';
        $this->connect->setQuery($sql);
        return $this->connect->loadData([$id], false);
    }

    public function insertQuestion($id,$number,$question,$answer,$question_groups,$created_at){
        $sql = 'INSERT INTO questions VALUES (?,?,?,?,?,?)';
        // var_dump($sql);
        // die();
        $this->connect->setQuery($sql);
        return $this->connect->execute([$id,$number,$question,$answer,$question_groups,$created_at]);
    }

    public function updateQuestion($number,$question,$answer,$question_groups,$created_at,$id){
        $sql = 'UPDATE questions SET `number`=?,`question`=?,`answer`=?,`question_groups`=?,`created_at`=? WHERE id= ?';
        $this->connect->setQuery($sql);
        return $this->connect->execute([$number,$question,$answer,$question_groups,$created_at,$id]);
    }

    public function delQuestion($id){
        $sql= 'DELETE FROM questions WHERE id= ?';
        $this->connect->setQuery($sql);
        return $this->connect->loadData([$id], false);
    }
}
?>