<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="./home.css">
</head>
<body>
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="?act=ManageInformation">Manage Information</a>
  <a href="?act=ResetPassword">Reset Password</a>
  <a href="?act=UpdateInformation">Update Information</a>
  <a href="logout.php">Log Out</a>
</div>

<div id="header">
    <span  onclick="openNav()">&#9776;</span>
    <h2><?php echo $_SESSION['fullname'] ?></h2>

</div>

        <div id="container">
            <h1>Manage Information</h1>
                <form action="" method="post" class="form-info">
                        <div class="list" border=1>
                            <table>
                                <tr class="title-table" style="background-color: rgba(172, 255, 47, 0.589);">
                                    <th>Lớp</th>
                                    <th>điểm</th>
                                    <?php
                                        if($currentDate >= $startDate && $currentDate <= $endDate)
                                        {
                                            ?>
                                                <th></th>
                                            <?php
                                        }   
                                    ?>
                                </tr>
                                  <tr>
                                    <td class="class-name"> <?php echo $listStu -> class  ?> </td>
                                    <td class="totalScore"> <?php if($listStu -> score){echo $listStu -> score; }else{ echo '0';} ?> </td>
                                    <?php
                                    
                                        if($currentDate >= $startDate && $currentDate <= $endDate)
                                        {
                                            ?>
                                                <td class="btn-setting-delete">
                                                    <button type="button"><a href="?act=DiceGame">Vào thi</a></button>
                                                </td>
                                            <?php
                                        }   
                                    ?>
                                   
                                </tr>
                            </table>
                        </div>
                </form>
        </div>
    <script src="script.js"></script>
<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("container").style.margin = "20px auto";
  document.getElementById("header").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("container").style.margin = "20px auto";
  document.getElementById("header").style.marginLeft = "0px";
}
</script>
   
</body>
</html> 
