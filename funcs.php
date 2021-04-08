<?php
//XSS対応（ echoする場所で使用！）
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES);
}

//DB接続関数：db_conn() 
//※関数を作成し、内容をreturnさせる。
//※ DBname等、今回の授業に合わせる。


function db_conn() {
    try {
        //ID:'root', Password: 'root'
        $pdo = new PDO('mysql:dbname=pacificleague_player;charset=utf8;host=localhost','root','root');
      } catch (PDOException $e) {
        exit('DBConnectError:'.$e->getMessage());
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