<HTML>
<HEAD>
    <TITLE>PHP TEST</TITLE>
    <META http-equiv="Content-Type" content="text/html; charset=utf-8">
</HEAD>
<BODY>
<FORM name="form1" method="post" action="entryform.php">
確認画面


    <?php
    try {

        // PDOの仕組みを使って接続口を作る
        $pdo = new PDO('mysql:host=localhost;dbname=photocondb;charset=utf8', 'sampleuser','ju78iklo');
//接続指定文字列はDBMSによって異なる


//エラー属性の設定。(p221)  try-catch対応にしている。
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//プリペアードステートメントの設定 SQLインジェクション対策
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
//デフォルトはtrue
//trueはプリペアードステートメントの処理を普通のSQLに内部変換してしまう。

        print "接続しました";
    } catch(PDOException $Exception) {
        die('接続エラー :' . $Exception->getMessage());
    }
    ?>


</BODY>
</HTML>

/**
 * Created by PhpStorm.
 * User: yamaguchi kaito
 * Date: 2017/05/18
 * Time: 10:19
 */