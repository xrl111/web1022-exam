

<body>
    <div class="container">
    <h1>Xin chao:<?=htmlspecialchars($user_name);?></h1>
    <h1>ID:<?=htmlspecialchars($user_id);?></h1>
        <button><a href="?act=suathongtin&id=<?php echo $user_id ?>">edit information</a></button>
   
    <a href="logout.php">Thoat</a>
    <hr>
        <h1>Xúc Xắc Game</h1>
        <label for="totalNumber">Nhập số:</label>
        <input type="number" id="totalNumber" name="totalNumber" min="3">
        <button id="rollButton">Xoay Xúc Xắc</button>
        <div id="diceContainer">
            <div class="dice" id="dice1"></div>
            <div class="dice" id="dice2"></div>
            <div class="dice" id="dice3"></div>
        </div>
        <div id="result"></div>
        <div id="questions"></div>
    </div>
    <script src="script.js"></script>
</body>