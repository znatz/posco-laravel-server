<!doctype html>
<html lang="ja-JP">
<head>
        <meta charset="UTF-8">
        <title>登録</title>
</head>
<body>
<h1>登録</h1>
<form action="<?= URL::route('signup'); ?>" method="post">
        <label>Email:<input type="email" name="email" value=""></label><br>
        <label>Password:<input type="password" name="password" value=""></label><br>
        <input type="submit" value="登録"/>
</form>
</body>
</html>