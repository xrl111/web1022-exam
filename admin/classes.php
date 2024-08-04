<?php require "./components/menu.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách lớp</title>
    <link rel="stylesheet" href="./styles/classes.css">
</head>
<body>
    <div class="container">
        <div class="content">
            <h2>Danh sách lớp</h2>
            <div class="btn">
                <?php 
                    foreach($listClas as $clas)
                    {
                        ?>
                            <button> <a href="?act=listClass&id=<?php echo $clas -> className ?>"><?php echo $clas -> className ?></a> </button>
                        <?php
                    }
                ?>
            </div>

            <h2><?php echo $_GET['id'] ?></h2>
            <form action="" method="post">
                <label for="">Search Student ID</label>
                <input type="text" name="idStu" >
                <input type="submit" name="search" value="Search">
            </form>

            <div class="listStu">
                <form action="?act=DeleteStudentSelected" method="post">
                        <div class="list" border=1>
                            
                            <table>
                                <tr class="title-table" style="background-color: rgba(172, 255, 47, 0.589);">
                                    <th></th>
                                    <th>Họ và Tên</th>
                                    <th>Lớp </th>
                                    <th>Câu 1</th>
                                    <th>Câu 2</th>
                                    <th>Câu 3</th>
                                    <th>Tổng điểm</th>
                                    <!-- <th>Thời gian </th> -->
                                    <th></th>
                                </tr>


                                <?php
                                    foreach($listStu as $stu)
                                    {
                                        ?>
                                        <tr>
                                            <td class="btn-check"><input type="checkbox" class="checkbox" name="checkboxes[]" value="<?php echo $stu -> id  ?>"></td>
                                            <td class="name"> <?php echo $stu -> fullname  ?> </td>
                                            <td class="class"> <?php echo $stu -> class ?> </td>
                                            <td class="score1"> <?php if($stu -> result_1){echo $stu -> result_1; }else{ echo '0';} ?> </td>
                                            <td class="score2"> <?php if($stu -> result_2){echo $stu -> result_2; }else{ echo '0';} ?>  </td>
                                            <td class="score3"> <?php if($stu -> result_3){echo $stu -> result_3; }else{ echo '0';} ?> </td>
                                            <td class="totalScore"> <?php if($stu -> score){echo $stu -> score; }else{ echo '0';} ?> </td>
                                            <td class="btn-setting-delete">
                                                <button type="button"><a href="?act=UpdateStudent&id=<?php echo $stu -> id ?>">SỬA</a></button>
                                                <button type="button" onclick="confirmDeleted('?act=DeleteStudent&id=<?php echo $stu -> id?>')">XOÁ</button>     
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                ?>
                            </table>
                        </div>


                        <div class="btn-func">
                            <button type="button" onclick="selectAll()">Chọn tất cả</button>
                            <button type="button" onclick="deselectAll()">Bỏ chọn tất cả</button>
                            <button onclick="confirmDeleted('?act=DeleteStudentSelected')" type="submit" name="btn-delSelected">Xoá các mục đã chọn</button>
                            <button type="button"><a href="?act=AddStudent">Nhập thêm</a></button>
                        </div>

                </form>

                <div class="list">
                    <table>
                        <tr class="title-table" style="background-color: rgba(172, 255, 47, 0.589);">
                                <th>Set Point</th>
                        </tr>
                    </table>
                <?php
                    foreach($listStu as $stu)
                    {
                        ?>
                        <form action="?act=SetPoint" method="post">
                            <table>
                                <tr>
                                    <td>
                                        <input type="number" name="point">
                                        <input type="hidden" name="id" value="<?php echo $stu -> id ?>">
                                        <input type="submit" name="setPoint" value="Set Point">
                                    </td>
                                </tr>
                            </table>
                        </form>
                        <?php
                    }
                    ?>
                    
                </div>
                
            </div>
            
            

        </div>

        <div class="pagination">
            <?php
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