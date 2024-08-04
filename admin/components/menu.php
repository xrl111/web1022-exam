<?php
$admin_name = '';
if (isset($_SESSION['username'])) {
  $admin_name = $_SESSION['username'];
}
?>
 <ul class="nav nav-tabs">
    <li class="nav-item">
    <a class="nav-link   " data-toggle="tab" href="index.php?act=listClass&id=WD19320">Danh sách Lớp</a>
    </li>
    <li class="nav-item">
    <a class="nav-link"   data-toggle="tab" href="index.php?act=listQuestion&id=1">Danh sách các nhóm câu hỏi</a>
    </li>
    <li class="nav-item">
    <a class="nav-link"   data-toggle="tab" href="index.php?act=listQuestion&id=1">Danh sách câu hỏi</a>
    </li>
    <!-- <li class="nav-item">
        <a class="nav-link text-danger" href="index.php?act=DiceGame">Dice Game</a>
    </li> -->
    <li class="nav-item">
        <a class="nav-link text-danger" href="#">Chào <?=htmlspecialchars($admin_name);?></a>
    </li>
    <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="../logout.php">Thoát</a>
    </li>
</ul>
