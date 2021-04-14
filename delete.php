<?php
//セッション開始する
session_start();

//POSTデータ取得
$id = $_GET["id"];

//DB接続します
require_once("funcs.php");
loginCheck();
$pdo = db_conn();

//データ登録SQL作成
//削除するときの注意点は、idの場所を特定すること！
$stmt = $pdo->prepare(
  "DELETE FROM 
      gs_bm_table 
  WHERE 
      id = :id"
);

// 数値の場合 PDO::PARAM_INT
// 文字の場合 PDO::PARAM_STR
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute(); //実行

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("ErrorMessage:". print_r($error, true));
}else{
  //５．index.phpへリダイレクト
  header('Location: register.php');
}
?>