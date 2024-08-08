<?php
$admin_name = '';
if (isset($_SESSION['username'])) {
  $admin_name = $_SESSION['username'];
}
require_once __DIR__ . '/../classes/Models/MClass.php';
require_once __DIR__ . '/../classes/Models/MQuestionGroup.php';
      $cClas = new Classes();
      $cQuesGrp = new QuestionsGroup();
      $classNameResult = $cClas->getClassName();
      $listClassName = isset($classNameResult) ? $classNameResult : '';

      $questionGroupResult = $cQuesGrp->getIdQuestionGroup();
      $listNameQuesGroup = isset($questionGroupResult) ? $questionGroupResult : '';
      if(isset($listClassName) || $listClassName == '')
      {
          foreach($listClassName as $className)
          {
             $linkClass = $className -> className;
             break;
          }
      }else
      {
          $linkClass = '';
      }

      if(isset($listNameQuesGroup) || $listNameQuesGroup == '')
      {
          foreach($listNameQuesGroup as $quesGrp)
          {
             $linkQuesGrp = $quesGrp -> id;
             break;
          }
      }else
      {
          $linkQuesGrp = '';
      }

// ?>

 <ul class="nav nav-tabs">
    <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="index.php?act=listClass&id=<?php echo $linkClass ?>">Danh sách Lớp</a>
    </li>
    <li class="nav-item">
    <a class="nav-link"   data-toggle="tab" href="index.php?act=listQuestion&id=<?php echo $linkQuesGrp ?>">Danh sách các nhóm câu hỏi</a>
    </li>
    <li class="nav-item">
    <a class="nav-link"   data-toggle="tab" href="index.php?act=Config">Config</a>
    </li>
    <li class="nav-item">
    <a class="nav-link"   data-toggle="tab" href="index.php?act=RelationshipClassAndQuesGrp">Danh sách mối quan hệ giữa lớp và nhóm câu hỏi</a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-danger" href="#">Chào <?=htmlspecialchars($admin_name);?></a>
    </li>
    <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="../logout.php">Thoát</a>
    </li>
</ul>
