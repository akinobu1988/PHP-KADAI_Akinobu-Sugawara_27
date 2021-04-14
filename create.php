<?php
//関数群の読み込み
require_once("funcs.php");

//フォームからの値をそれぞれ変数に代入
$name = $_POST['name'];
$mail = $_POST['mail'];
//パスワードのハッシュ化を実行
$pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);

//DB接続
$pdo = db_conn();

//SQL文を用意
$stmt = $pdo->prepare(
    "INSERT INTO users(name, mail, pass) VALUES (:name, :mail, :pass)");

//バインド変数を用意
//Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':name', $name, PDO::PARAM_STR);  
$stmt->bindValue(':mail', $mail, PDO::PARAM_STR); 
$stmt->bindValue(':pass', $pass, PDO::PARAM_STR);  

//実行
$status = $stmt->execute();

//データ登録処理後
if($status==false){
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit("ErrorMessage:". print_r($error, true));
  }else{
    //５．login_form.phpへリダイレクト
    $msg = '会員登録が完了しました';
    $link = '<a href="login_form.php">ログインページ</a>';
  }
  ?>

<h1><?php echo $msg; ?></h1><!--メッセージの出力-->
<?php echo $link; ?>