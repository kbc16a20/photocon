<?php
$count = 1;
if (isset($_COOKIE["count"])) {  //キーバリュー（連想配列）で設定済みか確認
    $count = $_COOKIE["count"];
    $count++;
}
setcookie("count", $count, time() + 10 );
//setcookie(キー, 値, 有効期限 );
//有効期限はUNIXタイムスタンプで秒単位
//有効期限はクライアントが自分の時計で管理する。

?>
<HTML>
<HEAD>
    <TITLE>クッキーのテスト</TITLE>
    <META http-equiv="Content-Type" content="text/html; charset=utf-8">
</HEAD>
<BODY>
クッキーのテスト<BR>
<BR>
<?php
if ($count == 1) {
    ?>
    はじめての訪問です。<BR>
    <BR>
    クッキー情報はありません。<BR>
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

</BODY>
</HTML>
