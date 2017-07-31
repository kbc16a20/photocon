<?php
$db_user = "sampleuser";	// ユーザー名
$db_pass = "ju78iklo";	// パスワード
$db_host = "localhost";	// ホスト名
$db_name = "photocondb";	// データベース名
$db_type = "mysql";	// データベースの種類


$dsn = "$db_type:host=$db_host;dbname=$db_name;charset=utf8";

try {
    $pdo = new PDO($dsn, $db_user,$db_pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    print "接続しました... <br>";
} catch(PDOException $Exception) {
    die('エラー :' . $Exception->getMessage());
}

try {
    $pdo->beginTransaction();
//プレースホルダーを設定してSQL文を作る
    $sql = "INSERT  INTO login_user ( username, email, password ) VALUES ( :username,:email, :password  )";
//プリペアードステートメントで実行準備をする。
    $stmh = $pdo->prepare($sql);
//プレースホルダーに設定する値を指示
    $stmh->bindValue(':username',  $_POST['name'],  PDO::PARAM_STR );
    $stmh->bindValue(':email',$_POST['mail'],  PDO::PARAM_STR );
    $stmh->bindValue(':password',$_POST['pass'],  PDO::PARAM_STR );

    // ハッシュ値生成
    $out = password_hash($_POST['pass'], PASSWORD_DEFAULT);
//ステートメントを実行する
    $stmh->execute();
//コミット
    $pdo->commit();
    print "登録されました。";

} catch (PDOException $Exception) {
    $pdo->rollBack();
    print "エラー：" . $Exception->getMessage();
}
?>
<HTML>
<HEAD>
    <TITLE>登録完了画面</TITLE>
</HEAD>
<BODY>
<BR><BR>
<a href = "http://localhost/photocon/mypage.php">トップへ戻る</a>
</BODY>
</HTML>

