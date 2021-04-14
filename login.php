<?php
//最初にSESSIONを開始！！ココ大事！！
session_start();

//関数群の読み込み
require_once("funcs.php");

//POST値を受け取る
$mail = $_POST['mail'];
$pass = $_POST['pass'];
// $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);

//DB接続
$pdo = db_conn();

//データ登録SQL作成
// users tableに、MAILがあるか確認する。
$stmt = $pdo->prepare('SELECT * FROM users WHERE mail = :mail');
$stmt->bindValue(':mail', $mail, PDO::PARAM_STR); 
// $stmt->bindValue(':pass', $pass, PDO::PARAM_STR);  
$status = $stmt->execute();

//SQL実行時にエラーがある場合STOP
if($status==false){
    sql_error($stmt);
}

//抽出データ数を取得
$val = $stmt->fetch();         //1レコードだけ取得する方法
//$count = $stmt->fetchColumn(); //SELECT COUNT(*)で使用可能()

//該当レコードがあればSESSIONに値を代入
//if(password_verify($lpw, $val['lpw'])){ 
//* PasswordがHash化の場合はこっちのIFを使う
// if( $val['id'] != '' ){
    if(password_verify($pass, $val['pass'])){ 
    //Login成功時
    $_SESSION['id']  = session_id();
    $_SESSION['name']      = $val['name'];
    $msg = 'ログインしました。';
    $link = '<a href="index.php">ホーム</a>';
}else{
    //Login失敗時(Logout経由)
    $msg = 'メールアドレスもしくはパスワードが間違っています。';
    $link = '<a href="login_form.php">戻る</a>';
}
?>
<h1><?php echo $msg; ?></h1>
<?php echo $link; ?>
<h3><a href="logout.php">ログアウト</a></h3>