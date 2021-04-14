<?php
//関数群の読み込み
require_once("funcs.php");

//POSTでデータ取得の準備をする
$name = $_POST["name"];
$team = $_POST["team"];
$position = $_POST["position"];
$birth = $_POST["birth"];
$age = $_POST["age"];
$height = $_POST["height"];
$weight = $_POST["weight"];
$pref = $_POST["pref"];
$type = $_POST["type"];
$blood = $_POST["blood"];
$draft = $_POST["draft"];
$carrer = $_POST["carrer"];
$title = $_POST["title"];
$edit = $_POST[""];
$delete = $_POST[""];

//2. DB接続します
//DB接続
$pdo = db_conn();

//３．データ登録SQL作成

// 1. SQL文を用意
$stmt = $pdo->prepare(
  "INSERT INTO gs_bm_table(id, 選手名, チーム名, ポジション, 誕生日, 年齢, 身長, 体重, 出身地, 投打, 血液型, ドラフト年度, 経歴, 獲得タイトル, 作業１, 作業２)
   VALUES(NULL, :name, :team, :postion, :birth, :age, :height, :weight, :pref, :type, :blood, :draft, :carrer, :title, :edit, :delete)"
   );

//  2. バインド変数を用意
//Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':name', $name, PDO::PARAM_STR);  
$stmt->bindValue(':team', $team, PDO::PARAM_STR); 
$stmt->bindValue(':postion', $position, PDO::PARAM_STR);  
$stmt->bindValue(':birth', $birth, PDO::PARAM_STR); 
$stmt->bindValue(':age', $age, PDO::PARAM_INT); 
$stmt->bindValue(':height', $height, PDO::PARAM_INT); 
$stmt->bindValue(':weight', $weight, PDO::PARAM_INT); 
$stmt->bindValue(':pref', $pref, PDO::PARAM_STR); 
$stmt->bindValue(':type', $type, PDO::PARAM_STR); 
$stmt->bindValue(':blood', $blood, PDO::PARAM_STR); 
$stmt->bindValue(':draft', $draft, PDO::PARAM_INT); 
$stmt->bindValue(':carrer', $carrer, PDO::PARAM_STR);  
$stmt->bindValue(':title', $title, PDO::PARAM_STR); 
$stmt->bindValue(':edit', $edit, PDO::PARAM_STR);  
$stmt->bindValue(':delete', $delete, PDO::PARAM_STR); 

//  3. 実行
$status = $stmt->execute();

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