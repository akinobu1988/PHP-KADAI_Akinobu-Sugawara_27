<?php
/*
【1】$_SESSION = array();によってセッションの中身を削除する
【2】session_destroy();によってセッションを破壊する
*/
session_start();
$_SESSION = array();//セッションの中身をすべて削除
session_destroy();//セッションを破壊
?>

<p>ログアウトしました。</p>
<a href="login_form.php">ログインへ</a>
