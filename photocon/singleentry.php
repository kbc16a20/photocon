<?php

//Ajax通信ではなく、直接URLを叩かれた場合はエラーメッセージを表示
if (
    !(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest')
    && (!empty($_SERVER['SCRIPT_FILENAME']) && 'json.php' === basename($_SERVER['SCRIPT_FILENAME']))
)
{
    die ('このページは直接ロードしないでください。');
}

//接続文字列 (PHP5.3.6から文字コードが指定できるようになりました)
$dsn = 'mysql:dbname=photocondb;host=localhost;charset=utf8';

//ユーザ名
$user = 'root';

//パスワード
$password = '';

try
{
    //nullで初期化
    $users = null;

    //DBに接続
    $dbh = new PDO($dsn, $user, $password);

    //'users' テーブルのデータを取得する
    $sql = 'select * from users';
    $stmt = $dbh->query($sql);

    //取得したデータを配列に格納
    while ($row = $stmt->fetchObject())
    {
        $users[] = array(
            'id'=> $row->id
        ,'name' => $row->name
           // ,'comment' => $row->comment
           // ,'address' => $row->address
           // ,'file' => $row->file

        );
    }

    //JSON形式で出力する
    header('Content-Type: application/json');
    echo json_encode( $users );
    exit;
}
catch (PDOException $e)
{
    //例外処理
    die('Error:' . $e->getMessage());
}