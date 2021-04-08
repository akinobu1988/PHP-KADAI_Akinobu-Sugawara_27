<?php
require_once("funcs.php");

//1.  DB接続します
try {
  //ID:'root', Password: 'root'
  $pdo = new PDO('mysql:dbname=pacificleague_player;charset=utf8;host=localhost','root','root');
} catch (PDOException $e) {
  exit('DBConnectError:'.$e->getMessage());
}

//２．データ取得SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table WHERE 出身地 = '大分県';");
$status = $stmt->execute();

//３．データ表示
$view = "";
if ($status == false) {
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit('ErrorQuery:' . print_r($error, true));
}else{
    //Selectデータの数だけ自動でループしてくれる
    //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
    while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
      $view .= '<tr><td>'. h($result['選手名']) . '</td>';
      $view .= '<td>'. h($result['チーム名']) . '</td>';
      $view .= '<td>'. h($result['ポジション']) . '</td>';
      $view .= '<td>'. h($result['誕生日']) . '</td>';
      $view .= '<td>'. h($result['年齢']) . '</td>';
      $view .= '<td>'. h($result['身長']) . '</td>';
      $view .= '<td>'. h($result['体重']) . '</td>';
      $view .= '<td>'. h($result['出身地']) . '</td>';
      $view .= '<td>'. h($result['投打']) . '</td>';
      $view .= '<td>'. h($result['血液型']) . '</td>';
      $view .= '<td>'. h($result['ドラフト年度']) . '</td>';
      $view .= '<td>'. h($result['経歴']) . '</td>';
      $view .= '<td>'. h($result['獲得タイトル']) . '</td>';
      $view .= '<td><a href="remind.html?id=' . $result['id'] . '">'. 削除 .  '</a></td>';
      $view .= '<td><a href="detail.php?id=' . $result['id'] . '">'. 編集 .  '</a></td></tr>';
    }
}
?>

<!-- '<p>' . h($result['選手名']) . ' ' .h($result['チーム名']) . '</p>'; -->

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>検索ワード：大分県</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
    <nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
        <a class="navbar-brand" href="index.php">検索ワード：大分県</a>
        </div>
    </div>
    </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<!-- <div>
    <div class="container jumbotron"><?= $view ?></div> -->

<hr>
<table border="1">
    <tr>
      <th>選手名</th>
      <th>チーム名</th>
      <th>ポジション </th>
      <th>誕生日</th>
      <th>年齢</th>
      <th>身長</th>
      <th>体重</th>
      <th>出身地</th>
      <th>投打</th>
      <th>血液型</th>
      <th>ドラフト年度</th>
      <th>経歴</th>
      <th>獲得タイトル</th>
      <th>作業１</th>
      <th>作業２</th>
    </tr>
    <tr>
      <td><?php echo $view; ?></td>
    </tr>

<!-- Main[End] -->

</body>
</html>
