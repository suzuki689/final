<?php require 'header.php'; ?>
<?php require 'connect.php'; ?>
<link rel="stylesheet" href="../css/script.css">
<link rel="stylesheet" href="../css/top.css">
<title>Top</title>
<?php require 'Menu.php'; ?>
<!-- 登録楽曲一覧機能 -->
<?php
$pdo = new PDO($connect, USER, PASS);

$sql = "SELECT id, name, time FROM music"; // 'id' を SELECT 文に追加
$stmt = $pdo->query($sql);
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row) {
    $id = $row['id'];
    echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
    echo '<div class="music-box">';
    echo '<div class="music-name">';
    echo $row['name'];
    echo '</div>';
    echo '<div class="music-time">';
    echo $row['time'];
    echo '</div>';
    echo '<form action="update.php" method="get">'; // フォームのアクションとメソッドを追加
    echo '<div class="update-button">';
    echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
    echo '<button type="submit" name="update">更新</button>';
    echo '</div>';
    echo '</form>'; // フォームの終了タグを追加

    echo '<form action="delete-output.php" method="get">'; // フォームのアクションとメソッドを追加
    echo '<div class="delete-button">';
    echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
    echo '<button type="submit" name="delete">削除</button>';
    echo '</div>';
    echo '</form>'; // フォームの終了タグを追加

    echo '</div>';
}
$pdo = null;
?>
<?php require 'footer.php'; ?>

