<?php
 require_once "./admin/classes/model/Mconnect-DB.php";

class UserModel {
    private $connect;

    public function __construct() {
        $this->connect = new ConnectDB();
    }

    public function getIdQuestion($userId) {
        $sql = 'SELECT * FROM student WHERE id = ?';
        $this->connect->setQuery($sql);
        return $this->connect->loadData([$userId], false);
    }

    public function update($username, $password, $userId) {
        $sql = 'UPDATE student SET `username` = ?, `password` = ? WHERE id = ?';
        // var_dump($sql);
        // die();
        $this->connect->setQuery($sql);
        return $this->connect->execute([$username, $password, $userId]);
    }
}
?>

