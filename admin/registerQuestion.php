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
        <form action="?act=AddQuestion" method="POST">
            <label for="number">Number:</label>
            <input type="text" id="number" name="number" required>
            
            <label for="question">Question:</label>
            <input type="text" id="question" name="question" required>
            
            <label for="answer">Answer:</label>
            <input type="answer" id="answer" name="answer" required>
            
            <label for="role">Question Group:</label>
            <select name="questionGroup" id="question Group">
                <?php
                foreach($listQuesGrp as $grp)
                {
                    ?>
                        <option  value="<?php echo $grp -> id  ?>"> <?php echo $grp -> name ?> </option>
                    <?php
                }
                ?>
            </select>
            
            <button type="submit" name="register-ques">Register</button>
        </form>
    </div>
</body>
</html>

