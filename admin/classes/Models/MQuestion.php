<?php
require_once 'ConnectDB.PHP';
class Questions{
    public $connect;
    public function __construct(){
        $this->connect = new ConnectDB;
    }
    public function getAllQuestions(){
        $sql = 'SELECT * FROM questions';
        $this->connect->setQuery($sql);
        return $this->connect->loadData();
    }

    

    public function getAllQuestionsByNumber($number){
        $sql = 'SELECT * FROM questions WHERE number= ?';
        $this->connect->setQuery($sql);
        return $this->connect->loadData([$number]);
    }

    public function countQuestion(){
        $sql = 'SELECT COUNT(question) as TotalOfQuestion FROM questions;';
        $this->connect->setQuery($sql);
        return $this->connect->loadData();
    }

    public function getResultByNumber($number){
        $sql = 'SELECT * FROM questions WHERE number= ?';
        $this->connect->setQuery($sql);
        return $this->connect->loadData([$number],false);
    }

    public function getDataByIdQues($id){
        $sql = 'SELECT * FROM questions WHERE id = ?';
        $this->connect->setQuery($sql);
        return $this->connect->loadData([$id],false);
    }

    public function getAllQuestionsById($id){
        $sql = 'SELECT * FROM questions WHERE question_groups = ?';
        $this->connect->setQuery($sql);
        return $this->connect->loadData([$id]);
    }

    public function getAllDataByLimit($id, $from ,$row)
    {
        $sql = "SELECT * FROM questions WHERE question_groups = '" . $id . "'" . " LIMIT " . (int)$from . ", " . (int)$row;
        $this -> connect -> setQuery($sql);
        return $this -> connect -> loadData();
    }

    public function setInsertQuestions($id,$number,$question,$answer,$question_groups,$created_at){
        $sql = 'INSERT INTO questions VALUES (?,?,?,?,?,?)';
        $this->connect->setQuery($sql);
        return $this->connect->execute([$id,$number,$question,$answer,$question_groups,$created_at]);
    }

    public function updateQuestions($number,$question,$answer,$question_groups,$created_at,$id){
        $sql = 'UPDATE questions SET number=?,question=?,answer=?,question_groups=?,created_at=? WHERE id= ?';
        $this->connect->setQuery($sql);
        return $this->connect->execute([$number,$question,$answer,$question_groups,$created_at,$id]);
    }

    public function deleteData($id){
        $sql= 'DELETE FROM questions WHERE id= ?';
        $this->connect->setQuery($sql);
        return $this->connect->loadData([$id], false);
    }
}

?>