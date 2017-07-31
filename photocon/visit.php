<?php
session_start();

$count = 1;

if (isset($_SESSION["count"])) {  //キーバリュー（連想配列）で設定済みか確認
    $count = $_SESSION["count"];
    $count++;
}
$_SESSION["count"] = $count;
//setcookie(キー, 値, 有効期限 );
//有効期限はUNIXタイムスタンプで秒単位
//有効期限はクライアントが自分の時計で管理する。

?>
<HTML>
<HEAD>
    <TITLE>セッション</TITLE>
    <META http-equiv="Content-Type" content="text/html; charset=utf-8">
</HEAD>
<BODY>
<FORM name="form1" method="post" action="file.html">
セッション<BR>
<BR>
<?php
if ($count == 1) {
    ?>
    はじめての訪問です。<BR>
    <BR>
    セッションにデータはありません。<BR>
    このページをリロードしてください。<BR>

    <?php
} else {
    ?>
    あなたの訪問は<?=$count?>回目です。<BR>
    <BR>
    10秒以内にリロードするとカウントアップします。

    <?php
}
?>
    <BR>
    <INPUT type="submit" value="写真送信">

</BODY>
</HTML>


/**
 * Created by PhpStorm.
 * User: yamaguchi kaito
 * Date: 2017/05/31
 * Time: 11:16
 */