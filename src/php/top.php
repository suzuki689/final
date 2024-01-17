<?php require 'header.php' ;?>
<?php require 'connect.php' ;?>
<link rel="stylesheet" href="../css/top.css">
<title>Top</title>
<?php require 'Menu.php' ;?>

    <!--絞り込み機能-->
    <div class="narrow-box">
        <form action="top.php" method="post">
            <select name="coverFilter" id="coverFilter">
                <option value="">絞り込まない</option>
                <option value="0">オリジナル曲</option>
                <option value="1">カバー曲</option>
            </select>  
        <input type="submit" value="絞り込む" id="cover">
        </form>
    </div>

    <!--登録楽曲一覧機能-->
    <?php
    $pdo = new PDO($connect, USER, PASS);
    
    $sql = "SELECT name, time FROM music";
    $stmt = $pdo->query($sql);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach($result as $row){
        echo '<div class="music-box">';
        echo '<div class="music-name">';
        echo $row['name'];
        echo '</div>';
        echo '<div class="music-time">';
        echo $row['time'];
        echo '</div>';
        echo '</div>';
    }
    $pdo=null;
    ?>
<?php require 'footer.php' ;?>