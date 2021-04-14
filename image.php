<?php
// 0. SESSION開始！！
session_start();

//１．関数群の読み込み
require_once("funcs.php");

//ログインチェックの関数を使う！
loginCheck ();

//DB接続
$dsn = "mysql:host=localhost; dbname=pacificleague_player; charset=utf8";
$username = "root";
$password = "root";
try {
    $dbh = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    echo $e->getMessage();
}

//画像表示用のSQL文を用意
$sql = "SELECT * FROM images ORDER BY id DESC";
$stmt = $dbh->prepare($sql);
$stmt->execute();
$image = $stmt->fetch();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>画像表示</title>
</head>
<body>
    <h1>画像表示</h1>
    <img src="images/<?php echo $image['name']; ?>">
    <h3><a href="upload.php">画像アップロード</a></h3>
    <h3><a href="register.php">選手名鑑ページへ</a></h3>
    <h3><a href="logout.php">ログアウト</a></h3>
</body>
</html>