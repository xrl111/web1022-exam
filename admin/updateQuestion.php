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
        <h1>Update</h1>
        <form action="?act=UpdateQuestion&id=<?php echo $listQues -> id ?>" method="POST">
            <label for="number">Number:</label>
            <input type="text" id="number" name="number" value="<?php echo $listQues -> number  ?>" required>
            
            <label for="question">Question:</label>
            <input type="text" id="question" name="question" value="<?php echo $listQues -> question ?>" required>
            
            <label for="answer">Answer:</label>
            <input type="answer" id="answer" name="answer" value="<?php echo $listQues -> answer ?>" required>
            
            <label for="role">Question Group:</label>
            <select name="questionGroup" id="question Group">
                <?php
                
                foreach($listQuesGrp as $grp)
                {
                    if($listQues -> question_groups == $grp -> id)
                    {
                        ?>
                        <option  value="<?php echo $grp -> id  ?>"> <?php echo $grp -> name ?> </option>
                        <?php
                    }else
                    {
                        ?>
                        <option  value="<?php echo $grp -> id  ?>"> <?php echo $grp -> name ?> </option>
                        <?php
                    }
                }
                ?>
            </select>
            
            <button type="submit" name="update-ques">Update</button>
        </form>
    </div>
</body>
</html>

