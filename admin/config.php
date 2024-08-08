<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Config</title>
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
            <h2>Config</h2>

            <div class="listCfig">
                <form action="" method="post">
                        <div class="list" border=1>
                            
                            <table>
                                <tr class="title-table" style="background-color: rgba(172, 255, 47, 0.589);">
                                    <th>ID</th>
                                    <th>Limit</th>
                                    <th>Total Score</th>
                                    <th>Rate 1</th>
                                    <th>Rate 2</th>
                                    <th></th>
                                </tr>


                                <?php
                                if($emptyData == true)
                                {
                                    ?>
                                    <tr>
                                            <td class="id"><?php echo $error ?></td>
                                            <td class="limit"><?php echo $error ?></td>
                                            <td class="totalScore"><?php echo $error ?></td>
                                            <td class="rate"><?php echo $error ?></td>
                                            <td class="rate"><?php echo $error ?></td>
                                    </tr>
                                    <?php
                                }else
                                {
                                    ?>
                                        <tr>
                                            <td class="id"><?php echo $listCfig -> id ?></td>
                                            <td class="limit"> <?php echo $listCfig -> limit ?> </td>
                                            <td class="totalScore"> <?php echo $listCfig -> Totalscore ?> </td>
                                            <td class="totalScore"> <?php if($listCfig -> rate1) {echo $listCfig -> rate1; }else { echo '0'; } ?> %</td>
                                            <td class="totalScore"> <?php if($listCfig -> rate2) {echo $listCfig -> rate2; }else { echo '0'; } ?> %</td>
                                            <td class="btn-update"><button class="update-btn"><a href="?act=UpdateConfig&id=<?php echo $listCfig -> id ?>">Sửa</a></button></td>
                                        </tr>
                                    <?php
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
