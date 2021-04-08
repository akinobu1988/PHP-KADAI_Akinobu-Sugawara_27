<?php
//PHP:コード記述/修正の流れ
//1. insert.phpの処理をマルっとコピー。
//   POSTデータ受信 → DB接続 → SQL実行 → 前ページへ戻る
//2. $id = POST["id"]を追加
//3. SQL修正
//   "UPDATE テーブル名 SET 変更したいカラムを並べる WHERE 条件"
//4. header関数"Location"を「select.php」に変更

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
$id = $_POST["id"];

//2. DB接続します
try {
  //ID:'root', Password: 'root'
  $pdo = new PDO('mysql:dbname=pacificleague_player;charset=utf8;host=localhost','root','root');
} catch (PDOException $e) {
  exit('DBConnectError:'.$e->getMessage());
}

//３．データ登録SQL作成

// 1. SQL文を用意
$stmt = $pdo->prepare(
  "UPDATE 
    gs_bm_table 
  SET 
    選手名 = :name,
    チーム名 = :team,
    ポジション = :postion, 
    誕生日 = :birth,
    年齢 = :age,
    身長 = :height,
    体重 = :weight, 
    出身地 = :pref, 
    投打 = :type, 
    血液型 = :blood, 
    ドラフト年度 = :draft, 
    経歴 = :carrer, 
    獲得タイトル = :title
  WHERE
    id = :id
    ;"
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
$stmt->bindValue(':id', $id, PDO::PARAM_STR);

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