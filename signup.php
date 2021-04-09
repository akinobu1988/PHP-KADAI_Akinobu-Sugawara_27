<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>新規登録</title>
</head>
<body>
    <h1>パ・リーグファンクラブ 会員登録</h1>
    <form action="create.php" method="post">
    <div>
        <label>名前：<label>
        <input type="text" name="name" required>
    </div>
    <div>
        <label>メールアドレス：<label>
        <input type="text" name="mail" required>
    </div>
    <div>
        <label>パスワード：<label>
        <input type="password" name="pass" required>
    </div>
    <input type="submit" value="新規登録">
    </form>
    <p>すでに登録済みの方は<a href="login_form.php">こちら</a></p>
</body>
</html>
