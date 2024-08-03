<?php
require_once "classes/model/config.php";


// require "./components/menu.php";
// if (!isLoggedIn() || !isAdmin()) {
//     redirectToLogin();
// }

// function getQuestionGroups() {
//     $conn = getDbConnection();
//     $sql = "SELECT * FROM question_groups";
//     $result = $conn->query($sql);
//     $questionGroups = [];
//     if ($result->num_rows > 0) {
//         while($row = $result->fetch_assoc()) {
//             $questionGroups[] = $row;
//         }
//     }
//     $conn->close();
//     return $questionGroups;
// }

// $questionGroups = getQuestionGroups();



?>

    <div class="container">
        
        <div class="content">
            <h2>Danh sách câu hỏi</h2>
                   <div class="button-container">
        <a href='?act=add' name="sumit"><button class="fancy-button">ADD</button></a>
    </div>
            <table>
                <thead>
                       <tr>
            <th>id</th>
            <th>number</th>
            <th>question</th>
            <th>answer</th>
            <th>question_groups</th>
            <th>created_at</th>
            <th>action</th>
                </tr>
                </thead>
             
                <?php foreach ($list as $value){ ?>
                    <tbody>
                    <tr>
            <td><?= $value->id?></td>
            <td><?= $value->number?></td>
            <td><?= $value->question?></td>
            <td><?= $value->answer?></td>
            <td><?= $value->question_groups?></td>
            <td><?= $value->created_at?></td>
            <td>
            <div class="button-container">
                <a onclick="delPro('?act=del&id=<?php echo $value->id ?>')"><button class="button button-primary">XOA</button></a>
                <a href="?act=edit&id=<?php echo $value -> id ?>"><button class="button button-secondary">SUA</button></a>
                </div>
            </td>
                    </tr> 
                    </tbody>
           
                <?php } ?>
            </table>
        </div>

    </div>
    <script>
    function delPro(deLeUrl){
if(confirm("ban co muon xoa khong")){
    document.location = deLeUrl;
}
    }
</script>