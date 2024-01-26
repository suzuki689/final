<?php require 'header.php' ;?>
<?php require 'connect.php' ;?>
<link rel="stylesheet" href="../css/script.css">
<link rel="stylesheet" href="../css/touroku.css">
<title>新規登録完了</title>
<?php require 'Menu.php' ;?>
<?php
try {
    $pdo = new PDO($connect, USER, PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // PDOのエラーレポートを表示
    
    // input.phpの値を取得
    $name = $_POST['name'];
    $time = $_POST['time'];
    
    $sql = "INSERT INTO music (name, time) VALUES (:name, :time)"; // テーブルに登録するINSERT INTO文を変数に格納　VALUESはプレースフォルダーで空の値を入れとく
    $stmt = $pdo->prepare($sql); // 値が空のままSQL文をセット
    $params = array(':name' => $name, ':time' => $time); // 挿入する値を配列に格納
    $stmt->execute($params); // 挿入する値が入った変数をexecuteにセットしてSQLを実行
    
    // 登録内容確認・メッセージ
    echo "<p>名前: " . $name . "</p>";
    echo "<p>時間: " . $time . "</p>";
    echo "<p>上記の内容を登録しました。</p>";
    } catch (PDOException $e) {
    exit('データベースに接続できませんでした。' . $e->getMessage());
    }
?>