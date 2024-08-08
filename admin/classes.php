<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách lớp</title>
    <link rel="stylesheet" type="text/css" href="./styles/styles.css">
</head>
<body>
    <div class="container">
    <?php require "./components/menu.php"; ?>
        <div class="content">
            <h2>Danh sách lớp</h2>
            <div class="list">
                <?php 
                    foreach($listClas as $clas)
                    {
                        ?>
                        <div class="list-item">
                         <a  href="?act=listClass&id=<?php echo $clas -> className ?>"><?php echo $clas -> className ?></a>
                        </div>
                            
                        <?php
                    }
                ?>
            </div>

            <?php
                if($emptyData == false)
                {
                    ?>
                        <h2><?php echo $_GET['id'] ?></h2>
                        <form action="" method="post" class="search-form">
                            <div class="search-item"><label for="">Search Student ID</label></div>
                            <div class="search-item"><input type="text" name="idStu" ></div>
                            <div class="search-item"><input type="submit" name="search" value="Search"></div>
                        </form>
                    <?php
                }
                
            ?>
            
            <div >
            <button id="registerClass">
                <a href="?act=AddClass">REGISTER CLASS</a>
            </button>
            <button id="updateClass">
                <a href="?act=UpdateClass&id=<?php echo $id ?>">UPDATE CLASS</a>
            </button>
            </div>
            <div class="listStu">
                <form action="?act=DeleteStudentSelected" method="post">
                        <div class="list" border=1>
                            
                            <table>
                                <tr class="title-table" style="background-color: rgba(172, 255, 47, 0.589);">
                                    <th></th>
                                    <th>Họ và Tên</th>
                                    <th>Mã sinh viên</th>
                                    <th>Lớp </th>
                                    <th>Câu 1</th>
                                    <th>Câu 2</th>
                                    <th>Câu 3</th>
                                    <th>Tổng điểm</th>
                                    <th></th>
                                    <th></th>
                                </tr>


                                <?php
                                if($emptyData == true)
                                {
                                    ?>
                                    <tr>
                                            <td class="btn-check"><?php echo $error ?></td>
                                            <td class="name"><?php echo $error ?></td>
                                            <td class="student-code"><?php echo $error ?></td>
                                            <td class="class"><?php echo $error ?></td>
                                            <td class="score1"><?php echo $error ?></td>
                                            <td class="score2"><?php echo $error ?></td>
                                            <td class="score3"><?php echo $error ?></td>
                                            <td class="totalScore"><?php echo $error ?></td>
                                    </tr>
                                    <?php
                                }else
                                {
                                    foreach($listStu as $stu)
                                    {
                                        ?>
                                        <tr>
                                            <td class="btn-check"><input type="checkbox" class="checkbox" name="checkboxes[]" value="<?php echo $stu -> id  ?>"></td>
                                            <td class="name"> <?php echo $stu -> fullname  ?> </td>
                                            <td class="student-code"> <?php echo $stu -> student_code ?> </td>
                                            <td class="class"> <?php echo $stu -> class ?> </td>
                                            <td class="score1"> <?php if($stu -> result_1){echo $stu -> result_1; }else{ echo '0';} ?> </td>
                                            <td class="score2"> <?php if($stu -> result_2){echo $stu -> result_2; }else{ echo '0';} ?>  </td>
                                            <td class="score3"> <?php if($stu -> result_3){echo $stu -> result_3; }else{ echo '0';} ?> </td>
                                            <td class="totalScore"> <?php if($stu -> score){echo $stu -> score; }else{ echo '0';} ?> </td>
                                            <td class="btn-setting-delete"> 
                                                <button type="button" class="update-btn"><a href="?act=UpdateStudent&id=<?php echo $stu -> id ?>">SỬA</a></button>
                                                <button type="button" class="update-btn"><a href="?act=ResetCurrentTurn&id=<?php echo $stu -> id ?>">RESET</a></button>     
                                            </td>
                                            <td class="btn-setting-delete">
                                                <button type="button" class="delete-btn" onclick="confirmDeleted('?act=DeleteStudent&id=<?php echo $stu -> id?>')">XOÁ</button>     
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                            </table>
                        </div>

                    <?php
                        if($emptyData == false)
                        {
                            ?>
                            <div class="btn-func">
                                <button type="button" onclick="selectAll()">Chọn tất cả</button>
                                <button type="button" onclick="deselectAll()">Bỏ chọn tất cả</button>
                                <button onclick="confirmDeleted('?act=DeleteStudentSelected')" type="submit" name="btn-delSelected">Xoá các mục đã chọn</button>
                                <button type="button"><a href="?act=AddStudent">Nhập thêm</a></button>
                            </div>
                            <?php
                        }
                    ?>

                </form>
            </div>
            
            

        </div>

        <div class="pagination">
            <?php
                if($emptyData == false)
                {
                    if($hidePag == false)
                    {
                        ?>
                            <a href="?act=listClass&id=<?php echo $_GET['id'] ?>&page=1">FIRST</a>
                        <?php
                    
                    
                        for($i = 1; $i <= $total_pages; $i++)
                        {
                            ?>  
                                <a href="?act=listClass&id=<?php echo $_GET['id'] ?>&page=<?php echo $i ?>"> <?php echo $i  ?> </a>
                            <?php
                        }
                    
                    
                        ?>
                            <a href="?act=listClass&id=<?php echo $_GET['id'] ?>&page=<?php echo $total_pages ?>">LAST</a>
                        <?php
                    }
                }
                
            ?>
        </div>

    </div>
</body>
</html>

<script>
    function selectAll()
    {
      let checkboxes = document.querySelectorAll('.checkbox');
      checkboxes.forEach(function(checkbox)
      {
        checkbox.checked = true;
      });
    }

    function deselectAll()
    {
      let checkboxes = document.querySelectorAll('.checkbox');
      checkboxes.forEach(function(checkbox)
      {
        checkbox.checked = false;
      });
    }

    function confirmDeleted(delURL)
    {
      if(confirm('ARE YOU SURE DELETE SELECTED DATA'))
      {
        document.location = delURL;
      }
    }
</script>
