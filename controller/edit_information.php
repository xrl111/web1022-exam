<?php
class user {

    public function update() {
        if (isset($_GET['id'])) {
            $userId = $_GET['id'];
            $userModel = new UserModel();
            $userIdQuestion = $userModel->getIdQuestion($userId);
            
            // Uncomment if debugging is needed
            // var_dump($userIdQuestion);
            // die();
            
            if (isset($_POST['submit'])) {
                $username = $_POST['name'];
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                
                $userModel->update($username, $password, $userId);
                echo "User information updated successfully.";
                header('location: logout.php');
                exit();
            }
        } else {
            echo "User ID not set in session or GET parameters.";
        }
        include_once 'view/edit_information.php';
    }
}
?>



