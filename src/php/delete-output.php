<?php
require 'connect.php';

session_start(); // セッションを開始

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        $pdo = new PDO($connect, USER, PASS);

        // 対応するidのデータをmusicテーブルから削除
        $sql = "DELETE FROM music WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        // 削除が成功した場合、通知メッセージをセット
        $_SESSION['success_message'] = "削除に成功しました";

        // トップページにリダイレクト
        header("Location: top.php");
        exit();
    } catch (PDOException $e) {
        // エラーが発生した場合の処理
        $_SESSION['error_message'] = "削除に失敗しました: " . $e->getMessage();

        // トップページにリダイレクト
        header("Location: top.php");
        exit();
    } finally {
        $pdo = null;
    }
}
?>
