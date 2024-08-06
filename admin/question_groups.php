
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách nhóm câu hỏi</title>
    <link rel="stylesheet" type="text/css" href="./styles/styles.css">
</head>
<body>
    <div class="container">
    <?php require "./components/menu.php"; ?>
        <div class="content">
            <h2>Danh sách Nhóm</h2>
            <div class="list">
                <?php 
                    foreach($listQuesGrp as $ques)
                    {
                        ?>
                            <div class="list-item"><a  href="?act=listQuestion&id=<?php echo $ques -> id ?>"><?php echo $ques -> name ?></a></div>  
                        <?php
                    }
                ?>
            </div>

            <h2><?php echo $_GET['id'] ?></h2>
            <form action="" method="post" class="search-form">
                <div class="search-item"><label for="">Search Question ID</label></div>
                <div class="search-item"><input type="text" name="idQues" ></div>
                <div class="search-item"><input type="submit" name="search" value="Search"></div>
            </form>

            <div class="listQues">
                <form action="?act=DeleteQuestionSelected" method="post">
                        <div class="list" border=1>
                            
                            <table>
                                <tr class="title-table" style="background-color: rgba(172, 255, 47, 0.589);">
                                    <th></th>
                                    <th>Số thứ tự</th>
                                    <th>Câu hỏi </th>
                                    <th>Câu trả lời</th>
                                    <th>Nhóm câu hỏi</th>
                                    <th></th>
                                    <th></th>
                                </tr>


                                <?php
                                    foreach($listGrp as $ques)
                                    {
                                        ?>
                                        <tr>
                                            <td class="btn-check"><input type="checkbox" class="checkbox" name="checkboxes[]" value="<?php echo $ques -> id  ?>"></td>
                                            <td class="number"> <?php echo $ques -> number  ?> </td>
                                            <td class="question"> <?php echo $ques -> question ?> </td>   
                                            <td class="answer"> <?php echo $ques -> answer ?> </td>
                                            <td class="questionGroup"> <?php echo $ques -> question_groups ?>  </td>
                                            <td class="btn-setting-delete">
                                                <button type="button" class="update-btn"><a href="?act=UpdateQuestion&id=<?php echo $ques -> id ?>">SỬA</a></button>
                                            </td>
                                            <td class="btn-setting-delete">
                                                <button type="button" class="delete-btn" onclick="confirmDeleted('?act=DeleteQuestion&id=<?php echo $ques -> id?>')">XOÁ</button>     
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
                            <button onclick="confirmDeleted('?act=DeleteQuestionSelected')" type="submit" name="btn-delSelected">Xoá các mục đã chọn</button>
                            <button type="button"><a href="?act=AddQuestion">Nhập thêm</a></button>
                        </div>

                </form>
            </div>
            
            

        </div>

        <div class="pagination">
            <?php
                if($hidePag == false)
                {
                    ?>
                        <a href="?act=listQuestion&id=<?php echo $_GET['id'] ?>&page=1">FIRST</a>
                    <?php
                
                
                    for($i = 1; $i <= $total_pages; $i++)
                    {
                        ?>  
                            <a href="?act=listQuestion&id=<?php echo $_GET['id'] ?>&page=<?php echo $i ?>"> <?php echo $i  ?> </a>
                        <?php
                    }
                
                
                    ?>
                        <a href="?act=listQuestion&id=<?php echo $_GET['id'] ?>&page=<?php echo $total_pages ?>">LAST</a>
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