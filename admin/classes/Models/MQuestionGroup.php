<?php
require_once 'ConnectDB.PHP';
class QuestionsGroup{
    public $connect;
    public function __construct(){
        $this->connect = new ConnectDB;
    }
    public function getAllQuestionsGroup(){
        $sql = 'SELECT * FROM question_groups';
        $this->connect->setQuery($sql);
        return $this->connect->loadData();
    }

    // public function getAllQuestionsById($id){
    //     $sql = 'SELECT * FROM questions WHERE id= ?';
    //     $this->connect->setQuery($sql);
    //     return $this->connect->loadData([$id], false);
    // }

    // public function setInsertQuestions($id,$number,$question,$answer,$question_groups,$created_at){
    //     $sql = 'INSERT INTO questions VALUES (?,?,?,?,?,?)';
    //     $this->connect->setQuery($sql);
    //     return $this->connect->execute([$id,$number,$question,$answer,$question_groups,$created_at]);
    // }

    // public function updateQuestions($number,$question,$answer,$question_groups,$created_at,$id){
    //     $sql = 'UPDATE questions SET number=?,question=?,answer=?,question_groups=?,created_at=? WHERE id= ?';
    //     $this->connect->setQuery($sql);
    //     return $this->connect->execute([$number,$question,$answer,$question_groups,$created_at,$id]);
    // }

    // public function deleteData($id){
    //     $sql= 'DELETE FROM questions WHERE id= ?';
    //     $this->connect->setQuery($sql);
    //     return $this->connect->loadData([$id], false);
    // }
}

?>