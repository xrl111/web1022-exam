<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1">
        <tr>
            <th>id</th>
            <th>name</th>
            <th>action</th>
        </tr>
<?php
        foreach( $iPro as $value){
?>
         <tr>
            <td><?php echo $value->id ?></td>
            <td><?php echo $value->name ?></td>
            <td>
                <a href="?act=editGroup&id=<?php echo $value->id  ?>"> <button>sua</button></a>
                 <button onclick="delPro('?act=delGroup&id=<?php echo $value->id  ?>')">xoa</button>
            </td>
        </tr>
<?php
        }
        ?>
    </table>
</body>
<script>
    function delPro(deLeUrl){
if(confirm("ban co muon xoa khong")){
    document.location = deLeUrl;
}
    }
</script>
</html>