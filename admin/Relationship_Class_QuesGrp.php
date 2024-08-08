<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RELATION SHIP BETWEEN CLASS AND QUESTIONGROUP</title>
    <link rel="stylesheet" type="text/css" href="./styles/styles.css">
</head>
<style>
    th,td
    {
        text-align: center !important;
    }
    a:hover
    {
        color: blue !important;
    }
    .update-btn:hover
    {
        background-color: lightskyblue !important;
    }
</style>
<body>
    <div class="container">
    <?php require "./components/menu.php"; ?>
        <div class="content">
            <h2>Relationship between class and question group</h2>

            <button id="updateClass">
                <a href="?act=InsertRelationship">INSERT RELATIONSHIP CLASS AND QUESTIONGROUP</a>
            </button>

            <div class="listCfig">
                <form action="" method="post">
                        <div class="list" border=1>
                            
                            <table>
                                <tr class="title-table" style="background-color: rgba(172, 255, 47, 0.589);">
                                    <th>ID CLASS</th>
                                    <th>NAME CLASS</th>
                                    <th>ID QUESTION GROUP</th>
                                    <th>NAME QUESTION GROUP</th>
                                    <th></th>
                                </tr>


                                <?php
                                if($emptyData == true)
                                {
                                    ?>
                                    <tr>
                                            <td class="idClass"><?php echo $error ?></td>
                                            <td class="nameClass"><?php echo $error ?></td>
                                            <td class="idQuesGrp"><?php echo $error ?></td>
                                            <td class="nameQuesGrp"><?php echo $error ?></td>
                                    </tr>
                                    <?php
                                }else
                                {
                                    foreach($listClassQuesGrp as $ques)
                                    {
                                        ?>
                                            <tr>
                                                <td class="idClass"><?php echo $ques -> IDClass ?></td>
                                                <td class="nameClass"><?php echo $ques -> className ?></td>
                                                <td class="idQuesGrp"><?php echo $ques -> IDQuestionGroup ?></td>
                                                <td class="nameQuesGrp"><?php echo $ques -> QuesGrpName ?></td>
                                                <td class="btn-update"><button class="update-btn"><a href="?act=UpdateRelationship&idClass=<?php echo $ques -> IDClass?>&idGrp=<?php echo $ques -> IDQuestionGroup?>">Sửa</a></button></td>
                                            </tr>
                                        <?php
                                    }
                                }
                                ?>
                            </table>
                        </div>

                </form>
            </div>
            
            

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
