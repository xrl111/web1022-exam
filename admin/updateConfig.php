<!-- register.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update config</title>
    <link rel="stylesheet" type="text/css" href="./styles/form-page.css">
</head>
<body>
    <div class="container">
        <h1>Update config</h1>
        <?php
            if($check == true)
            {
                ?>
                    <form action="?act=UpdateConfig&id=<?php echo $listCfig -> id ?>" method="POST" class="form">
                        <div class="form-group">
                            <label for="fullname">Limit:</label>
                            <input type="text" id="limit" name="limit" value="<?php echo $listCfig -> limit  ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="fullname">Total Score:</label>
                            <input type="text" id="totalScore" name="totalScore" value="<?php echo $listCfig -> Totalscore ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="fullname">Rate 1:</label>
                            <input type="text" id="rate1" name="rate1" value="<?php echo $listCfig -> rate1  ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="fullname">Rate 2:</label>
                            <input type="text" id="rate2" name="rate2" value="<?php echo $listCfig -> rate2 ?>" required>
                        </div>
                        <div class="form-group"> 
                            <button type="submit" name="register-cfig">Update</button>
                        </div>
                    </form>
                <?php
            }else if($check == false)
            {
                echo 'Lỗi: ' . $error;
                ?>
                <button><a href="?act=Config">BACK TO HOME'S CONFIG</a></button>
                <?php
            }
        ?>
        
    </div>
</body>
</html>

