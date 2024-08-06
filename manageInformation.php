<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="./home.css">
</head>
<style>
  .list
{
    width: 100%;
}
form
{
    margin: 0;
}
.list table
{
    width: 100%;
}
.list table tr
{
    height: 50px;
    background-color: rgba(128, 128, 128, 0.375);
}
.list table td
{
    /* border: 3px solid whitesmoke; */
    text-align: center;
}
.list table th
{
    text-align: center;
    
}
.list table tr .checkbox
{
    width: 20px;
    height: 20px;
    cursor: pointer;
}
.list table .btn-check, .id, .btn-setting-delete, .name, .class,.score1, .score2, .score3, .totalScore
{
    text-align: center;
    font-size: 18px;
}
.btn-setting-delete button
{
    width: 50px;
    height: 30px;
}
.btn-setting-delete button a
{
  text-decoration: none;
  color: black;
}
</style>
<body>

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="?act=ManageInformation">Manage Information</a>
  <a href="?act=ResetPassword">Reset Password</a>
  <a href="?act=UpdateInformation">Update Information</a>
  <a href="?act=DiceGame">Dice Game</a>
  <a href="logout.php">Log Out</a>
</div>

<div id="header">
    <span style="font-size:30px;cursor:pointer;line-height: 70px;" onclick="openNav()">&#9776;</span>
    <h2><?php echo $_SESSION['fullname'] ?></h2>

</div>

    <div class="main">
        <div id="container">
            <h1>Manage Information</h1>
                <form action="" method="post">
                        <div class="list" border=1>
                            
                            <table>
                                <tr class="title-table" style="background-color: rgba(172, 255, 47, 0.589);">
                                    <th>Lớp</th>
                                    <th>điểm</th>
                                    <th></th>
                                </tr>
                                  <tr>
                                    <td class="class-name"> <?php echo $listStu -> class  ?> </td>
                                    <td class="totalScore"> <?php if($listStu -> score){echo $listStu -> score; }else{ echo '0';} ?> </td>
                                    <td class="btn-setting-delete">
                                        <button type="button"><a href="?act=UpdateInformation">Vào thi</a></button>
                                    </td>
                                </tr>
                            </table>
                        </div>
                </form>
        </div>
    </div>
    
    <script src="script.js"></script>

<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("container").style.marginLeft = "250px";
  document.getElementById("header").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("container").style.marginLeft = "0px";
  document.getElementById("header").style.marginLeft = "0px";
}
</script>
   
</body>
</html> 
