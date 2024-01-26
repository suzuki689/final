<?php session_start(); ?>
<?php require 'header.php'; ?>
<?php require 'connect.php'; ?>
<link rel="stylesheet" href="../css/script.css">
<link rel="stylesheet" href="../css/touroku.css">
<title>update</title>
<?php require 'Menu.php'; ?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        $pdo = new PDO($connect, USER, PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // 対応するidのデータを取得
        $sql = "SELECT name, time FROM music WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $musicData = $stmt->fetch(PDO::FETCH_ASSOC);

        // 更新画面にデータを表示するフォーム
        echo '<form action="update-output.php" method="post">'; // 追加されたフォームタグ
        echo '<input type="hidden" name="id" value="' . $id . '">'; // idのための隠しフィールド

        echo '<label for="name">曲名：</label>';
        echo '<input type="text" name="name" value="' . htmlspecialchars($musicData['name'], ENT_QUOTES) . '"><br>'; // XSS 対策

        echo '<label for="time">時間：</label>';
        echo '<input type="text" name="time" value="' . htmlspecialchars($musicData['time'], ENT_QUOTES) . '"><br>'; // XSS 対策
        echo '<input type="submit" value="更新">';
        echo '</form>';

    } catch (PDOException $e) {
        $_SESSION['error_message'] = "データの取得に失敗しました: " . $e->getMessage();
        header("Location: top.php");
        exit();
    } finally {
        $pdo = null;
    }
}else{
    echo 'なんでやねん';
}
?>
