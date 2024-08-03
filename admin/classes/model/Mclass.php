<?php
class services{
    public $connect;
    public function __construct(){
        $this->connect = new ConnectDB;
    }
    public function allSV(){
        $sql = 'SELECT * FROM `services`';
        $this->connect->setQuery($sql);
        return $this->connect->loadData();
    }

    public function getIdDv($id){
        $sql = 'SELECT * FROM `services` WHERE id= ?';
        $this->connect->setQuery($sql);
        return $this->connect->loadData([$id], false);
    }

    public function insertSv($id,$name,$image,$description,$price,$duration){
        $sql = 'INSERT INTO `services` VALUES (?,?,?,?,?,?)';
        $this->connect->setQuery($sql);
        return $this->connect->execute([$id,$name,$image,$description,$price,$duration]);
    }

    public function updateSv($name,$image,$description,$price,$duration,$id){
        $sql = 'UPDATE `services` SET `name`=?,`image`=?,`description`=?,`price`=?,`duration`=? WHERE id= ?';
        $this->connect->setQuery($sql);
        return $this->connect->execute([$name,$image,$description,$price,$duration,$id]);
    }

    public function delPro($id){
        $sql= 'DELETE FROM `services` WHERE id= ?';
        $this->connect->setQuery($sql);
        return $this->connect->loadData([$id], false);
    }
}
?>