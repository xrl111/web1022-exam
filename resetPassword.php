
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
    <span style="font-size:30px;cursor:pointer;line-height: 70px;" onclick="openNav()">&#9776;</span>
    <h2><?php echo $_SESSION['fullname'] ?></h2>

</div>
        <div id="container">
            <h1>Reset Password</h1>
            <form action="" method="POST" class="register-form">
              <div class="form-group">
                <label for="fullname"> New Password:</label>
                <input type="text" id="password" name="password" required>
              </div>
              <div class="form-group">
                <label for="fullname"> Confirm Password:</label>
                <input type="text" id="confirmPass" name="confirmPass" required>
              </div>
              <div class="form-group">
                <button style="cursor: pointer;" type="submit" name="reset" value="Reset">Reset</button>
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
