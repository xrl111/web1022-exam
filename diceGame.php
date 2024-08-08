<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="./home.css">
</head>
<style>
    .list
    {
        text-align: center;
    }
</style>
<body>

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="?act=ManageInformation">Manage Information</a>
  <a href="?act=ResetPassword">Reset Password</a>
  <a href="?act=UpdateInformation">Update Information</a>
  <a href="logout.php">Log Out</a>
</div>

<div id="header">
    <span style="font-size:30px;cursor:pointer;line-height: 70px;" onclick="openNav()">&#9776;</span>
    <h2><?php echo $_SESSION['fullname'] ?></h2>
</div>

    <div class="main">
        <div id="container">
            <h1>Xúc Xắc Game</h1>
            <div class="list">
                <!-- <label for="totalNumber">Nhập số:</label> -->
                <form action="?act=LogicDiceGame" method="post" onsubmit="updateHiddenFields()">
                    <input type="hidden" id="totalNumber" name="totalNumber" min="3" value="<?php echo $totalOfQues ?>">
                    <input type="hidden" name="content1" id="content1">
                    <input type="hidden" name="content2" id="content2">
                    <input type="hidden" name="content3" id="content3">
                    <input type="submit" value="Xoay Xúc Xắc" name="roll" id="rollButton" <?php echo $buttonHidden ? 'disabled' : ''; ?> <?php echo $checkLock ? 'disabled' : ''; ?>></input>
                </form>
                <?php
                    if($_SESSION['username'] == 'admin2')
                    {
                        ?>
                            <form action="?act=DiceGame" method="post">
                                <input type="submit" name="reset" value="Reset">
                            </form>
                        <?php
                    }
                ?>
               
                <form action="?act=DiceGame" method="post">
                    <input type="submit" name="lock" value="lock">
                </form>
                <form action="?act=DiceGame" method="post">
                    <input type="submit" name="unlock" value="unlock">
                </form>
                <div id="diceContainer">
                        <div class="dice" id="dice1"><?php echo $listStu -> result_1  ?></div>
                        <div class="dice" id="dice2"><?php echo $listStu -> result_2 ?></div>
                        <div class="dice" id="dice3"><?php echo $listStu -> result_3 ?></div>
                </div>
                <div id="result"><?php echo 'Kết quả: ' . $listStu -> result_1 . ' ' .   $listStu -> result_2 . ' ' . $listStu -> result_3 ?></div>
                <div id="questions"></div>

                <?php
                    if($checkLock)
                    {
                        ?>  
                            <table>
                                <tr class="title-table" style="background-color: rgba(172, 255, 47, 0.589);">
                                    <th>Số câu</th>
                                    <th>Câu hỏi </th>
                                    <th>Câu trả lời</th>
                                </tr>
                             
                                <tr>
                                    <td class="number"> <?php echo $question1 -> number  ?> </td>
                                    <td class="question"> <?php echo $question1 -> question ?> </td>   
                                    <td class="answer"> <?php echo $question1 -> answer ?> </td>
                                </tr>

                                <tr>
                                    <td class="number"> <?php echo $question2 -> number  ?> </td>
                                    <td class="question"> <?php echo $question2 -> question ?> </td>   
                                    <td class="answer"> <?php echo $question2 -> answer ?> </td>
                                </tr>

                                <tr>
                                    <td class="number"> <?php echo $question3 -> number  ?> </td>
                                    <td class="question"> <?php echo $question3 -> question ?> </td>   
                                    <td class="answer"> <?php echo $question3 -> answer ?> </td>
                                </tr>
                            </table>
                        <?php   
                    }
                ?>
            </div>
        </div>
    </div>
    
    <script src="script.js"></script>

<script>
function openNav() 
{
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("container").style.marginLeft = "250px";
  document.getElementById("header").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("container").style.marginLeft = "0px";
  document.getElementById("header").style.marginLeft = "0px";
}
function updateHiddenFields() {
  document.getElementById('content1').value = document.getElementById('dice1').textContent;
  document.getElementById('content2').value = document.getElementById('dice2').textContent;
  document.getElementById('content3').value = document.getElementById('dice3').textContent;
}
</script>
   
</body>
</html> 
