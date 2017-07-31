<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>新規会員登録</title>
</head>
<body>
<p>必要事項をご記入ください</p>
<form action="entry.php" method="post" enctype="multipart/form-data">

<?php

print "氏名".$_POST["name"] . "<BR>";

print "メールアドレス".$_POST["mail"] . "<BR>";

print "パスワード".$_POST["pass"] . "<BR>";
?>

<BR>
    <INPUT type="submit" value="確認">

    <?=$_POST["name"]?>">
    <INPUT type="hidden" name="name" value="<?=$_POST["name"]?>">
    <INPUT type="hidden" name="mail" value="<?=$_POST["mail"]?>">
    <INPUT type="hidden" name="pass" value="<?=$_POST["pass"]?>">
</form>
</body>
</html>

