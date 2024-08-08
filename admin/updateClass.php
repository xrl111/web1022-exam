<!-- register.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update class</title>
    <link rel="stylesheet" type="text/css" href="./styles/form-page.css">
</head>
<body>
    <div class="container">
        <h1>Update class</h1>
        <form action="?act=UpdateClass&id=<?php echo $_GET['id'] ?>" method="POST" class="form">
            <div class="form-group">
                <label for="fullname">Name Class:</label>
                <input type="text" id="fullname" name="className" value="<?php echo $listClass -> className ?>" required>
            </div>
            <div class="form-group">
                <label for="fullname">Question Groups:</label>
                <select name="questionGroup" id="fullname">
                    <?php
                        foreach($listQuesGrp as $ques)
                        {
                            if($ques -> id == $listClass -> question_group)
                            {
                                ?>
                                    <option selected value="<?php echo $ques -> id  ?>"> <?php echo $ques -> name ?> </option>
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
                <!-- <input type="text" id="fullname" name="questionGroup" value="<?php echo $listClass -> question_group ?>" required> -->
            </div>
            <div class="form-group">
                <label for="fullname">Created :</label>
                <input type="date" id="fullname" name="created_at" value="<?php echo $listClass -> created_at ?>" required>
            </div>
            <div class="form-group">
                <label for="username">Start Date:</label>
                <input type="date" id="username" name="startDay" value="<?php echo $listClass -> startday ?>" required>
            </div>
            <div class="form-group">
                <label for="password">End Date:</label>
                <input type="date" id="password" name="endDay" value="<?php echo $listClass -> endday ?>" required>
            </div>
            <div class="form-group"> 
                <button type="submit" name="register-clas">Update</button>
            </div>
        </form>
    </div>
</body>
</html>

