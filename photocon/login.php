<?php
require 'password.php';
// セッション開始
session_start();

$db['host'] = "localhost";  // DBサーバのurl
$db['user'] = "sampleuser";
$db['pass'] = "ju78iklo";
$db['dbname'] = "photocondb";

// エラーメッセージの初期化
$errorMessage = "";

// ログインボタンが押された場合
if (isset($_POST["login"])) {
    // １．ユーザIDの入力チェック
    if (empty($_POST["user_id"])) {
        $errorMessage = "ユーザIDが未入力です。";
    } else if (empty($_POST["password"])) {
        $errorMessage = "パスワードが未入力です。";
    }

    // ２．ユーザIDとパスワードが入力されていたら認証する
    if (!empty($_POST["user_id"]) && !empty($_POST["password"])) {
        // mysqlへの接続
        $mysqli = new mysqli($db['host'], $db['user'], $db['pass']);
        if ($mysqli->connect_errno) {
            print('<p>データベースへの接続に失敗しました。</p>' . $mysqli->connect_error);
            exit();
        }

        // データベースの選択
        $mysqli->select_db($db['dbname']);

        // 入力値のサニタイズ
        $userid = $mysqli->real_escape_string($_POST["user_id"]);

        // クエリの実行
        $query = "SELECT * FROM login_user WHERE username = '" . $userid . "'";
        $result = $mysqli->query($query);
        if (!$result) {
            print('クエリーが失敗しました。' . $mysqli->error);
            $mysqli->close();
            exit();
        }

        // パスワード(暗号化済み）の取り出し
            $out = password_hash($_POST['password'], PASSWORD_DEFAULT);


        // データベースの切断
        $mysqli->close();

        // ３．画面から入力されたパスワードとデータベースから取得したパスワードのハッシュを比較します。
        //if ($_POST["password"] == $pw) {
        if (password_verify($_POST["password"], $out)) {
            // ４．認証成功なら、セッションIDを新規に発行する
            session_regenerate_id(true);
            $_SESSION["user_id"] = $_POST["user_id"];
            header("Location: main.php");
            exit;
        }
        else {
            // 認証失敗
            $errorMessage = "ユーザIDあるいはパスワードに誤りがあります。";
        }
    } else {
        // 未入力なら何もしない
    }
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
<!-- $_SERVER['PHP_SELF']はXSSの危険性があるので、actionは空にしておく -->
<!--<form id="loginForm" name="loginForm" action="<?php print($_SERVER['PHP_SELF']) ?>" method="POST">-->
<form id="loginForm" name="loginForm" action="" method="POST">
    <fieldset>
        <legend>ログインフォーム</legend>
        <div><?php echo $errorMessage ?></div>
        <label for="user_id">ユーザID</label><input type="text" id="user_id" name="user_id" value="<?php echo htmlspecialchars($_POST["user_id"], ENT_QUOTES); ?>">
        <br>
        <label for="password">パスワード</label><input type="password" id="password" name="password" value="">
        <br>
        <input type="submit" id="login" name="login" value="ログイン">
    </fieldset>
</form>
</body>
</html>