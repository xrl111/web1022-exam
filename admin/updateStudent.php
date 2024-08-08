<!-- register.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link rel="stylesheet" type="text/css" href="./styles/form-page.css">
</head>
<body>
    <div class="container">
        <h1>Update</h1>
        <form action="?act=UpdateStudent&id=<?php echo $listStu -> id ?>" method="POST" class="form">
            <div class="form-group">
                <label for="fullname">Full Name:</label>
                <input type="text" id="fullname" name="fullname" required value="<?php echo $listStu -> fullname ?>">
            </div>
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required value="<?php echo $listStu -> username?>">
            </div>
            <div class="form-group">
                <label for="role">Class:</label>
                <select name="class" id="class" required>
                    <?php
                        foreach($listClass as $class)
                        {
                            if($class -> className == $listStu -> class)
                            {
                                ?>
                                    <option selected value="<?php echo $class -> className ?>"> <?php echo $class -> className ?> </option>
                                <?php
                            }else
                            {
                                ?>
                                    <option value="<?php echo $class -> className  ?>"> <?php echo $class -> className ?> </option>
                                <?php
                            }
                        }
                    ?>
                </select>
                <!-- <input type="class" id="class" name="class" required value="<?php echo $listStu -> class?>"> -->
            </div>
            <div class="form-group">
                <label for="student_code">Student Code:</label>
                <input type="text" id="student_code" name="student_code" value="<?php echo $listStu -> student_code?>">
            </div>
            <div class="form-group">
                <label for="student_code">Result 1:</label>
                <input type="number" id="result1" name="result1" value="<?php echo $listStu -> result_1?>">
            </div>
            <div class="form-group">
                <label for="student_code">Result 2:</label>
                <input type="number" id="result2" name="result2" value="<?php echo $listStu -> result_2?>">
            </div>
            <div class="form-group">
                <label for="student_code">Result 3:</label>
                <input type="number" id="result3" name="result3" value="<?php echo $listStu -> result_3?>">
            </div>
            <div class="form-group">
                <label for="student_code">Score:</label>
                <input type="number" id="score" name="score" value="<?php echo $listStu -> score?>">
            </div>
                <div class="form-group">
                <button type="submit" name="update-stu">Upload</button>
            </div>
        </form>
    </div>
</body>
</html>

