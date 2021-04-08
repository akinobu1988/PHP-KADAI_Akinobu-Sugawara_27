<?php
$dsn = "mysql:host=localhost; dbname=pacificleague_player; charset=utf8";
$username = "root";
$password = "root";
//id取得がうまくいかない。。。最新のidを取得して、画像表示させたい。
$id = rand(20, 21);
try {
    $dbh = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    echo $e->getMessage();
}
    $sql = "SELECT * FROM images WHERE id= :id ";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':id', $id);
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
</body>
</html>