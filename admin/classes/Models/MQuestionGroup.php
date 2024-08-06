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

    public function getAllQuestionGroupById($id){
        $sql = 'SELECT * FROM question_groups WHERE id= ?';
        $this->connect->setQuery($sql);
        return $this->connect->loadData([$id], false);
    }

    public function setInsertQuestionGroups($id,$name){
        $sql = 'INSERT INTO question_groups VALUES (?,?)';
        $this->connect->setQuery($sql);
        return $this->connect->execute([$id,$name]);
    }

    public function updateQuestions($name,$id){
        $sql = 'UPDATE question_groups SET name=? WHERE id= ?';
        $this->connect->setQuery($sql);
        return $this->connect->execute([$name,$id]);
    }

    public function deleteData($id){
        $sql= 'DELETE FROM question_groups WHERE id= ?';
        $this->connect->setQuery($sql);
        return $this->connect->loadData([$id], false);
    }
}

?>