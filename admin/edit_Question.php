<?php
// require_once "classes/model/config.php";
// require "./components/menu.php";
// if (!isLoggedIn() || !isAdmin()) {
//     redirectToLogin();
// }
?>
 <style>

    </style>

<body>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="">number</label>
        <input type="number" name="number" value="<?php echo $idPro -> number ?>">
        <label for="">question</label>
        <input type="text" name="question" value="<?php echo $idPro -> question ?>">
        <label for="">answer</label>
        <input type="text" name="answer" value="<?php echo $idPro -> answer ?>">
        <label for="">question_groups</label>
        <input type="number" name="question_groups" value="<?php echo $idPro -> question_groups ?>">
        <button name="submit" id="editButton">gui</button>
    </form>
    <script>
          function ahihi(url) {
    window.location.href = url;
}

// Thêm sự kiện click vào phần tử có id là "ahihiButton"
document.getElementById('editButton').addEventListener('click', function() {
    ahihi('?act=list'); // Thay đổi URL theo trang bạn muốn chuyển tới
});
   </script>
    </script>
</body>