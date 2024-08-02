<!-- register.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Register</h1>
        <form action="?act=UpdateStudent&id=<?php echo $listStu -> id ?>" method="POST">
            <label for="fullname">Full Name:</label>
            <input type="text" id="fullname" name="fullname" required value="<?php echo $listStu -> fullname ?>">
            
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required value="<?php echo $listStu -> username?>">
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required value="<?php echo $listStu -> password?>">
            
            <label for="role">Class:</label>
            <input type="class" id="class" name="class" required value="<?php echo $listStu -> class?>">

            <label for="student_code">Student Code:</label>
            <input type="text" id="student_code" name="student_code" value="<?php echo $listStu -> student_code?>">

            <label for="student_code">Result 1:</label>
            <input type="number" id="result1" name="result1" value="<?php echo $listStu -> result_1?>">

            <label for="student_code">Result 2:</label>
            <input type="number" id="result2" name="result2" value="<?php echo $listStu -> result_2?>">

            <label for="student_code">Result 3:</label>
            <input type="number" id="result3" name="result3" value="<?php echo $listStu -> result_3?>">

            <label for="student_code">Score:</label>
            <input type="number" id="score" name="score" value="<?php echo $listStu -> score?>">
            
            <button type="submit" name="update-stu">Upload</button>
        </form>
    </div>
</body>
</html>

