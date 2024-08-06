<!-- register.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Question form</title>
    <link rel="stylesheet" type="text/css" href="./styles/form-page.css">
</head>
<body>
    <div class="container">
        <div class="content">
        <h1>Add Question form</h1>
        <form action="?act=AddQuestion" method="POST" class="form">
            <div class="form-group">
                <label for="number">Number:</label>
                <input type="text" id="number" name="number" required>
            </div>
            <div class="form-group">
                <label for="question">Question:</label>
                <input type="text" id="question" name="question" required>
            </div>
            <div class="form-group">
                <label for="answer">Answer:</label>
                <textarea name="answer" id="answer" require></textarea>
            </div>
            <div class="form-group">
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
            </div>
            <div class="form-group">
            <button type="submit" name="register-ques">Register</button>
            </div>
        </form>
        </div>
       
    </div>
</body>
</html>

