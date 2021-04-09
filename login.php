<?php
/*【1】セッションを開始するためにsession_start();の宣言
【2】送信されたフォームから指定したハッシュがDB上のパスワードとマッチするかチェック
【3】すでに登録されているユーザーであれば、ホーム画面でログインしたユーザーの名前を表示するためにセッションにユーザー名を保存
【4】存在しなければエラーメッセージ*/
session_start();
$mail = $_POST['mail'];
$dsn = "mysql:host=localhost; dbname=pacificleague_player; charset=utf8";
$username = "root";
$password = "root";
try {
    $dbh = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    $msg = $e->getMessage();
}

$sql = "SELECT * FROM users WHERE mail = :mail";
$stmt = $dbh->prepare($sql);
$stmt->bindValue(':mail', $mail);
$stmt->execute();
$member = $stmt->fetch();
//指定したハッシュがパスワードにマッチしているかチェック
if (password_verify($_POST['pass'], $member['pass'])) {
    //DBのユーザー情報をセッションに保存
    $_SESSION['id'] = $member['id'];
    $_SESSION['name'] = $member['name'];
    $msg = 'ログインしました。';
    $link = '<a href="index.php">ホーム</a>';
} else {
    $msg = 'メールアドレスもしくはパスワードが間違っています。';
    $link = '<a href="login_form.php">戻る</a>';
}
?>

<h1><?php echo $msg; ?></h1>
<?php echo $link; ?>

