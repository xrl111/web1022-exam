<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="?act=editGroup" method="post">
    <label for="">name</label>
    <input type="text" name="name" value="<?php echo $bPro->name  ?>">
    <input type="submit" name="submit">
    </form>
</body>
</html>