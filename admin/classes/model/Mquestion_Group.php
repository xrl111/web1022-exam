<?php
require_once 'Mconnect-DB.php';
class 	question_groups{
    public $connect;
    public function __construct(){
        $this->connect = new ConnectDB;
    }
    // public function allQuestion(){
    //     $sql = 'SELECT * FROM 	question_groups';
    //     $this->connect->setQuery($sql);
    //     return $this->connect->loadData();
    // }

    // public function getIdDv($id){
    //     $sql = 'SELECT * FROM `student` WHERE id= ?';
    //     $this->connect->setQuery($sql);
    //     return $this->connect->loadData([$id], false);
    // }

    public function insertQuestionG($id,$name){
        $sql = 'INSERT INTO question_groups VALUES (?,?)';
        // var_dump($sql);
        // die();
        $this->connect->setQuery($sql);
        return $this->connect->execute([$id,$name]);
    }

    // public function updateSv($number,$question,$answer,$question_groups,$created_at,$id){
    //     $sql = 'UPDATE 	question_groups SET `fullname`=?,`username`=?,`password`=?,`created_at`=? WHERE id= ?';
    //     $this->connect->setQuery($sql);
    //     return $this->connect->execute([$fullname,$username,$password,$created_at,$id]);
    // }

    // public function delPro($id){
    //     $sql= 'DELETE FROM `student` WHERE id= ?';
    //     $this->connect->setQuery($sql);
    //     return $this->connect->loadData([$id], false);
    // }
}
?>