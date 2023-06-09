<?php

session_start();
require_once('../funcs.php');
loginCheck();

$title = $_POST['title'];
$content  = $_POST['content'];
$lat = $_POST['lat'];
$lon = $_POST['lon'];

$img = '';

// 簡単なバリデーション処理追加。
if (trim($title) === '' || trim($content) === '') {
    redirect('post.php?error');
}

// ★★★★Macはimagesフォルダの書き込み権限を変更してください。★★★★
if ($_SESSION['post']['image_data'] !== "")  {
    $img = date('YmdHis') . '_' . $_SESSION['post']['file_name'];
    file_put_contents("../images/$img", $_SESSION['post']['image_data']);
}

//2. DB接続します
$pdo = db_conn();

//３．データ登録SQL作成
$stmt = $pdo->prepare('INSERT INTO photo_memory_table(
                            title, content, img, lat, lon, date
                        )VALUES(
                            :title, :content, :img, :lat, :lon, sysdate()
                        )');
$stmt->bindValue(':title', $title, PDO::PARAM_STR);
$stmt->bindValue(':content', $content, PDO::PARAM_STR);
$stmt->bindValue(':lat', $lat, PDO::PARAM_STR);
$stmt->bindValue(':lon', $lon, PDO::PARAM_STR);
$stmt->bindValue(':img', $img, PDO::PARAM_STR);
$status = $stmt->execute(); //実行

//４．データ登録処理後
if (!$status) {
    sql_error($stmt);
} else {
    $_SESSION['post'] = [] ;
    redirect('index.php');
}

?>