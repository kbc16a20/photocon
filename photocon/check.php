<?php
session_start();

if(!isset($_SESSION['join'])){
    header('Location: entryform.php');
    exit();
}

?>
<html>

<form action="" method="post">
    <dl>
        <dt>ユーザー名</dt>
        <dd>
            <?php echo htmlspecialchars($_SESSION['join']['name'], ENT_QUOTES, 'UTF-8'); ?>
        </dd>
        <dt>メールアドレス</dt>
        <dd>
            <?php echo htmlspecialchars($_SESSION['join']['mail'], ENT_QUOTES, 'UTF-8'); ?>
        </dd>
        <dt>パスワード</dt>
        <dd>
            【表示されません】
        </dd>
    </dl>
    <div><a href="entryform.php?action=rewrite">&laquo;&nbsp;書き直す</a>
        <input type="submit" value="登録する"></div>
</form>

/**
 * Created by PhpStorm.
 * User: yamaguchi kaito
 * Date: 2017/07/03
 * Time: 12:03
 */