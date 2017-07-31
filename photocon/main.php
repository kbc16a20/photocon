<?php
session_start();

// ログイン状態のチェック
if (!isset($_SESSION["user_id"])) {
    header("Location: logout.php");
    exit;
}

?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>サンプルアプリケーション</title>
</head>
<body>
<h1>ログイン機能　サンプルアプリケーション</h1>
<!-- ユーザIDにHTMLタグが含まれても良いようにエスケープする -->
<p>ようこそ<?=htmlspecialchars($_SESSION["user_id"], ENT_QUOTES); ?>さん</p>
<ul>
    <li><a href="logout.php">ログアウト</a></li>
</ul>
</body>
</html>