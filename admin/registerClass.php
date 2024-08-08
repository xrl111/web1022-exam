<!-- register.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register class</title>
    <link rel="stylesheet" type="text/css" href="./styles/form-page.css">
</head>
<body>
    <div class="container">
        <h1>Register a new class</h1>
        <form action="?act=AddClass" method="POST" class="form">
            <div class="form-group">
                <label for="fullname">Name Class:</label>
                <input type="text" id="fullname" name="nameClass" required>
            </div>
            <div class="form-group">
                <label for="fullname">Question Groups:</label>
                <select name="questionGroup" id="fullname" required>
                    <?php
                        foreach($listQuesGrp as $ques)
                        {
                            ?>
                                <option  value="<?php echo $ques -> id  ?>"> <?php echo $ques -> name ?> </option>
                            <?php
                        }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="fullname">Created :</label>
                <input type="date" id="fullname" name="created_at" required>
            </div>
            <div class="form-group">
                <label for="username">Start Date:</label>
                <input type="date" id="username" name="startDay" required>
            </div>
            <div class="form-group">
                <label for="password">End Date:</label>
                <input type="date" id="password" name="endDay" required>
            </div>
            <div class="form-group"> 
                <button type="submit" name="register-clas">Register</button>
            </div>
        </form>
    </div>
</body>
</html>

