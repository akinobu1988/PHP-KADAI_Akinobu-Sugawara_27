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
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table WHERE 出身地 = '愛知県';");
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
        $view .= '<tr><td>'. h($result['選手名']) . '</td></tr>';
        $view2 .= '<tr><td>'. h($result['チーム名']) . '</td></tr>';
        $view3 .= '<tr><td>'. h($result['ポジション']). '</td></tr>';
        $view4 .= '<tr><td>'. h($result['誕生日']) . '</td></tr>';
        $view5 .= '<tr><td>'. h($result['年齢']) . '</td></tr>';
        $view6 .= '<tr><td>'. h($result['身長']). '</td></tr>';        
        $view7 .= '<tr><td>'. h($result['体重']) . '</td></tr>';
        $view8 .= '<tr><td>'. h($result['出身地']) . '</td></tr>';
        $view9 .= '<tr><td>'. h($result['投打']). '</td></tr>';
        $view10 .= '<tr><td>'. h($result['血液型']). '</td></tr>';        
        $view11 .= '<tr><td>'. h($result['ドラフト年度']) . '</td></tr>';
        $view12 .= '<tr><td>'. h($result['経歴']) . '</td></tr>';
        $view13 .= '<tr><td>'. h($result['獲得タイトル']). '</td></tr>';
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
<title>検索ワード：愛知県</title>
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
        <a class="navbar-brand" href="index.php"></a>
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
    </tr>
    <tr>
      <td><?php echo $view; ?></td>
      <td><?php echo $view2; ?></td>
      <td><?php echo $view3; ?></td>
      <td><?php echo $view4; ?></td>
      <td><?php echo $view5; ?></td>
      <td><?php echo $view6; ?></td>
      <td><?php echo $view7; ?></td>
      <td><?php echo $view8; ?></td>
      <td><?php echo $view9; ?></td>
      <td><?php echo $view10; ?></td>
      <td><?php echo $view11; ?></td>
      <td><?php echo $view12; ?></td>
      <td><?php echo $view13; ?></td>
    </tr>

<!-- Main[End] -->

</body>
</html>
