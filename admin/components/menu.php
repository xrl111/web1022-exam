<?php
$admin_name = '';
if (isset($_SESSION['username'])) {
  $admin_name = $_SESSION['username'];
}

function renderMenu($admin_name) { // Modified to accept $admin_name as a parameter
    ?>
    <div class="menu">
        <ul>
            <li><a href="./index.php"><?php echo htmlspecialchars($admin_name); ?></a></li>
            <li><a href="./users.php">Danh sách người dùng</a></li>
            <li><a href="./question_groups.php">Danh sách các nhóm câu hỏi</a></li>
            <li><a href="./questions.php">Danh sách câu hỏi</a></li>
            <li><a href="../logout.php">logout</a></li>
        </ul>
    </div>
    <?php
}

// Call renderMenu and pass $admin_name as an argument
renderMenu($admin_name);
?>
 -->

 <ul class="nav nav-tabs">
    <li class="nav-item">
    <a class="nav-link <?php if($page=='classes') echo 'active'  ?>  " data-toggle="tab" href="index.php?page=classes">Danh sách Lớp</a>
    </li>
    <li class="nav-item">
    <a class="nav-link"  <?php if($page=='question_groups') echo 'active'  ?>  data-toggle="tab" href="index.php?page=question_groups">Danh sách các nhóm câu hỏi</a>
    </li>
    <li class="nav-item">
    <a class="nav-link" <?php if($page=='questions') echo 'active'  ?>  data-toggle="tab" href="index.php?page=questions">Danh sách câu hỏi</a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-danger" href="#">Chào <?=htmlspecialchars($admin_name);?></a>
    </li>
    <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="../logout.php">Thoát</a>
    </li>
</ul>
