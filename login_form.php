<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>ログイン</title>
</head>
<body>
    <h1>ログインページ</h1>
    <form action="login.php" method="post">
    <div>
        <label>メールアドレス：<label>
        <input type="text" name="mail" required>
    </div>
    <div>
        <label>パスワード：<label>
        <input type="password" name="pass" required>
    </div>
    <input type="submit" value="ログイン">
    </form>
</body>
</html>