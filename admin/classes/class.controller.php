<?php
require_once "class.service.php";

class ClassController {
    private $service;

    public function __construct() {
        $this->service = new ClassService();
    }

    public function handleRequest() {
        $action = $_GET['action'] ?? 'list'; // Default action is 'list'
        switch ($action) {
            case 'list':
                $this->listItems();
                break;
            case 'view':
                $this->viewItem();
                break;
            case 'add':
                $this->addItem();
                break;
            case 'update':
                $this->updateItem();
                break;
            case 'delete':
                $this->deleteItem();
                break;
            default:
                echo "Action not recognized";
                break;
        }
    }

    private function listItems() {
        $items = $this->service->getAllItems();
        // You can include a view file here to display $items
        echo json_encode($items);
    }

    private function viewItem() {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            echo "ID is required";
            return;
        }
        $item = $this->service->getItemById($id);
        echo json_encode($item);
    }

    private function addItem() {
        $item = $_POST['item'] ?? null;
        if (!$item) {
            echo "Item data is required";
            return;
        }
        $result = $this->service->addItem($item);
        echo json_encode(['success' => $result]);
    }

    private function updateItem() {
        $id = $_POST['id'] ?? null;
        $item = $_POST['item'] ?? null;
        if (!$id || !$item) {
            echo "ID and item data are required";
            return;
        }
        $result = $this->service->updateItem($id, $item);
        echo json_encode(['success' => $result]);
    }

    private function deleteItem() {
        $id = $_POST['id'] ?? null;
        if (!$id) {
            echo "ID is required";
            return;
        }
        $result = $this->service->deleteItem($id);
        echo json_encode(['success' => $result]);
    }
}

$controller = new ClassController();
$controller->handleRequest();