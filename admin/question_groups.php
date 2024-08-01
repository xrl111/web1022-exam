<?php
require_once "../config.php";

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
    <div class="container">
        <div class="content">
            <h2>Danh sách các nhóm câu hỏi</h2>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Tên nhóm câu hỏi</th>
                </tr>
                <?php foreach ($questionGroups as $group): ?>
                    <tr>
                        <td><?php echo $group['id']; ?></td>
                        <td><?php echo $group['name']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</body>
