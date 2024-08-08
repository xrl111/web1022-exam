<!-- register.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register student</title>
    <link rel="stylesheet" type="text/css" href="./styles/form-page.css">
</head>
<body>
    <div class="container">
        <h1>Register a new student</h1>
        <form action="?act=AddStudent" method="POST" class="form">
            <div class="form-group">
                <label for="fullname">Full Name:</label>
                <input type="text" id="fullname" name="fullname" required>
            </div>
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="role">Class:</label>
                <select name="class" id="class">
                    <?php
                        foreach($listClass as $class)
                        {
                            ?>
                                <option  value="<?php echo $class -> className  ?>"> <?php echo $class -> className ?> </option>
                            <?php
                        } 
                    ?>
                </select>
                <!-- <input type="class" id="class" name="class" required> -->
            </div>
            <div class="form-group">
                <label for="student_code">Student Code:</label>
                <input type="text" id="student_code" name="student_code">
            </div>  
            <div class="form-group"> 
                <button type="submit" name="register-stu">Register</button>
            </div>
        </form>
    </div>
</body>
</html>

