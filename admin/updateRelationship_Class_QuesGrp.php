<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPDATE RELATION BETWEEN CLASS AND QUESTION GROUP</title>
    <link rel="stylesheet" type="text/css" href="./styles/form-page.css">
</head>
<body>

    <form action="?act=UpdateRelationship&idClass=<?php echo $listClasQuesGrp -> IDClass ?>&idGrp=<?php echo $listClasQuesGrp -> IDQuesGrp ?>" method="post" class="form">
    <h1>Update Relationship Between Class and QuestionGrp</h1>
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
                        if($ques -> id == $listClasQuesGrp -> IDQuesGrp && $listClasQuesGrp -> QuesGrpName == $ques -> name)
                        {
                            ?>
                                <option selected value="<?php echo $listClasQuesGrp -> IDQuesGrp  ?>"> <?php echo $listClasQuesGrp -> QuesGrpName ?> </option>
                            <?php
                        }else
                        {
                            ?>  
                                <option  value="<?php echo $ques -> id  ?>"> <?php echo $ques -> name ?> </option>
                            <?php
                        }
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
                        if($class -> id == $listClasQuesGrp -> IDClass && $listClasQuesGrp -> className == $class -> className)
                        {
                            ?>
                                <option selected value="<?php echo $listClasQuesGrp -> IDClass  ?>"> <?php echo $listClasQuesGrp -> className  ?> </option>
                            <?php
                        }else
                        {
                            ?>  
                                <option  value="<?php echo $class -> id  ?>"> <?php echo $class -> className ?> </option>
                            <?php
                        }
                    }
                ?>
            </select>
        </div>

        <div class="form-group">
            <input type="submit" name="update_rela" value="UPDATE">
        </div>
    </form>
</body>
</html>