<?php
require 'connect.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['id'], $_POST['name'], $_POST['time'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $time = $_POST['time'];

        try {
            $pdo = new PDO($connect, USER, PASS);

            // 対応するidのデータを更新
            $sql = "UPDATE music SET name = :name, time = :time WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':time', $time, PDO::PARAM_STR);
            $stmt->execute();

            // 更新が成功した場合、トップページにリダイレクト
            $_SESSION['success_message'] = "更新に成功しました";
            header("Location: top.php");
            exit();
        } catch (PDOException $e) {
            // エラーが発生した場合の処理
            $_SESSION['error_message'] = "更新に失敗しました: " . $e->getMessage();
            header("Location: top.php");
            exit();
        } finally {
            $pdo = null;
        }
    }
} else {
    // POST メソッド以外でアクセスされた場合の処理
    $_SESSION['error_message'] = "不正なアクセスです";
    header("Location: top.php");
    exit();
}
?>
