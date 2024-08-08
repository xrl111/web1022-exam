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
            <h1>Update Information</h1>
            <form action="" method="POST" class="update-form">
                <div class="list">
                    <div class="form-group">
                        <label for="fullname">Full Name:</label>
                        <input type="text" id="fullname" name="fullname" required>
                    </div>
                    <div class="form-group">
                        <button style="cursor: pointer;" type="submit" name="update" value="Update">Update</button>
                    </div>    
                </div>
            </form>
        </div>
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
