<!doctype html>
<html lang="ja-JP">
<head>
        <meta charset="UTF-8">
        <title>ログイン</title>
</head>
<body>
<form action="<?= URL::route('login'); ?>" method="post">
        <label>Email:<input type="text" name="email"></label><br>
        <label>Password:<input type="password" name="password"></label><br>
        <input type="submit" value="ログイン">
</form>
</body>
</html>