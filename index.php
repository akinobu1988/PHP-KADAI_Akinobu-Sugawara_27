<?php
session_start();
require_once("funcs.php");
loginCheck ();

$username = $_SESSION['name'];
if (isset($_SESSION['id'])) {//ログインしているとき
    $msg = 'こんにちは！' . htmlspecialchars($username, \ENT_QUOTES, 'UTF-8') . 'さん';
    $link = '<a href="logout.php">ログアウト</a>';
} else {//ログインしていない時
    $msg = 'ログインしていません';
    $link = '<a href="login.php">ログイン</a>';
}
?>
<h1><?php echo $msg; ?></h1>
<?php echo $link; ?>
<h3><a href="upload.php">画像登録へ</a></h3>
