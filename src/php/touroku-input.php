<?php require 'header.php' ;?>
<?php require 'connect.php' ;?>
<link rel="stylesheet" href="../css/script.css">
<link rel="stylesheet" href="../css/touroku.css">
<title>新規登録</title>
<?php require 'Menu.php' ;?>
<h1>新規登録</h1>
    <!--新規登録機能-->
    <form action="touroku-output.php" method="post">
        <div class="text">曲名：</div>
        <div class="input">
            <input type="text" name="name" placeholder="うっせぇわ">
        </div>
        <div class="text">時間：</div>
        <div class="input">
            <input type="text" name="time" placeholder="3分25秒">
        </div>
        <div>
            <input type="submit" value="登録">
        </div>
    </form>
<?php require 'footer.php' ;?>