<?php
//XSS対応（ echoする場所で使用！）
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES);
}

//DB接続
function db_conn()
{
    try {
        $db_name = "pacificleague_player";    //データベース名
        $db_id   = "root";      //アカウント名
        $db_pw   = "root";      //パスワード：XAMPPはパスワード無しに修正してください。
        $db_host = "localhost"; //DBホスト
        $pdo = new PDO('mysql:dbname=' . $db_name . ';charset=utf8;host=' . $db_host, $db_id, $db_pw);
        return $pdo;
    } catch (PDOException $e) {
        exit('DB Connection Error:' . $e->getMessage());
    }
}

//SQLエラー関数：sql_error($stmt)
function sql_error($stmt) {
    $error = $stmt->errorInfo();
    exit("SQLError:" . print_r($error, true));
}

//リダイレクト関数: redirect($file_name)
function redirect($file_name){
    header("Location: " . $file_name);
    exit();
}

// ログインチェック処理 loginCheck()
// ログインチェック処理！
// 以下、セッションID持ってたら、ok
// 持ってなければ、閲覧できない処理にする。
//session IDが一致していれば、IDの更新をおこなう。
function loginCheck () {
    if ($_SESSION['id'] != session_id()) {
        exit ("LOGIN ERROR");
    } else {
        session_regenerate_id(true);
        $_SESSION['id'] = session_id();
    }
}

//データ表示
function data() {
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
}