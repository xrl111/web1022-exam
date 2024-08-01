<?php
require_once "../config.php";

class ClassRepository{
    public function FindAll(){
        $conn = getDbConnection();
        $sql = "SELECT * FROM classes";
        $result = $conn->query($sql);
        $classes = [];
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $classes[] = $row;
            }
        }
        $conn->close();
        return $classes;
    }
    public function findOne($id){
        $conn = getDbConnection();
        $sql = "SELECT * FROM classes WHERE id = $id";
        $result = $conn->query($sql);
        $class = null;
        if ($result->num_rows > 0) {
            $class = $result->fetch_assoc();
        }
        $conn->close();
        return $class;
    }
    public function create($name){
        $conn = getDbConnection();
        $sql = "INSERT INTO classes (name) VALUES (?)";
    
        // Prepare statement
        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            // Handle prepare error
            error_log("Prepare failed: " . $conn->error);
            return false;
        }
    
        // Bind parameters and execute
        $stmt->bind_param("s", $name);
        if (!$stmt->execute()) {
            // Handle execute error
            error_log("Execute failed: " . $stmt->error);
            $stmt->close();
            $conn->close();
            return false;
        }
    
        $stmt->close();
        $conn->close();
        return true;
    }
    public function update($id, $name){
        $conn = getDbConnection();
        $sql = "UPDATE classes SET name = '$name' WHERE id = $id";
        $result = $conn->query($sql);
        $conn->close();
        return $result;
    }
    public function delete($id){
        $conn = getDbConnection();
        $sql = "DELETE FROM classes WHERE id = $id";
        $result = $conn->query($sql);
        $conn->close();
        return $result;
    }
}
?>