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

    public function getIdQuestionGroup(){
        $sql = 'SELECT question_groups.id FROM question_groups';
        $this->connect->setQuery($sql);
        return $this->connect->loadData();
    }

    public function getIdAndNameQuesGrp(){
        $sql = 'SELECT question_groups.id,question_groups.name FROM question_groups';
        $this->connect->setQuery($sql);
        return $this->connect->loadData();
    }

    public function getIdAndNameQuesGrpByID($idClass,$idQuesGrp){
        $sql = 'SELECT classes.className,classes_question_group as IDClass,question_groups_id as IDQuesGrp,question_groups.name as QuesGrpName  FROM `classes_question_groups` 
                JOIN classes on classes.id = classes_question_groups.classes_question_group
                JOIN question_groups on question_groups.id = classes_question_groups.question_groups_id
                WHERE classes_question_group = ? AND question_groups_id = ?';
        $this->connect->setQuery($sql);
        return $this->connect->loadData([$idClass,$idQuesGrp],false);
    }

    public function getDataClassandQuesGrp(){
        $sql = 'SELECT classes.className,classes.id as IDClass,question_groups.id as IDQuestionGroup,question_groups.name as QuesGrpName  from classes_question_groups
                JOIN classes ON classes.id = classes_question_groups.classes_question_group
                JOIN question_groups ON question_groups.id = classes_question_groups.question_groups_id';
        $this->connect->setQuery($sql);
        return $this->connect->loadData();
    }

    public function updateRelationshipClassQuesGrp($valueClass,$valueQuesGrp,$idClass,$idQuesGrp){
        $sql = 'UPDATE `classes_question_groups`SET `classes_question_group` = ?, `question_groups_id` = ? WHERE `classes_question_group` = ? AND `question_groups_id` = ?';
        $this->connect->setQuery($sql);
        return $this->connect->execute([$valueClass,$valueQuesGrp,$idClass,$idQuesGrp]);
    }

    public function getAllQuestionGroupById($id){
        $sql = 'SELECT * FROM question_groups WHERE id= ?';
        $this->connect->setQuery($sql);
        return $this->connect->loadData([$id], false);
    }

    public function setInsertQuestionGroups($id,$name){
        $sql = 'INSERT INTO question_groups VALUES (?,?,?,?)';
        $this->connect->setQuery($sql);
        return $this->connect->execute([$id,$name]);
    }

    public function setInsertRelationShip($classes,$questionGrp){
        $sql = 'INSERT INTO classes_question_groups VALUES (?,?)';
        $this->connect->setQuery($sql);
        return $this->connect->execute([$classes,$questionGrp]);
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