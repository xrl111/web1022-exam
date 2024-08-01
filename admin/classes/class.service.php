<?php
require_once "../config.php";
require_once "class.repository.php";

class ClassService {
    private $repository;

    public function __construct() {
        $this->repository = new ClassRepository();
    }

    public function getAllItems() {
        return $this->repository->FindAll();
    }

    public function getItemById($id) {
        return $this->repository->findOne($id);
    }

    public function addItem($item) {
        return $this->repository->create($item);
    }

    public function updateItem($id, $item) {
        return $this->repository->update($id, $item);
    }

    public function deleteItem($id) {
        return $this->repository->delete($id);
    }
}
?>