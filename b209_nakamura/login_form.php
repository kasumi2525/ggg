<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link rel="icon" type="image/png" sizes="16x16"  href="img/favicon-16x16.png">
    <title>ログイン</title>
</head>

<body>
   
    <form action="login.php" method="post">
        <label for="username">ユーザー名：</label>
        <input type="text" id="username" name="username" required><br>

        <label for="password">パスワード：</label>
        <input type="password" id="password" name="password" required><br>

        <input type="submit" value="ログイン">
    </form>
    <p>アカウントをお持ちでない方は <a href="register_form.php">こちらから新規登録</a> してください。</p>
</body>
</html>


