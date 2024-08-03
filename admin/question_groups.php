<?php
require_once "classes/model/config.php";
require_once 'classes/controller/Cquestions.php';

if (!isLoggedIn() || !isAdmin()) {
    redirectToLogin();
}

function getQuestionGroups() {
    $conn = getDbConnection();
    $sql = "SELECT * FROM question_groups";
    $result = $conn->query($sql);
    $questionGroups = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $questionGroups[] = $row;
        }
    }
    $conn->close();
    return $questionGroups;
}

$questionGroups = getQuestionGroups();
?>

<body>
     <div class="container">
        <div class="content">
            <h2>Danh sách các nhóm câu hỏi</h2>
            <table border = 1 class="styled-table">
                <thead>
                    <tr>
                    <th>ID</th>
                    <th>Tên nhóm câu hỏi</th>
                </tr>
                </thead>
                
                <?php foreach ($questionGroups as $group): ?>
                    <tbody>
                        <tr>
                        <td><?php echo $group['id']; ?></td>
                        <td id="chuyenTrangButton"><?php echo $group['name'];?></td>
                    </tr>
                    </tbody>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</body>
   <script>
    function chuyenTrang(url) {
    window.location.href = url;
}

// Thêm sự kiện click vào phần tử có id là "chuyenTrangButton"
document.getElementById('chuyenTrangButton').addEventListener('click', function() {
    chuyenTrang('?act=list'); // Thay đổi URL theo trang bạn muốn chuyển tới
});
   </script>
</body>
