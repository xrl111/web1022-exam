
   <?php
//    var_dump($userIdQuestion);
//    die();
   ?>
   <form action="?act=suathongtin&id=<?php echo $userIdQuestion->id  ?>" method="post" enctype="multipart/form-data">
        <label for="name">Tên mới:</label>
        <input type="text" name="name" value="<?php echo $userIdQuestion->username  ?>">
        <br>
        <label for="password">Mật khẩu mới:</label>
        <input type="password"  name="password">
        <br>
        <input type="submit" name="submit" value="Cập nhật">
    </form>

