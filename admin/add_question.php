<?php
// require_once "classes/model/config.php";
// require "./components/menu.php";
// if (!isLoggedIn() || !isAdmin()) {
//     redirectToLogin();
// }
?>


<body>
    <form action="?act=add" method="post" enctype="multipart/form-data">
        <label for="">number</label>
        <input type="number" name="number">
        <label for="">question</label>
        <input type="text" name="question">
        <label for="">answer</label>
        <input type="text" name="answer">
        <label for="">question_groups</label>
        <input type="number" name="question_groups">
        <button name="submit" id="ahihiButton" >gui</button>
    </form>
    <script>
          function ahihi(url) {
    window.location.href = url;
    alert("ADD DATA SUCCESS");
}

// Thêm sự kiện click vào phần tử có id là "ahihiButton"
document.getElementById('ahihiButton').addEventListener('click', function() {
    ahihi('?act=list'); // Thay đổi URL theo trang bạn muốn chuyển tới
          // Add event listener to the button
          document.getElementById('ahihiButton').addEventListener('click', ahihi);
});
  
   </script>
    </script>
</body>