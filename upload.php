<?php
/*
【大まかな流れ】
◆フォームから画像を選択
◆画像ファイルかのチェック
◆DBではなくサーバーのimageディレクトリに画像を保存
◆DBにはファイル名保存
◆DBのファイル名を元に画像表示
*/

/*
【保存している画像名について】
ユーザーが上げた画像名が使われてしまう形になっていると下記の問題が発生する。
・悪意のあるユーザーに、サーバーに不具合が発生するような名前を設定される恐れがある
・長い名前を設定されていると保存できない
・保存できないファイル名がある（?.jpgなど）
$image = uniqid(mt_rand(), true);
画像ファイル名をサーバー側でユニーク化して保存

【画像アップロードについて】
画像ファイルかの確認を行わないと画像ファイル以外をアップロードした際も保存が完了され、空の画像が表示される
$image .= '.' . substr(strrchr($_FILES['image']['name'], '.'), 1);で拡張子を取得
exif_imagetype関数で画像ファイルかの確認

【画像の保存方法について】
データベースに画像を保存してしまうと、ユーザーデータを取得する時に画像データが大きい為、データ取得の時間が長くなってしまう恐れがある。
move_uploaded_file($_FILES['image']['tmp_name'], './images/' . $image); でディレクトリに画像を保存
そのため下記手順で表示させる
1. サーバー内に画像を保存する為のディレクトリを作成（images）
2. 1のディレクトリに画像を保存、画像のファイル名をデータベースに保存（ユニーク化されたもの）
3. データベースの画像のファイル名を元に画像を表示させる
*/

$dsn = "mysql:host=localhost; dbname=pacificleague_player; charset=utf8";
$username = "root";
$password = "root";
try {
    $dbh = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    echo $e->getMessage();
}
    if (isset($_POST['upload'])) {//送信ボタンが押された場合
        $image = uniqid(mt_rand(), true);//ファイル名をユニーク化
        $image .= '.' . substr(strrchr($_FILES['image']['name'], '.'), 1);//アップロードされたファイルの拡張子を取得
        $file = "images/$image";
        $sql = "INSERT INTO images(name) VALUES (:image)";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':image', $image, PDO::PARAM_STR);
        if (!empty($_FILES['image']['name'])) {//ファイルが選択されていれば$imageにファイル名を代入
            move_uploaded_file($_FILES['image']['tmp_name'], './images/' . $image);//imagesディレクトリにファイル保存
            if (exif_imagetype($file)) {//画像ファイルかのチェック
                $message = '画像をアップロードしました';
                $stmt->execute();
            } else {
                $message = '画像ファイルではありません';
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>画像アップロード</title>
</head>
<body>
    <h1>画像アップロード</h1>
    <!--送信ボタンが押された場合-->
    <?php if (isset($_POST['upload'])): ?>
        <p><?php echo $message; ?></p>
        <p><a href="image.php">画像表示へ</a></p>
    <?php else: ?>
        <form method="post" enctype="multipart/form-data">
            <p>本人確認書類のアップロード</p>
            <input type="file" name="image">
            <input type="submit" name="upload" value="送信">
        </form>
    <?php endif;?>
</body>
</html>
