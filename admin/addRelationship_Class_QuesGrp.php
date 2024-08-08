<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADD RELATION BETWEEN CLASS AND QUESTION GROUP</title>
    <link rel="stylesheet" type="text/css" href="./styles/form-page.css">
</head>
<body>

    <form action="?act=InsertRelationship" method="post" class="form">
    <h1>Add Relationship Between Class and QuestionGrp</h1>
    <?php
        if($check == true)
        {
            ?>
                <h2><?php echo $error ?></h2>
            <?php
        }
    ?>
        <div class="form-group">
            <label for="role">Question Group</label>
            <select name="quesGrp" id="">
                <?php
                    foreach($listQues as $ques)
                    {
                        ?>  
                            <option  value="<?php echo $ques -> id  ?>"> <?php echo $ques -> name ?> </option>
                        <?php
                    }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="role">Classes</label>
            <select name="classes" id="">
                <?php
                    foreach($listClass as $class)
                    {
                        ?>  
                            <option  value="<?php echo $class -> id  ?>"> <?php echo $class -> className ?> </option>
                        <?php
                    }
                ?>
            </select>
        </div>

        <div class="form-group">
            <input type="submit" name="add_rela" value="ADD">
        </div>
    </form>
</body>
</html>