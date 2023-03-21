<?php
session_start();
require_once('./funcs.php');
loginCheck();

$id = $_GET['id'];
// $comment_id = implode(",", $id);
$comment_id = 1;
$pdo = db_conn();

var_dump($comment_id);
// ２．データ登録SQL作成
// $stmt = $pdo->prepare('SELECT * FROM photo_memory_table WHERE id=:id');
// $stmt->bindValue(':id', $id, PDO::PARAM_INT);
// $status = $stmt->execute();



//３．データ表示
// if ($status == false) {
//     sql_error($stmt);
//     return;
// } else {
//     $row = $stmt->fetch();
// }
//     $data = "row";
//     var_dump($id); 
if(isset($_POST["addComment"])){


$comment_title = $_POST['comment_title'];
$comment = $_POST['comment'];  

$stmt = $pdo->prepare('INSERT INTO comment_table(
                             comment_id,
                             comment_title,
                             comment
                             )VALUES(
                             :comment_id,
                             :comment_title,
                             :comment
                                )');


$stmt->bindValue(':comment_id', $comment_id,PDO::PARAM_INT);
$stmt->bindValue(':comment_title', $comment_title, PDO::PARAM_STR);
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);
$status = $stmt->execute(); //実行
    
if (!$status){
    sql_error($stmt);
}else{
    redirect('index.php');
}
}
