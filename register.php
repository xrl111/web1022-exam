<!-- register.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Register</h1>
        <form action="register.php" method="POST">
            <label for="fullname">Full Name:</label>
            <input type="text" id="fullname" name="fullname" required>
            
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            
            <label for="role">Role:</label>
            <select id="role" name="role" required>
                <option value="student">Student</option>
                <option value="admin">Admin</option>
            </select>
            
            <label for="student_code">Student Code (if Student):</label>
            <input type="text" id="student_code" name="student_code">
            
            <button type="submit">Register</button>
        </form>
    </div>
</body>
</html>
<?php
require_once "./admin/classes/model/config.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];
    
    $conn = getDbConnection();

    if ($role == "student") {
        $student_code = $_POST['student_code'];
        
        $sql = "INSERT INTO student (fullname, username, student_code, password, class, result_1, result_2, result_3, score, created_at) 
                VALUES (?, ?, ?, ?, NULL, NULL, NULL, NULL, NULL, NOW())";
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $fullname, $username, $student_code, $password);

    } elseif ($role == "admin") {
        $sql = "INSERT INTO admin (fullname, username, password, created_at) 
                VALUES (?, ?, ?, NOW())";
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $fullname, $username, $password);
    }
    
    if ($stmt->execute()) {
        echo "Registration successful.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
